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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">

</head>
<body class="bg-rose-300" style="font-family: Roboto, sans-serif;">

    <!-- Header -->
    <header class="bg-purple-800 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 id="logo" style="font-family: Great Vibes, cursive;" class="text-6xl font-bold">Blessing</h1>
            <nav>
                <ul class="flex space-x-5 text-2xl">
                    <li><a href="./index.php" class="hover:text-rose-400">Inicio</a></li>
                    <li><a href="./update_reservation.php" class="hover:text-rose-400">Reservas</a></li>
                    <li><a href="#contact" class="hover:text-rose-400">Contacto</a></li>
                    <li><a id="open-cart" href="#" class="hover:text-rose-400">Carrito (<span id="cart-count">0</span>)</a></li>
                    <li>
                    <?php
                        if (isset($_SESSION['user_id'])) {
                            // Usuario está logueado
                            echo '<a type="button" class="hover:text-rose-400" href="logout.php">Log Out</a>'; 
                        } else {
                            // Usuario no está logueado
                            echo '<a type="button" class="hover:text-rose-400" href="login.php">Log In</a>'; 
                        }
                        ?>
                        <!-- <a href="./login.php" type="button" class="hover:text-gray-300">Log in</a> -->
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    