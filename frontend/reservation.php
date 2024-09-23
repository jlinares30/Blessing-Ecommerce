<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$user_id = $_SESSION['user_id'];
// echo $user_id;
?>
<?php include("../backend/contact.php")?>

<?php
if (isset($_GET['id'])) {
    $service_id = intval($_GET['id']);
    // echo $service_id;


    $stmt = $conn->prepare("SELECT * FROM service WHERE id = ?");
    $stmt->bind_param("i", $service_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $service = $result->fetch_assoc();
    } else {
        echo "Service not found!";
        exit();
    }
} else {
    echo "Invalid service!";
    exit();
}
?>
<?php
    // INSERTANDO A LA BASE DE DATOS
    if (isset($_POST["create_reservation"]) && isset($_POST['selected_date'])){
        $dateTime = $_POST['selected_date'];
        $query2 = "INSERT INTO reservations (date_reservation, user_id) VALUES ('$dateTime', '$user_id')";
        $result2 = mysqli_query($conn, $query2);
    if ($result2) {
        $reservations_id = $conn->insert_id;

        $query3 = "INSERT INTO shopping_list (reservations_id, service_id) VALUES ('$reservations_id', '$service_id')";
        $result3 = mysqli_query($conn, $query3);

        if ($result3) {
            $_SESSION["message"] = "Reservación creada exitosamente!";
            $_SESSION["message_type"] = "success";
        } else {
            die("Error al insertar en shopping_list: " . mysqli_error($conn));
        }
        echo "<script>showAlert();</script>";
        
    } else {
        die("Error al insertar en reservations: " . mysqli_error($conn));
    }
    sleep(1);
    header("Location: index.php");
    exit;
        }
?>
