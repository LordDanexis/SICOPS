<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Subir Archivo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="fileInput" class="form-label">Selecciona un archivo</label>
                        <input type="file" class="form-control" id="fileInput" name="file">
                    </div>
                    <button type="submit" class="btn btn-success">Subir</button>
                </form>
            </div>
        </div>
    </div>
</div>