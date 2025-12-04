<?php
include "../db.php";
session_start();

$id = $_GET['id'];

$conexion->query("DELETE FROM productos WHERE id_producto=$id");

header("Location: lista_productos.php");
?>
