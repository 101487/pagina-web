<?php
include "../db.php";
session_start();

if (!isset($_POST['id']) || !isset($_POST['nombre'])) {
    echo "Error: Datos incompletos.";
    exit();
}

$id          = $_POST['id'];
$nombre      = $_POST['nombre'];
$categoria   = $_POST['id_categoria'];
$descripcion = $_POST['descripcion'];
$precio      = $_POST['precio_estimado'];
$stock       = $_POST['stock'];
$fecha       = $_POST['fecha_ingreso'];
$comentarios = $_POST['comentarios'];

$sql = "UPDATE productos 
        SET nombre='$nombre',
            id_categoria='$categoria',
            descripcion='$descripcion',
            precio_estimado='$precio',
            stock='$stock',
            fecha_ingreso='$fecha',
            comentarios='$comentarios'
        WHERE id_producto='$id'";

if ($conexion->query($sql)) {
    header("Location: lista_productos.php");
} else {
    echo "Error: " . $conexion->error;
}
?>
