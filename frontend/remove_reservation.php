<script>
        let reservationIdsToDelete = [];

        function addToDeleteArray(reservationId) {
            const index = reservationIdsToDelete.indexOf(reservationId);
            let reserva = document.getElementById(`item-${reservationId}`);
            if (index > -1) {
                reservationIdsToDelete.splice(index, 1);
                reserva.classList.remove('bg-red-100');
            } else {
                reservationIdsToDelete.push(reservationId);
                reserva.classList.add('bg-red-100');
            }
            console.log('Array of reservations to delete:', reservationIdsToDelete);
        }
        function addPriceArray(price_service){

        }
        function confirmDeletions() {
            if (reservationIdsToDelete.length > 0) {
                // asignacion del array de id's al input oculto
                document.getElementById('reservationsToDeleteInput').value = JSON.stringify(reservationIdsToDelete);
                document.getElementById('deleteReservationsForm').submit();
            } else {
                alert('No hay reservaciones seleccionadas para eliminar.');
            }
        }


    </script>