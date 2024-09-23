<?php
session_start();
session_unset(); // destruye las variables de sesion
session_destroy(); // destruye la sesion
header("Location: index.php");
exit();
?>
