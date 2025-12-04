<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Computadores</title>

    <style>
        /* ================= FONDO ================= */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url("https://http2.mlstatic.com/D_NQ_896861-MLA70799053681_072023-OO.jpg");
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }

        /* Capa para aclarar el fondo y darle contraste */
        .overlay {
            background: rgba(255,255,255,0.85);
            min-height: 100vh;
            padding-bottom: 40px;
        }

        /* ================= HEADER ================= */
        header {
            text-align: center;
            background: #001244ff;
            padding: 20px;
            color: white;
            font-size: 28px;
            font-weight: bold;
        }

        /* ================= CONTENEDOR ================= */
        .container {
            width: 90%;
            max-width: 1100px;
            margin: auto;
            margin-top: 30px;
        }

        /* ================= CARRUSEL ================= */
        .carousel {
            width: 100%;
            height: 330px;
            overflow: hidden;
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            position: relative;
            margin-bottom: 40px;
        }

        .carousel img {
            width: 100%;
            height: 330px;
            object-fit: cover;
            display: none;
        }

        .carousel img.active {
            display: block;
        }

        /* ================= CARDS ================= */
        .cards {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            width: 300px;
            background: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 3px 8px rgba(0,0,0,0.2);
        }

        .card h3 {
            color: #001f3aff;
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            background: #002749ff;
            color: white;
            padding: 10px 14px;
            border-radius: 8px;
            text-decoration: none;
        }
        .btn:hover { background: #000638ff; }

        /* ================= CARDS CON IMAGEN ================= */
       .image-cards {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 40px;
    flex-wrap: wrap;
}

.img-card {
    width: 280px;
    background: rgba(255,255,255,0.9);
    padding: 15px;
    border-radius: 12px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.15);
    text-align: center;
}

.img-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;    /* <------ ESTO ES LO QUE FALTABA */
    border-radius: 10px;
}

    </style>
</head>

<body>
<div class="overlay">

<header>
    Bienvenido Admin
</header>

<div class="container">

    <!-- CARRUSEL ELEGANTE -->
    <div class="carousel">
        <img src="https://consumid.mx/wp-content/uploads/2023/11/Tendencias-en-perifericos-y-accesorios-de-computo.webp" class="active">
        <img src="https://intercompras.com/blog/wp-content/uploads/2024/04/Accesorios-para-laptops-Lo-que-necesitas-para-trabajar-en-cualquier-lugar.jpeg">
        <img src="https://cdn-dynmedia-1.microsoft.com/is/image/microsoftcorp/Content-Card-Surface-Accessories-Pro-Keyboard-Slim-Pen-Arc-Mouse?wid=834&hei=470&fit=crop&resSharp=1">
    </div>

    <script>
        let slide = 0;
        const imgs = document.querySelectorAll(".carousel img");
        setInterval(() => {
            imgs[slide].classList.remove("active");
            slide = (slide + 1) % imgs.length;
            imgs[slide].classList.add("active");
        }, 3500);
    </script>

    <!-- TITULO -->
    <h2 style="text-align:center; color:#08004eff;">Sistema de Gestión de Computadores</h2>
    <p style="text-align:center;">Administra productos, categorías e inventario fácilmente.</p>

    <!-- CARDS PRINCIPALES -->
    <div class="cards">
        <div class="card">
            <h3>Categorías</h3>
            <p>Gestiona todas las categorías.</p>
            <a href="categorias/lista_categorias.php" class="btn">Ir</a>
        </div>

        <div class="card">
            <h3>Productos</h3>
            <p>Registra y administra productos.</p>
            <a href="productos/lista_productos.php" class="btn">Ir</a>
        </div>

        <div class="card">
            <h3>Cerrar Sesión</h3>
            <p>Salir del sistema.</p>
            <a href="cerrar_sesion.php" class="btn" style="background:#c62828;">Salir</a>
        </div>
    </div>

    <!-- CARDS CON IMÁGENES ALINEADAS -->
    <div class="image-cards">
        <div class="img-card">
            <img src="https://st2.depositphotos.com/1177973/8308/i/450/depositphotos_83080308-stock-photo-computer-peripherals-and-laptop-accessories.jpg">
            <p>Equipos de escritorio</p>
        </div>

        <div class="img-card">
            <img src="https://digitalreview.com.mx/wp-content/uploads/2023/12/Accesorios-que-no-pueden-faltar-en-tu-Laptop.jpg">
            <p>Computadores portátiles</p>
        </div>

        <div class="img-card">
            <img src="https://st3.depositphotos.com/1051355/15622/i/450/depositphotos_156227310-stock-photo-modern-office-workplace-with-metallic.jpg">
            <p>Accesorios</p>
        </div>
    </div>

</div>

</div>
</body>
</html>
