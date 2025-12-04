<?php
session_start();

// Usuario y contraseña definidos manualmente
$usuario_correcto = "admin";
$contrasena_correcta = "1234";

// Datos enviados desde el formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Validar credenciales
if ($usuario === $usuario_correcto && $contrasena === $contrasena_correcta) {
    
    // Guardar la sesión
    $_SESSION['sesion_activa'] = true;
    $_SESSION['usuario'] = $usuario;

    // Redirigir al panel
    header("Location: panel.php");
    exit();

} else {
    // Credenciales incorrectas
    echo "<script>
            alert('Usuario o contraseña incorrectos');
            window.location='iniciar_sesion.php';
          </script>";
}
?>
