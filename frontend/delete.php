<?php include("../backend/contact.php")?>
<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_reservation"])) {
//     if (isset($_POST["reservation_id"])) {
//         $reservation_id = $_POST["reservation_id"];

//         // Iniciar transacción para asegurar la consistencia
//         $conn->begin_transaction();

//         try {
//             // 1. Eliminar de la tabla shopping_list
//             $query1 = "DELETE FROM shopping_list WHERE reservations_id = ?";
//             $stmt1 = $conn->prepare($query1);
//             $stmt1->bind_param("i", $reservation_id);
//             $stmt1->execute();

//             // 2. Eliminar de la tabla reservations
//             $query2 = "DELETE FROM reservations WHERE id = ?";
//             $stmt2 = $conn->prepare($query2);
//             $stmt2->bind_param("i", $reservation_id);
//             $stmt2->execute();

//             // Si ambas eliminaciones fueron exitosas, hacer commit de la transacción
//             $conn->commit();

//             $_SESSION["message"] = "Reservación eliminada correctamente!";
//             $_SESSION["message_type"] = "success";
//         } catch (Exception $e) {
//             // Si ocurre algún error, revertir la transacción
//             $conn->rollback();

//             $_SESSION["message"] = "Error al eliminar la reservación: " . $e->getMessage();
//             $_SESSION["message_type"] = "danger";
//         }

//         // Redirigir a la página del carrito o la que sea necesaria
//         header("Location: index.php");
//         exit;
//     }
// }
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reservations_to_delete"])) {
    $reservationsToDelete = json_decode($_POST["reservations_to_delete"], true);

    if (!empty($reservationsToDelete)) {
        // Iniciar transacción para asegurar la consistencia
        $conn->begin_transaction();

        try {
            foreach ($reservationsToDelete as $reservation_id) {
                // 1. Eliminar de la tabla shopping_list
                $query1 = "DELETE FROM shopping_list WHERE reservations_id = ?";
                $stmt1 = $conn->prepare($query1);
                $stmt1->bind_param("i", $reservation_id);
                $stmt1->execute();

                // 2. Eliminar de la tabla reservations
                $query2 = "DELETE FROM reservations WHERE id = ?";
                $stmt2 = $conn->prepare($query2);
                $stmt2->bind_param("i", $reservation_id);
                $stmt2->execute();
            }

            // Si todas las eliminaciones fueron exitosas, hacer commit de la transacción
            $conn->commit();

            $_SESSION["message"] = "Reservaciones eliminadas correctamente!";
            $_SESSION["message_type"] = "success";
        } catch (Exception $e) {
            // Si ocurre algún error, revertir la transacción
            $conn->rollback();

            $_SESSION["message"] = "Error al eliminar las reservaciones: " . $e->getMessage();
            $_SESSION["message_type"] = "danger";
        }

        // Redirigir a la página del carrito o la que sea necesaria
        header("Location: index.php");
        exit;
    }
}
?>
