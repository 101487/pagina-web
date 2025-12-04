<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            /* Imagen de fondo */
            background-image: url('https://blogdelomasvendido.com/wp-content/uploads/2024/01/Accesorios-para-laptops-y-PC.jpg');
            background-size: cover;
            background-position: center;

            /* Filtro para aclarar la imagen */
            backdrop-filter: brightness(0.65);
        }

        .login-box {
            background: rgba(255, 255, 255, 0.92);
            padding: 30px;
            width: 350px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.4);
            backdrop-filter: blur(5px);
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            margin-top: 0;
            color: #000153ff;
            font-size: 26px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #005096ff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 17px;
            cursor: pointer;
            margin-top: 5px;
        }

        button:hover {
            background: #6d92bdff;
        }

        .volver {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #1e88e5;
            text-decoration: none;
            font-size: 15px;
        }

        .volver:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body>

<div class="login-box">
    <h2>Iniciar Sesión</h2>

    <form method="POST" action="procesar_login.php">
        <label>Usuario:</label>
        <input type="text" name="usuario" required>

        <label>Contraseña:</label>
        <input type="password" name="contrasena" required>

        <button type="submit">Entrar</button>
    </form>

    <a class="volver" href="index.php">← Volver al Inicio</a>
</div>

</body>
</html>
