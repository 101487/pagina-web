<?php
include "../db.php";
session_start();

if (!isset($_SESSION['sesion_activa'])) {
    header("Location: ../iniciar_sesion.php");
    exit();
}

// Validación
if (
    !isset($_POST['nombre']) ||
    !isset($_POST['id_categoria']) ||
    !isset($_POST['descripcion']) ||
    !isset($_POST['precio_estimado']) ||
    !isset($_POST['stock']) ||
    !isset($_POST['fecha_ingreso']) ||
    !isset($_POST['comentarios'])
) {
    echo "Error: faltan datos.";
    exit();
}

$nombre = $_POST['nombre'];
$id_categoria = $_POST['id_categoria'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio_estimado'];
$stock = $_POST['stock'];
$fecha = $_POST['fecha_ingreso'];
$comentarios = $_POST['comentarios'];

$sql = "INSERT INTO productos (nombre, id_categoria, descripcion, precio_estimado, stock, fecha_ingreso, comentarios)
        VALUES ('$nombre', '$id_categoria', '$descripcion', '$precio', '$stock', '$fecha', '$comentarios')";

if ($conexion->query($sql) === TRUE) {
    header("Location: lista_productos.php");
    exit();
} else {
    echo "Error al insertar: " . $conexion->error;
}
?>
