<?php include("../backend/contact.php")?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reservations_to_delete"])) {
    $reservationsToDelete = json_decode($_POST["reservations_to_delete"], true);

    if (!empty($reservationsToDelete)) {
        $conn->begin_transaction();

        try {
            foreach ($reservationsToDelete as $reservation_id) {
                // eliminar de la tabla shopping_list
                $query1 = "DELETE FROM shopping_list WHERE reservations_id = ?";
                $stmt1 = $conn->prepare($query1);
                $stmt1->bind_param("i", $reservation_id);
                $stmt1->execute();

                // eliminar de la tabla reservations
                $query2 = "DELETE FROM reservations WHERE id = ?";
                $stmt2 = $conn->prepare($query2);
                $stmt2->bind_param("i", $reservation_id);
                $stmt2->execute();
            }
            $conn->commit();

            $_SESSION["message"] = "Reservaciones eliminadas correctamente!";
            $_SESSION["message_type"] = "success";
        } catch (Exception $e) {
            $conn->rollback();

            $_SESSION["message"] = "Error al eliminar las reservaciones: " . $e->getMessage();
            $_SESSION["message_type"] = "danger";
        }

        header("Location: index.php");
        exit;
    }
}
?>
