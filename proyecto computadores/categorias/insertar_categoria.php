<?php
include "../db.php";
session_start();
if (!isset($_SESSION['sesion_activa'])) {
    header("Location: ../iniciar_sesion.php");
    exit();
}
if (!isset($_POST['nombre'])) {
    echo "Error: faltan datos.";
    exit();
}
$nombre = trim($_POST['nombre']);
$stmt = $conexion->prepare("INSERT INTO categorias (nombre) VALUES (?)");
$stmt->bind_param("s", $nombre);
if ($stmt->execute()) {
    header("Location: lista_categorias.php");
    exit();
} else {
    echo "Error al insertar: " . $conexion->error;
}


