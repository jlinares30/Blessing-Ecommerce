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
<?php include("./remove_reservation.php")?>

    <!-- Carrito -->
    <div  class="relative z-50 pointer-events-none" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <!--
          Background backdrop, show/hide based on slide-over state.
      
          Entering: "ease-in-out duration-500"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in-out duration-500"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div id="background-backdrop" class="ease-in-out duration-500 fixed inset-0 transition-opacity" aria-hidden="true"></div>
        <!-- bg-gray-500 bg-opacity-75 -->
        <div  class="fixed inset-0 overflow-hidden">
          <div  class="absolute inset-0 overflow-hidden">
            <div id="shopping-cart" class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 translate-x-full">
              <!--
                Slide-over panel, show/hide based on slide-over state.
      
                Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                  From: "translate-x-full"
                  To: "translate-x-0"
                Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                  From: "translate-x-0"
                  To: "translate-x-full"
              -->
              <div  class="pointer-events-auto w-screen max-w-md">
                <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                  <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                    <div class="flex items-start justify-between">
                      <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                      <div class="ml-3 flex h-7 items-center">
                        <button id="close-cart" type="button" class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                          <span class="absolute -inset-0.5"></span>
                          <span class="sr-only">Close panel</span>
                          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                        </button>
                      </div>
                    </div>
      
                    <div class="mt-8">
                      <div class="flow-root">
                        <ul role="list" class="-my-6 divide-y divide-gray-200">

                        <?php
                            $sql = "SELECT
                                        re.id AS reservation_id, 
                                        s.detail_service AS service_name, 
                                        s.price_service AS price, 
                                        sp.name_specialist AS specialist_name, 
                                        sa.name_salon AS salon_name, 
                                        re.date_reservation AS date
                                        FROM 
                                            shopping_list sl
                                        INNER JOIN 
                                            service s ON sl.service_id = s.id
                                        INNER JOIN 
                                            reservations re ON sl.reservations_id = re.id
                                        INNER JOIN 
                                            specialist sp ON s.specialist_id = sp.id
                                        INNER JOIN 
                                            salon sa ON sp.salon_id = sa.id
                                        WHERE 
                                            re.user_id = ?"; 
                                // Ejecutar la consulta
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $user_id);
                                $stmt->execute();
                                $result = $stmt->get_result();
                            while ($row = $result->fetch_assoc()) {
                            ?>
                              <li class="flex py-6" id="item-<?php echo $row['reservation_id']; ?>">
                                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center">
                                </div>
      
                                <div class="ml-4 flex flex-1 flex-col">
                                    <div>
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <h3>
                                        <a href="#"><?php echo $row["service_name"]?> </a>
                                        </h3>
                                        <p class="ml-4"><?php echo $row["price"]?></p>
                                    </div>
                                        <p class="mt-1 text-sm text-gray-500"><?php echo $row["specialist_name"]?></p>
                                        <p class="mt-1 text-sm text-gray-500"><?php echo $row["salon_name"]?></p>
                                    </div>
                                <div class="flex flex-1 items-end justify-between text-sm">
                                    <p class="text-gray-500"><?php echo $row["date"]?></p>
      
                                <div class="flex">
                                
                                    <!-- <form action="shopping_cart.php" method="POST"> -->
                                    <!-- <input type="hidden" name="reservation_id" value="<?php //echo $row['reservation_id']; ?>"> -->
                                    <!-- <button type="submit" id="delete" name="delete_reservation" class="font-medium text-red-600 hover:text-red-500" >Remove</button> -->
                                    <button type="button" class="font-medium text-red-600 hover:text-red-500" onclick="addToDeleteArray(<?php echo $row['reservation_id']; ?>, '<?php echo $row['reservation_id']; ?>')">Remove</button>
                                    <!-- </form> -->
                                </div>
                                </div>
                            </div>
                          </li>  
                            <?php
                            }
                            ?>
                        </ul>
                      </div>
                    </div>
                  </div>
      
                  <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                    <div class="flex justify-between text-base font-medium text-gray-900">
                      <p>Subtotal</p>
                      <p>$262.00</p>
                    </div>
                    <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                    <!-- <div class="mt-6">
                      <a href="#" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
                    </div> -->
                    <form id="deleteReservationsForm" action="delete.php" method="POST">
                        <input type="hidden" name="reservations_to_delete" id="reservationsToDeleteInput">
                        <button type="button" class="font-medium text-green-600 hover:text-green-500" onclick="confirmDeletions()">Confirmar</button>
                    </form>

                    <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                      <p>
                        or
                        <button id="continue-shopping" type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
                          Continue Shopping
                          <span aria-hidden="true"> &rarr;</span>
                        </button>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>