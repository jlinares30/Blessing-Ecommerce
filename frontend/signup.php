<?php include("../backend/contact.php")?>
<?php
if (isset($_POST["create_user"])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $lastname = $_POST['lastname'];
    $phoneNumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    

    $query = "INSERT INTO user (first_name_user,last_name_user, email_user, phone_number_user, password) VALUES ('$name', '$lastname','$email','$phoneNumber','$password' )";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query Failed");
    }

    $_SESSION["message"] = "Tarea registrada exitosamente!";
    $_SESSION["message_type"] = "success";

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Blessing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .form-container {
            max-width: 500px;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="form-container bg-white p-8 rounded-lg shadow-lg w-full mx-4">
        <h2 class="text-2xl font-semibold mb-6 text-center">Sign Up</h2>
        <form action="signup.php" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-left mb-2 text-gray-700">Name:</label>
                <input placeholder="Name" ="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="lastname" class="block text-left mb-2 text-gray-700">Lastname:</label>
                <input placeholder="Lastname" type="text" id="lastname" name="lastname" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-left mb-2 text-gray-700">E-mail:</label>
                <input placeholder="E-mail" type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="phonenumber" class="block text-left mb-2 text-gray-700">Phone Number:</label>
                <input placeholder="Phone Number" type="number" id="phonenumber" name="phonenumber" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-left mb-2 text-gray-700">Password:</label>
                <input placeholder="Password" type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-6 flex items-center justify-between">
                <button type="submit" name="create_user" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Crear Cuenta</button>
                <a href="./login.php" class="text-blue-500 hover:underline">I already have an account</a>
            </div>
        </form>
    </div>
</body>
</html>
