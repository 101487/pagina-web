<?php
include "../db.php";
session_start();

if (!isset($_SESSION['sesion_activa'])) {
    header("Location: ../iniciar_sesion.php");
    exit();
}

// Obtener categorías para el select
$categorias = $conexion->query("SELECT * FROM categorias ORDER BY nombre ASC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Producto</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            /* Imagen de fondo */
            background: url('https://digitalreview.com.mx/wp-content/uploads/2023/12/Accesorios-que-no-pueden-faltar-en-tu-Laptop.jpg') no-repeat center center fixed;
            background-size: cover;
            /* Opcional: capa semitransparente encima del fondo */
        }

        /* Contenedor del formulario con fondo blanco semi-transparente */
        .container {
            background: rgba(255, 255, 255, 0.9); /* fondo blanco semi-transparente */
            width: 450px;
            margin: 60px auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2); /* sombra suave */
        }

        h2 {
            text-align: center;
            color: #00284bff;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border-radius: 6px;
            border: 1px solid #bbb;
        }

        .btn {
            margin-top: 20px;
            padding: 12px;
            background: #002342ff;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 7px;
            display: block;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background: #1d426dff;
        }

        .back {
            background: #757575;
            margin-top: 10px;
        }

        .back:hover {
            background: #555;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Registrar Nuevo Producto</h2>

    <form action="insertar_producto.php" method="POST">

        <label>Nombre del producto:</label>
        <input type="text" name="nombre" required>

        <label>Categoría:</label>
        <select name="id_categoria" required>
            <option value="">Seleccione</option>
            <?php while ($cat = $categorias->fetch_assoc()) { ?>
                <option value="<?= $cat['id_categoria'] ?>">
                    <?= $cat['nombre'] ?>
                </option>
            <?php } ?>
        </select>

        <label>Descripción:</label>
        <textarea name="descripcion" rows="3"></textarea>

        <label>Precio estimado:</label>
        <input type="number" name="precio_estimado" required>

        <label>Stock:</label>
        <input type="number" name="stock" required>

        <label>Fecha de ingreso:</label>
        <input type="date" name="fecha_ingreso" required>

        <label>Comentarios:</label>
        <textarea name="comentarios" rows="3"></textarea>

        <button class="btn" type="submit">Guardar Producto</button>
    </form>

    <a href="lista_productos.php" class="btn back">← Volver</a>

</div>

</body>
</html>
