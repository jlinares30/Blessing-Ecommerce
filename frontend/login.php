<?php include("../backend/contact.php")?>
<?php
session_start(); // Iniciar sesión


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Buscar el usuario en la base de datos
    $sql = "SELECT * FROM user WHERE email_user = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        // Verificar la contraseña
        // if (password_verify($password, $user['password']))
        if ($password == $user['password']) {
            // Iniciar sesión, guardar el ID del usuario en la sesión
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['first_name_user'];
            echo "Inicio de sesión exitoso. Bienvenido, " . $_SESSION['user_name'];
            header("Location: index.php");
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Correo no registrado.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Blessing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .form-container {
            max-width: 400px;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="form-container bg-white p-8 rounded-lg shadow-lg w-full mx-4">
        <h2 class="text-2xl font-semibold mb-6 text-center">Log In</h2>
        <form action="login.php" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-left mb-2 text-gray-700">Email:</label>
                <input placeholder="Email Address" type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-left mb-2 text-gray-700">Password:</label>
                <input placeholder="Password" type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-6 flex items-center justify-between">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Log In</button>
                <a href="./signup.php" class="text-blue-500 hover:underline">Sign Up</a>
            </div>
        </form>
        <!-- <div class="text-center">
            <a href="forgot-password.html" class="text-blue-500 hover:underline">¿Olvidaste tu contraseña?</a>
        </div> -->
    </div>

</body>
</html>
