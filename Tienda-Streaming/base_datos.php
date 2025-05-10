<?php
$conexion = new mysqli("localhost", "root", "", "tienda");
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
