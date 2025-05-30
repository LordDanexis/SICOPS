<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Autocompletar con PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-3.7.1.min.js">
</head>
<body>
    <div class="container mt-5">
        <input type="text" id="search" class="form-control" placeholder="Buscar...">
        <div class="mt-3">
            <input type="text" id="cp" class="form-control mt-2" placeholder="Cuenta Pública" readonly>
            <input type="text" id="auditoria" class="form-control mt-2" placeholder="Auditoria" readonly>
            <input type="text" id="epra" class="form-control mt-2" placeholder="EPRA" readonly>
            <input type="text" id="entidad" class="form-control mt-2" placeholder="Entidad" readonly>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search').autocomplete({
                source: 'search.php',
                select: function(event, ui) {
                    $('#cp').val(ui.item.cp);
                    $('#auditoria').val(ui.item.auditoria);
                    $('#epra').val(ui.item.epra);
                    $('#entidad').val(ui.item.entidad);
                }
            });
        });
    </script>
</body>
</html>
