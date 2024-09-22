<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
    $user_id = $_SESSION['user_id'];
    echo $user_id;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blessing E-commerce</title>
    <!-- Incluye Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./css/styles.css">

</head>
<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-blue-600 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold">Blessing</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="./index.php" class="hover:text-gray-300">Inicio</a></li>
                    <li><a href="#products" class="hover:text-gray-300">Productos</a></li>
                    <li><a href="#contact" class="hover:text-gray-300">Contacto</a></li>
                    <li><a id="open-cart" href="#" class="hover:text-gray-300">Carrito (<span id="cart-count">0</span>)</a></li>
                    <li>
                    <?php
                        if (isset($_SESSION['user_id'])) {
                            // Usuario está logueado
                            echo '<a type="button" class="hover:text-gray-300" href="logout.php">Log Out</a>'; // Enlaza a la página que maneja el cierre de sesión
                        } else {
                            // Usuario no está logueado
                            echo '<a type="button" class="hover:text-gray-300" href="login.php">Log In</a>'; // Enlaza a la página de inicio de sesión
                        }
                        ?>
                        <!-- <a href="./login.php" type="button" class="hover:text-gray-300">Log in</a> -->
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    