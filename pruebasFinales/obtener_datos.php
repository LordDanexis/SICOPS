<?php
require_once('conexion2.php');
require_once('../includes/funciones.php');

$limit = $_GET['limit'] ?? 10;
$page = $_GET['page'] ?? 1;
$offset = ($page - 1) * $limit;

$where = [];
$params = [];
foreach (['cp', 'auditoria', 'entidad', 'monto_glob_epra'] as $campo) {
    if (!empty($_GET[$campo])) {
        $where[] = "$campo LIKE :$campo";
        $params[$campo] = '%' . $_GET[$campo] . '%';
    }
}
$whereSQL = $where ? 'WHERE ' . implode(' AND ', $where) : '';

// Consulta principal
$sql = "SELECT numero_dgsub, cp, auditoria, entidad, accion, edo_tramite_gral, edo_tramite_int FROM pra $whereSQL LIMIT :limit OFFSET :offset";
$stmt = $pdo->prepare($sql);
foreach ($params as $key => $val) {
    $stmt->bindValue(":$key", $val);
}
$stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Consulta total con filtros
$countSql = "SELECT COUNT(*) FROM pra $whereSQL";
$countStmt = $pdo->prepare($countSql);
foreach ($params as $key => $val) {
    $countStmt->bindValue(":$key", $val);
}
$countStmt->execute();
$total = $countStmt->fetchColumn();
$totalPages = ceil($total / $limit);

// Mostrar contador
echo "<div class='mb-2'><strong>Total de registros encontrados: $total</strong></div>";
echo "<table class='table table-bordered table-striped'>";
echo '<thead><tr>';
echo '<th>#</th>';
if (!empty($rows)) {
    foreach (array_keys($rows[0]) as $col) {
        echo "<th>$col</th>";
    }
    echo "<th>Acciones</th>";
    echo '</tr></thead><tbody>';
    $contador = $offset + 1;
    foreach ($rows as $row) {
        echo "<tr>";
        echo "<td>$contador</td>";
        foreach ($row as $val) {
            echo "<td>$val</td>";
        }
        echo "<td>
            <div class='d-flex gap-2'>
                <button class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#verModal' data-info='" . json_encode($row) . "'>Ver</button>
                <button class='btn btn-sm btn-warning' data-bs-toggle='modal' data-bs-target='#editarModal' data-info='" . json_encode($row) . "'>Editar</button>
                <!-- <button class='btn btn-sm btn-danger' onclick='confirmarEliminacion(\"{$row['numero_dgsub']}\")'>Eliminar</button>-->
                  <button class='btn btn-sm btn-success' onclick='generarNumeroExp(\"{$row['numero_dgsub']}\")'>Generar</button>
            </div>
        </td>";
        echo '</tr>';
        $contador++;
    }
    echo '</tbody></table>';
} else {
    echo '<tr><td colspan="10" class="text-center">No se encontraron resultados</td></tr></thead></table>';
}

// Paginación mejorada
echo '<nav><ul class="pagination">';

$maxPagesToShow = 30;
$startPage = max(1, $page - floor($maxPagesToShow / 2));
$endPage = min($totalPages, $startPage + $maxPagesToShow - 1);
if ($endPage - $startPage + 1 < $maxPagesToShow) {
    $startPage = max(1, $endPage - $maxPagesToShow + 1);
}

// Botón Anterior
if ($page > 1) {
    echo "<li class='page-item'>
        <a class='page-link' href='#' onclick='event.preventDefault(); cambiarPagina(" . ($page - 1) . ")'>&laquo;</a>
    </li>";
}

// Botones de página
for ($i = $startPage; $i <= $endPage; $i++) {
    $active = $i == $page ? 'active' : '';
    echo "<li class='page-item $active'>
        <a class='page-link' href='#' onclick='event.preventDefault(); cambiarPagina($i)'>$i</a>
    </li>";
}

// Botón Siguiente
if ($page < $totalPages) {
    echo "<li class='page-item'>
        <a class='page-link' href='#' onclick='event.preventDefault(); cambiarPagina(" . ($page + 1) . ")'>&raquo;</a>
    </li>";
}

echo '</ul></nav>';
