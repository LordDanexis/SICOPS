<link rel="stylesheet" href="css/estiloEncabezado.css" type="text/css" media="screen" title="default" />
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Bungee+Inline&family=DM+Serif+Display:ital@0;1&family=Doto:wght,ROND@700,4&family=Faculty+Glyphic&family=Monomakh&family=Shafarik&display=swap" rel="stylesheet">

<div id="page-top-outer" style="position:relative">

    <div id="page-top">
        <div id='sagap'>
            <div id='logoSis'><img src="images/logo.png" alt="" /></div>
            <div class='nomSis' id='nombre'> <span class='nomSis'> SICOPS </span> <span class='nomSis2'> DGSUB </span> </div>
            <div id='texto'> Sistema de Consulta y Organización para Substanciación </div>

            <div id='fechaHora'>
                <?php echo date(' d/m/Y ');
                echo date(' g:ia '); ?>
                <script>
                    var d = new Date();
                    var hour = (d.getHours(), ':' + d.getMinutes(), ':' + d.getSeconds());
                </script>
            </div>

        </div>
        <div id="logo"> <a href="index.php"><img src="images/logoasfok.png" alt="" /></a> </div>
    </div>

</div>