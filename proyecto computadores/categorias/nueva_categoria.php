<?php
include "../db.php";
session_start();
if (!isset($_SESSION['sesion_activa'])) {
    header("Location: ../iniciar_sesion.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva categoría</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url("https://img.freepik.com/foto-gratis/fondo-tecnologia-digital-placa-circuito-futurista-lineas-datos-numeros_53876-124643.jpg") no-repeat center center fixed;
            background-size: cover;
        }

        .overlay {
            background: rgba(255, 255, 255, 0.80);
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0; left: 0;
        }

        .card {
            width: 420px;
            margin: 80px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.3);
            position: relative;
            z-index: 2;
        }

        h2 {
            text-align: center;
            margin-top: 0;
            color: #172333ff;
        }

        label {
            font-size: 16px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #aaa;
            font-size: 15px;
        }

        button {
            width: 100%;
            background: #9ac5ffff;
            color: white;
            padding: 10px;
            border: none;
            font-size: 16px;
            border-radius: 6px;
            margin-top: 15px;
            cursor: pointer;
        }

        button:hover {
            background: #000833ff;
        }

        .back-link {
            display: block;
            margin-top: 15px;
            text-align: center;
            text-decoration: none;
            color: #001f47ff;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="overlay"></div>

<div class="card">
    <h2>Agregar Nueva Categoría</h2>

    <form action="insertar_categoria.php" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <button type="submit">Guardar</button>
    </form>

    <a href="lista_categorias.php" class="back-link">← Volver</a>
</div>

</body>
</html>
