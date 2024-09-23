<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$user_id = $_SESSION['user_id'];
// echo $user_id;
?>
<?php include("../backend/contact.php")?>
<?php include("./header.php")?>
<?php include("./shopping_cart.php")?>
<?php include("./reservation.php")?>





<div class="bg-white">
  <div class="pt-6">

    <!-- gallery -->
    <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-x-8 lg:px-8">
      <div class="aspect-h-4 aspect-w-3 hidden overflow-hidden rounded-lg lg:block">
        <img src="./imagenes/<?php echo $service_id ?>.jpg" alt="Two each of gray, white, and black shirts laying flat." class="h-full w-full object-cover object-center">
      </div>
      <!-- <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
        <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
          <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-01.jpg" alt="Model wearing plain black basic tee." class="h-full w-full object-cover object-center">
        </div>
        <div class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg">
          <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-02.jpg" alt="Model wearing plain gray basic tee." class="h-full w-full object-cover object-center">
        </div>
      </div> -->
      <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
        <img src="imagenes/<?php echo $service_id . "-1" ?>.jpg" alt="Model wearing plain white basic tee." class="h-full w-full object-cover object-center">
      </div>
    </div>

    <!-- product info -->
    <div class="mx-auto max-w-2xl px-4 pb-16 pt-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8 lg:px-8 lg:pb-24 lg:pt-16">
      <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl"><?php echo $service['detail_service']; ?></h1>
      </div>

      <!-- options -->
      <div class="mt-4 lg:row-span-3 lg:mt-0">
        
        <p class="text-3xl tracking-tight text-gray-900"><?php echo "$ " . $service['price_service'];?></p>
            <?php
              $name_category = "SELECT c.name_category 
                            FROM categories c
                            JOIN service_categories sc ON c.id = sc.categories_id
                            JOIN service s ON s.id = sc.service_id
                            WHERE s.id = $service_id";
                $result = $conn->query($name_category);

                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                ?>
                <p class="text-sm text-gray-500 mb-4">
                  Category:  
                    <span class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
                        <?php echo $row['name_category']; ?>
                    </span>
                </p>
                <?php
                }
                } else {
                echo "No categories found for this service.";
                }
                ?>
        

        <!-- Reviews -->
        <!-- <div class="mt-6">
          <h3 class="sr-only">Reviews</h3>
          <div class="flex items-center">
            <div class="flex items-center">
               Active: "text-gray-900", Default: "text-gray-200" 
              <svg class="h-5 w-5 flex-shrink-0 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>
              <svg class="h-5 w-5 flex-shrink-0 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>
              <svg class="h-5 w-5 flex-shrink-0 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>
              <svg class="h-5 w-5 flex-shrink-0 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>
              <svg class="h-5 w-5 flex-shrink-0 text-gray-200" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>
            </div>
          </div>
        </div> -->

        <form action="reservation.php?id=<?php echo $service['id']; ?>" method="post" class="mt-10">
        <!-- action="service.php?id=<?php //echo $service['id']; ?>" -->
          <!-- Datos -->
          
          <div class="mt-10">

            <fieldset aria-label="Choose a size" class="mt-4">
              <!-- //DAY -->
                <label for="date" class="block text-lg font-medium text-gray-700 mb-2">Seleccionar día y hora</label>
                <input type="datetime-local" id="date" name="selected_date" class="block w-full p-2 border border-gray-300 rounded-md mb-4" />

                <!-- <label for="time" class="block text-lg font-medium text-gray-700 mb-2">Seleccionar hora</label>
                <input placeholder="example: 11:45:00" type="datetime" id="time" class="block w-full p-2 border border-gray-300 rounded-md mb-4" /> -->

                <!-- //SALON -->
                <!-- <label for="salon" class="block text-lg font-medium text-gray-700 mb-2">Seleccionar salón</label>
                <select id="salon" class="block w-full p-2 border border-gray-300 rounded-md mb-4"> -->
                    <?php
                    
                    // $query = "SELECT name_salon ,address_salon FROM salon";
                    // $result = $conn->query($query);
                    // while ($row = $result->fetch_assoc()) {
                     ?>
                    <!-- <option ><?php //echo $row['name_salon'] . " | " . $row['address_salon'];?></option> -->
                     <?php
                    // }
                    ?>
                    <?php
                    // $date = $_POST['date'];
                    // $time = $_POST['time'];

                    // if ($date && $time) {
                    //     $dateTime = $date . ' ' . $time;
                    // }
                    ?>
                </select>
            </fieldset>
          </div>
                <div id="reservarBtn">
                <button  type="submit" name="create_reservation" class="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Reservar ahora</button>
                </div>
        </form>
      </div>

      <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pb-16 lg:pr-8 lg:pt-6">
        <!-- Description and details -->
        <div>
          <h3 class="sr-only">Description</h3>
          <?php
              $name_category = "SELECT c.name_category, c.description_category 
                                FROM categories c
                                JOIN service_categories sc ON c.id = sc.categories_id
                                JOIN service s ON s.id = sc.service_id
                                WHERE s.id = $service_id";
              $result = $conn->query($name_category);

              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    ?>
                      <div class="space-y-6">
                        <p class="text-base text-gray-900"><?php echo $row['description_category']; ?></p>
                      </div>
                    <?php
                  }
                }
                  ?>
          

        </div>



        <!-- <div class="mt-10">
          <h2 class="text-sm font-medium text-gray-900">Details</h2>

          <div class="mt-4 space-y-6">
            <p class="text-sm text-gray-600">The 6-Pack includes two black, two white, and two heather gray Basic Tees. Sign up for our subscription service and be the first to get new, exciting colors, like our upcoming &quot;Charcoal Gray&quot; limited release.</p>
          </div>
        </div> -->
        <div id="successAlert" class="hidden bg-green-50 border border-green-400 text-green-800 px-4 py-3 rounded relative" role="alert">
          <span class="block sm:inline">Successfully reserved</span>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="closeAlert()"><path d="M14.348 5.652a.5.5 0 00-.707 0L10 9.293 6.36 5.653a.5.5 0 10-.707.707L9.293 10l-3.64 3.64a.5.5 0 00.707.707L10 10.707l3.64 3.64a.5.5 0 00.707-.707L10.707 10l3.641-3.641a.5.5 0 000-.707z"/></svg>
          </span>
        </div>

      </div>
    </div>
  </div>
</div>

<?php include("./footer.php")?>