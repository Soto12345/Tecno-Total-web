<?php
require('connection.php');

// Ejemplo de consulta
$sql = "SELECT * FROM usuario";
$result = $connection->run_query($sql);

if ($result) {
    while ($fila = $result->fetch_assoc()) {
        echo "ID: " . $fila['ID_usuario'] . "<br>";
        echo "Correo: " . $fila['correo'] . "<br>";
    }
} else {
    echo "Error en la consulta: ";
}

// Cierra la conexión
$connection->Close_connection()
?>