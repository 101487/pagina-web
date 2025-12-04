<?php
include "../db.php";
session_start();

if (!isset($_SESSION['sesion_activa'])) {
    header("Location: ../iniciar_sesion.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "Error: id no especificado.";
    exit();
}

$id = intval($_GET['id']);

// ------------------------------
// 1️⃣ Verificar si la categoría tiene productos asociados
// ------------------------------
$check = $conexion->prepare("SELECT COUNT(*) FROM productos WHERE id_categoria = ?");
$check->bind_param("i", $id);
$check->execute();
$check->bind_result($total);
$check->fetch();
$check->close();

if ($total > 0) {
    echo "❌ No se puede eliminar esta categoría porque tiene $total productos asociados.<br>";
    echo "<a href='lista_categorias.php'>Volver</a>";
    exit();
}

// ------------------------------
// 2️⃣ Eliminar la categoría si no tiene productos
// ------------------------------
$stmt = $conexion->prepare("DELETE FROM categorias WHERE id_categoria = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: lista_categorias.php");
    exit();
} else {
    echo "❌ Error al eliminar: " . $conexion->error . "<br>";
    echo "<a href='lista_categorias.php'>Volver</a>";
}

$stmt->close();
$conexion->close();
?>
