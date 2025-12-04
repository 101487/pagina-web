<?php
include "../db.php";
session_start();

if (!isset($_SESSION['sesion_activa'])) {
    header("Location: ../iniciar_sesion.php");
    exit();
}

$consulta = $conexion->query("
    SELECT p.id_producto, p.nombre, c.nombre AS categoria, p.precio_estimado, p.stock, p.fecha_ingreso
    FROM productos p
    INNER JOIN categorias c ON p.id_categoria = c.id_categoria
");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>

    <style>
        /* Fondo con imagen + sobrecapa clara */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('https://img.freepik.com/foto-gratis/ordenador-portatil-telefono-movil-taza-cafe-material-oficina-fondo-blanco_23-2147956589.jpg?semt=ais_hybrid&w=740&q=80') no-repeat center center fixed;
            background-size: cover;
        }

        /* Capa blanca transparente para aclarar */
        .overlay {
            background: rgba(255,255,255,0.78);
            min-height: 100vh;
            padding: 0;
            margin: 0;
        }

        header {
            background: rgba(0, 2, 94, 0.92);
            color: #fff;
            padding: 15px;
            text-align: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.3);
        }

        .container {
            width: 85%;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.25);
        }

        .btn {
            padding: 10px 15px;
            text-decoration: none;
            background: #3b688fff;
            color: white;
            border-radius: 6px;
            margin-right: 10px;
            transition: 0.2s;
        }

        .btn:hover {
            background: #001630ff;
        }

        .btn-danger {
            background: #c62828;
        }

        .btn-danger:hover {
            background: #8e0000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th {
            background: #00144dff;
            color: white;
            padding: 10px;
        }

        table td {
            text-align: center;
            padding: 10px;
            background: #f9f9f9;
            border-bottom: 1px solid #ccc;
        }

        table tr:hover td {
            background: #eef6ff;
        }
    </style>
</head>

<body>

<div class="overlay">

<header>
    <h1>Listado de Productos</h1>
</header>

<div class="container">

    <a href="../panel.php" class="btn">← Volver al Panel</a>
    <a href="nuevo_producto.php" class="btn">+ Nuevo Producto</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio Estimado</th>
            <th>Stock</th>
            <th>Fecha de Ingreso</th>
            <th>Acciones</th>
        </tr>

        <?php while ($fila = $consulta->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila['id_producto']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['categoria']; ?></td>
                <td>$<?php echo $fila['precio_estimado']; ?></td>
                <td><?php echo $fila['stock']; ?></td>
                <td><?php echo $fila['fecha_ingreso']; ?></td>

                <td>
                    <a class="btn" href="editar_producto.php?id=<?php echo $fila['id_producto']; ?>">Editar</a>

                    <a class="btn btn-danger" 
                       href="eliminar_producto.php?id=<?php echo $fila['id_producto']; ?>"
                       onclick="return confirm('¿Seguro que deseas eliminar este producto?');">
                        Eliminar
                    </a>
                </td>
            </tr>
        <?php } ?>

    </table>

</div>

</div>

</body>
</html>
