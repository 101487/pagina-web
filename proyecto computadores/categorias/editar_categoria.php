<?php
include "../db.php";
session_start();

if (!isset($_SESSION['sesion_activa'])) {
    header("Location: ../iniciar_sesion.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "Error: no llegó el ID.";
    exit();
}

$id = $_GET['id'];

$consulta = $conexion->query("SELECT * FROM categorias WHERE id_categoria = $id");

if ($consulta->num_rows == 0) {
    echo "Categoría no encontrada.";
    exit();
}

$datos = $consulta->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Categoría</title>

    <style>
        body {
            font-family: Arial;
            background: #e3f2fd;
            padding: 0;
            margin: 0;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #04213aff;
            margin-top: 0;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border-radius: 6px;
            border: 1px solid #bbb;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            background: #6190b9ff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #001630ff;
        }

        a {
            display: block;
            text-align: center;
            background: #757575;
            padding: 10px;
            margin-top: 10px;
            color: white;
            border-radius: 6px;
            text-decoration: none;
        }
    </style>

</head>
<body>

<div class="container">
    <h2>Editar Categoría</h2>

    <form action="actualizar_categoria.php" method="POST">

        <input type="hidden" name="id" value="<?php echo $datos['id_categoria']; ?>">

        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $datos['nombre']; ?>" required>

        <button type="submit">Guardar Cambios</button>
    </form>

    <a href="lista_categorias.php">Volver</a>
</div>

</body>
</html>
