<?php
$conexion = new mysqli("localhost", "root", "", "computadores");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>