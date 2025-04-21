<?php
//******************************* CONSULTAS Y CONEXIÓN A LA BASE DE DATOS **********************************************
require_once('../includes/conexion.php');
//$id = $row['consecutivo'];
//$folio = $row['folio'];
// $sql =  "SELECT * FROM oficios WHERE consecutivo = $id";
// $resultado = $conexion->query($sql);
//*******************TERMINAN LAS CONSULTAS Y CONEXIÓN A LA BASE DE DATOS************************************************
?>
<!-- Modal para subir PDF -->
<!-- popup_subir_archivo.php -->
<div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" aria-labelledby="modalLabel<?php echo $modalId; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel<?= $row['consecutivo']; ?>">Subir PDF para Oficio No. <?= $row['consecutivo']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario para cargar el PDF -->
                <form action="procesa_pdf.php" method="post" enctype="multipart/form-data">
                    <!-- Enviar el ID del oficio mediante un campo oculto -->
                    <input type="hidden" name="consecutivo" value="<?= $row['consecutivo']; ?>">
                    <div class="mb-3">
                        <label for="archivo<?= $row['consecutivo']; ?>" class="form-label">Selecciona el PDF</label>
                        <input type="file" class="form-control" id="archivo<?= $row['consecutivo']; ?>" name="archivo" accept="application/pdf" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Subir PDF</button>
            </div>
        </div>
    </div>
</div>