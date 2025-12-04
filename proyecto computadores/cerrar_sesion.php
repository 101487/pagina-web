<?php
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión completa
session_destroy();

// Redirigir al login
header("Location: iniciar_sesion.php");
exit();
?>
