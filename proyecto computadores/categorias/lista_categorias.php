<?php
include "../db.php";
session_start();

if (!isset($_SESSION['sesion_activa'])) {
    header("Location: ../iniciar_sesion.php");
    exit();
}

$consulta = $conexion->query("SELECT * FROM categorias");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Categorías</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;

            /* ⭐ Imagen de fondo clara */
            background-image: url('https://img.freepik.com/fotos-premium/mesa-madera-blanca-aparatos-vista-arriba_93675-331403.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;

            /* capa de color clara encima */
            background-color: rgba(255, 255, 255, 0.7);
            background-blend-mode: lighten;
        }

        .card {
            width: 80%;
            margin: 40px auto;
            background: rgba(255,255,255,0.88);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 4px 14px rgba(0,0,0,0.25);
            backdrop-filter: blur(6px);
        }

        h2 {
            text-align: center;
            color: #12141dff;
            margin-top: 0;
            font-size: 28px;
        }

        .btn {
            padding: 10px 15px;
            background: #003172ff;
            border-radius: 6px;
            color: white;
            text-decoration: none;
            font-size: 15px;
        }

        .btn:hover { background: #001b3fff; }

        .btn-danger {
            background: #d9534f;
        }

        .btn-danger:hover {
            background: #b52b27;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background: #000438ff;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }

        .top-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="card">

    <h2>Listado de Categorías</h2>

    <div class="top-buttons">
        <a href="../panel.php" class="btn">← Volver</a>
        <a href="nueva_categoria.php" class="btn">+ Nueva Categoría</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>

        <?php while ($fila = $consulta->fetch_assoc()) { ?>
        <tr>
            <td><?= $fila['id_categoria'] ?></td>
            <td><?= $fila['nombre'] ?></td>
            <td>
                <a class="btn" href="editar_categoria.php?id=<?= $fila['id_categoria'] ?>">Editar</a>
                <a class="btn btn-danger" href="eliminar_categoria.php?id=<?= $fila['id_categoria'] ?>"
                   onclick="return confirm('¿Eliminar categoría?');">
                   Eliminar
                </a>
            </td>
        </tr>
        <?php } ?>

    </table>
</div>

</body>
</html>
