<?php include("../backend/contact.php")?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    echo $user_id; 
}
?>
<?php include("./update_reservation.php")?>
<?php include("./header.php")?>
<?php include("./shopping_cart.php")?>

<div class="bg-white shadow-md rounded-lg p-8 max-w-2xl w-full">
    <h2 class="text-2xl font-bold text-gray-800 mb-8">Actualizar Reservaciones</h2>

    <?php
        // obtener las reservas del usuario activo
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
    <!-- RESERVACIONES -->
    <form action="update_reservation.php" method="POST" class="space-y-6">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="bg-gray-50 border border-gray-300 p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="text-gray-700">
                        <span class="font-semibold">Servicio:</span> <?php echo $row['service_name']; ?>
                    </div>
                    <div class="flex space-x-4 items-center">
                        <label for="date-<?php echo $row['reservation_id']; ?>" class="text-sm text-gray-600">Fecha:</label>
                        <input type="datetime-local" name="reservations[<?php echo $row['reservation_id']; ?>][date]" class="w-48 p-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300 focus:outline-none transition-colors" value="<?php echo date('Y-m-d\TH:i', strtotime($row['date_reservation'])); ?>">
                    </div>
                </div>
            </div>
        <?php endwhile; ?>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-md transition-transform transform hover:scale-105">
                Guardar Cambios
            </button>
        </div>
    </form>
</div>

<?php include("./footer.php")?>
