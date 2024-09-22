<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    echo $user_id; 
}
?>
<?php include("./header.php")?>
<?php include("../backend/contact.php")?>
<?php include("./shopping_cart.php")?>

<?php


// Obtener las reservas del usuario actual
$query = "SELECT 
            r.id AS reservation_id, 
            r.date_reservation, 
            s.detail_service AS service_name
          FROM reservations r
          INNER JOIN 
          shopping_list sl ON r.id = sl.reservations_id
          INNER JOIN 
          service s ON sl.service_id = s.id
          WHERE r.user_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Reservaciones</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-md rounded-lg p-8 max-w-2xl w-full">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Actualizar Reservaciones</h2>

    <!-- Mostrar las reservaciones existentes del usuario -->
    <form action="process_update.php" method="POST" class="space-y-6">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="bg-gray-50 border border-gray-200 p-4 rounded-lg">
                <div class="flex items-center justify-between">
                    <div class="text-gray-700">
                        <span class="font-semibold">Servicio:</span> <?php echo $row['service_name']; ?>
                    </div>
                    <div class="flex space-x-4 items-center">
                        <label for="date-<?php echo $row['reservation_id']; ?>" class="text-sm text-gray-600">Fecha:</label>
                        <input type="datetime-local" name="reservations[<?php echo $row['reservation_id']; ?>][date]" class="w-48 p-2 border border-gray-300 rounded-md" value="<?php echo date('Y-m-d\TH:i', strtotime($row['date_reservation'])); ?>">
                    </div>
                </div>
            </div>
        <?php endwhile; ?>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                Guardar Cambios
            </button>
        </div>
    </form>
</div>

</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reservations'])) {
    // Iniciar una transacción
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

        // Si todo sale bien, hacer commit
        $conn->commit();

        $_SESSION["message"] = "Reservaciones actualizadas exitosamente!";
        $_SESSION["message_type"] = "success";

    } catch (Exception $e) {
        // Si ocurre algún error, revertir la transacción
        $conn->rollback();

        $_SESSION["message"] = "Error al actualizar las reservaciones: " . $e->getMessage();
        $_SESSION["message_type"] = "danger";
    }

    // Redirigir de nuevo a la página de actualizaciones
    header("Location: update_reservation.php");
    exit;
}
?>

<?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-<?php echo $_SESSION['message_type']; ?>">
        <?php echo $_SESSION['message']; ?>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>


<?php include("./footer.php")?>

