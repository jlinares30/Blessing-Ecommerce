<?php
// Al cerrar sesión
session_start();
session_unset(); // Destruir todas las variables de sesión
session_destroy(); // Destruir la sesión
header("Location: index.php"); // Redirigir a la página de inicio de sesión o a otra página
exit();
?>
