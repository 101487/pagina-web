<?php
include "../db.php";
session_start();

$id = $_GET['id'];
$producto = $conexion->query("SELECT * FROM productos WHERE id_producto=$id");
$datos = $producto->fetch_assoc();

$categorias = $conexion->query("SELECT * FROM categorias");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Producto</title>

<style>
body { font-family: Arial; background:#001630ff; }
.container {
    width:450px; margin:40px auto; background:white; padding:25px;
    border-radius:10px; box-shadow:0 2px 10px rgba(0,0,0,0.2);
}
input, select, textarea {
    width:100%; padding:10px; border-radius:6px; border:1px solid #ccc;
    margin-bottom:12px;
}
.btn { padding:10px; background:#1e88e5; color:white;
    border:none; border-radius:6px; width:100%; }
.btn:hover { background:#1565c0; }
.back { background:#757575; padding:10px; border-radius:6px;
    text-align:center; display:block; margin-top:10px; color:white; text-decoration:none; }
</style>
</head>

<body>

<div class="container">
<h2>Editar Producto</h2>

<form action="actualizar_producto.php" method="POST">

    <input type="hidden" name="id" value="<?= $datos['id_producto'] ?>">

    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $datos['nombre'] ?>" required>

    <label>Categoría:</label>
    <select name="id_categoria" required>
        <?php while($c = $categorias->fetch_assoc()) { ?>
            <option value="<?= $c['id_categoria'] ?>"
                <?= $c['id_categoria']==$datos['id_categoria'] ? 'selected':'' ?>>
                <?= $c['nombre'] ?>
            </option>
        <?php } ?>
    </select>

    <label>Descripción:</label>
    <textarea name="descripcion"><?= $datos['descripcion'] ?></textarea>

    <label>Precio Estimado:</label>
    <input type="number" name="precio_estimado" value="<?= $datos['precio_estimado'] ?>">

    <label>Stock:</label>
    <input type="number" name="stock" value="<?= $datos['stock'] ?>">

    <label>Fecha ingreso:</label>
    <input type="date" name="fecha_ingreso" value="<?= $datos['fecha_ingreso'] ?>">

    <label>Comentarios:</label>
    <textarea name="comentarios"><?= $datos['comentarios'] ?></textarea>

    <button class="btn" type="submit">Guardar Cambios</button>
</form>

<a class="back" href="lista_productos.php">← Volver</a>
</div>

</body>
</html>
