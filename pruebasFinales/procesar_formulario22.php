<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h5>Datos recibidos:</h5><ul>";
    foreach ($_POST as $campo => $valor) {
        echo "<li><strong>$campo:</strong> " . htmlspecialchars($valor) . "</li>";
    }
    echo "</ul>";
} else {
    echo "Acceso no permitido.";
}
