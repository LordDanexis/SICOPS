<?php

/**
 * Script para cargar datos de lado del servidor con PHP y MySQL
 *
 * @author mroblesdev
 * @link https://github.com/mroblesdev/server-side-php
 * @license: MIT
 */

require_once("../includes/conexion.php");


// Columnas a mostrar en la tabla
$columns = ['consecutivo', 'folio', 'procedimiento', 'fecha_oficio', 'destinatario', 'cargo_destinatario', 'dependencia', 'asunto', 'abogado_solicitante', 'nivel', 'firma_oficio'];

// Nombre de la tablas
$table = "oficios";

// Clave principal de la tabla
$id = 'id';

// Campo a buscar
$campo = isset($_POST['campo']) ? $conexion->real_escape_string($_POST['campo']) : null;

// Filtrado
$where = '';

if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columns);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}

// Limites
$limit = isset($_POST['registros']) ? $conexion->real_escape_string($_POST['registros']) : 10;
$pagina = isset($_POST['pagina']) ? $conexion->real_escape_string($_POST['pagina']) : 0;

if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit = "LIMIT $inicio , $limit";

// Ordenamiento

$sOrder = "";
if (isset($_POST['orderCol'])) {
    $orderCol = $_POST['orderCol'];
    $oderType = isset($_POST['orderType']) ? $_POST['orderType'] : 'asc';

    $sOrder = "ORDER BY " . $columns[intval($orderCol)] . ' ' . $oderType;
}

// Consulta
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table
$where
$sOrder
$sLimit";
$resultado = $conexion->query($sql);
$num_rows = $resultado->num_rows;

// Consulta para total de registro filtrados
$sqlFiltro = "SELECT FOUND_ROWS()";
$resFiltro = $conexion->query($sqlFiltro);
$row_filtro = $resFiltro->fetch_array();
$totalFiltro = $row_filtro[0];

// Consulta para total de registro
$sqlTotal = "SELECT count($id) FROM $table ";
$resTotal = $conexion->query($sqlTotal);
$row_total = $resTotal->fetch_array();
$totalRegistros = $row_total[0];

// Mostrado resultados
$output = [];
$output['totalRegistros'] = $totalRegistros;
$output['totalFiltro'] = $totalFiltro;
$output['data'] = '';
$output['paginacion'] = '';

['consecutivo', 'folio', 'procedimiento', 'fecha_oficio', 'destinatario', 'cargo_destinatario', 'dependencia', 'asunto', 'abogado_solicitante', 'nivel', 'firma_oficio'];


if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        // Creamos un ID único para el modal, por ejemplo, basado en consecutivo y folio.
        $modalId = 'uploadModal' . $row['consecutivo'] . '-' . $row['folio'];

        $output['data'] .= '<tr>';
        $output['data'] .= '<td>' . $row['consecutivo'] . '</td>';
        $output['data'] .= '<td>' . $row['folio'] . '</td>';
        $output['data'] .= '<td>' . $row['procedimiento'] . '</td>';
        $output['data'] .= '<td>' . $row['fecha_oficio'] . '</td>';
        $output['data'] .= '<td>' . $row['destinatario'] . '</td>';
        $output['data'] .= '<td>' . $row['cargo_destinatario'] . '</td>';
        $output['data'] .= '<td>' . $row['dependencia'] . '</td>';
        $output['data'] .= '<td>' . $row['asunto'] . '</td>';
        $output['data'] .= '<td>' . $row['abogado_solicitante'] . '</td>';
        $output['data'] .= '<td>' . $row['nivel'] . '</td>';
        $output['data'] .= '<td>' . $row['firma_oficio'] . '</td>';
        $output['data'] .= '<td>
            <a class="btn btn-warning btn-sm" href="edita_oficio.php?id=' . $row['consecutivo'] . '">Editar</a>
        </td>';

        // Botón que abre el modal, utilizando el ID único generado.
        $output['data'] .= '<td>
            <a class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#' . $modalId . '">
                Subir Acuse
            </a>
        </td>';

        // Incluir el contenido del modal.
        // Se asume que el archivo "popup_subir_archivo.php" contiene la estructura HTML del modal.
        // Este archivo debe usar la variable $modalId para establecer el atributo id del modal.
        ob_start();
        include('popup_subir_archivo.php');
        $modalContent = ob_get_clean();
        $output['data'] .= $modalContent;

        $output['data'] .= "<td>
            <a class='btn btn-info btn-sm' href='elimiar.php?id=" . $row['consecutivo'] . "'>
                Ver Acuse
            </a>
        </td>";

        $output['data'] .= '</tr>';
    }
} else {
    $output['data'] .= '<tr>';
    $output['data'] .= '<td colspan="7">Sin resultados</td>';
    $output['data'] .= '</tr>';
}


// Paginación
if ($totalRegistros > 0) {
    $totalPaginas = ceil($totalFiltro / $limit);

    $output['paginacion'] .= '<nav>';
    $output['paginacion'] .= '<ul class="pagination">';

    $numeroInicio = max(1, $pagina - 4);
    $numeroFin = min($totalPaginas, $numeroInicio + 9);

    for ($i = $numeroInicio; $i <= $numeroFin; $i++) {
        $output['paginacion'] .= '<li class="page-item' . ($pagina == $i ? ' active' : '') . '">';
        $output['paginacion'] .= '<a class="page-link" href="#" onclick="nextPage(' . $i . ')">' . $i . '</a>';
        $output['paginacion'] .= '</li>';
    }

    $output['paginacion'] .= '</ul>';
    $output['paginacion'] .= '</nav>';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
