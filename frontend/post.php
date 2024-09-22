<?php
include("../backend/contact.php");

if (isset($_POST["submit"])){
    echo "...SAVING!";
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
    
    #echo "Registrado!";
    header("Location: login.php");
}
