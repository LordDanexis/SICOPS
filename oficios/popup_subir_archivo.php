<?php
// Incluye funciones necesarias y obtiene la fecha actual
require_once('../includes/funciones.php');
$fecha_actual = date("Y-m-d");
?>

<!-- Modal -->
<div class="modal fade" id="<?= $modalId; ?>" tabindex="-1" aria-labelledby="modalLabel<?= $modalId; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Subir PDF para Oficio No. <?= $row['folio']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Se envían las variables ocultas junto con el archivo -->
                <form action="procesa_pdf.php" method="post" enctype="multipart/form-data" target="../index.php">
                    <input type="hidden" name="consecutivo" value="<?= $row['consecutivo']; ?>">
                    <input type="hidden" name="folio" value="<?= ivalorSeguro2($row['folio']); ?>">
                    <input type="hidden" name="procedimiento" value="<?= ivalorSeguro2($row['procedimiento']); ?>">
                    <input type="hidden" name="fecha_actual" value="<?= $fecha_actual; ?>">

                    <div class="mb-3">
                        <label for="archivo<?= $row['consecutivo']; ?>" class="form-label">Selecciona el PDF</label>
                        <input type="file" class="form-control" id="archivo<?= $row['consecutivo']; ?>" name="archivo" accept="application/pdf" required>
                    </div>

                    <button type="submit" class="btn btn-success">Subir PDF</button>
                </form>
            </div>
        </div>
    </div>
</div>