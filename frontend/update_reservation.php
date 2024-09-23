<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    echo $user_id; 
}
?>


<?php include("../backend/contact.php")?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reservations'])) {
    $conn->begin_transaction();

    try {
        foreach ($_POST['reservations'] as $reservation_id => $reservation_data) {
            $new_date = $reservation_data['date'];
            // Actualizar la fecha de la reserva
            $query = "UPDATE reservations SET date_reservation = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("si", $new_date, $reservation_id);
            $stmt->execute();
        }

        $conn->commit();

        $_SESSION["message"] = "Reservaciones actualizadas exitosamente!";
        $_SESSION["message_type"] = "success";

    } catch (Exception $e) {
        $conn->rollback();

        $_SESSION["message"] = "Error al actualizar las reservaciones: " . $e->getMessage();
        $_SESSION["message_type"] = "danger";
    }

    header("Location: reservations_list.php");
    exit;
}
?>

<?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-<?php echo $_SESSION['message_type']; ?>">
        <?php echo $_SESSION['message']; ?>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>


