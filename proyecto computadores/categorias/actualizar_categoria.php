<?php
include "../db.php";
session_start();

if (!isset($_SESSION['sesion_activa'])) {
    header("Location: ../iniciar_sesion.php");
    exit();
}

if (!isset($_POST['id']) || !isset($_POST['nombre'])) {
    echo "Error: No llegaron los datos.";
    exit();
}

$id = $_POST['id'];
$nombre = $_POST['nombre'];

$sql = "UPDATE categorias SET nombre='$nombre' WHERE id_categoria='$id'";

if ($conexion->query($sql) === true) {
    header("Location: lista_categorias.php");
    exit();
} else {
    echo "Error al actualizar: " . $conexion->error;
}

