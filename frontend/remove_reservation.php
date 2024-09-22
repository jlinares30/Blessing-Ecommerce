<script>
        function removeReservation(reservationID){ 
            console.log(reservationID)
            document.getElementById(`item-${reservationID}`).classList.add('hidden')
        }
        let reservationIdsToDelete = [];

        function addToDeleteArray(reservationId, itemId) {
            // Si el ID ya está en el array, lo removemos
            const index = reservationIdsToDelete.indexOf(reservationId);
            if (index > -1) {
                reservationIdsToDelete.splice(index, 1);
                // Eliminar la clase de resaltado
                document.getElementById(`item-${itemId}`).classList.remove('bg-red-100');
            } else {
                // Si no está, lo agregamos
                reservationIdsToDelete.push(reservationId);
                // Agregar clase de resaltado visual para marcar que será eliminado
                document.getElementById(`item-${itemId}`).classList.add('bg-red-100');
            }
            console.log('Array of reservations to delete:', reservationIdsToDelete);
        }
        function confirmDeletions() {
            if (reservationIdsToDelete.length > 0) {
                // Asignar el array de IDs al input oculto
                document.getElementById('reservationsToDeleteInput').value = JSON.stringify(reservationIdsToDelete);

                // Enviar el formulario
                document.getElementById('deleteReservationsForm').submit();
            } else {
                alert('No hay reservaciones seleccionadas para eliminar.');
            }
        }


    </script>