<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();

}
?>
<?php include("./header.php")?>
<?php include("../backend/contact.php")?>
<?php include("./shopping_cart.php")?>

    <!-- Hero Section -->
    <section id="home" class="bg-blue-200 py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-5xl font-semibold mb-4">Welcome to <span class="text-7xl" style="font-family: Great Vibes, cursive;">Blessing</span> </h2>
            <p class="text-xl mb-8">Find exclusive services for your lifestyle.</p>
            <a href="#products" class="bg-violet-400 text-white py-2 px-4 rounded hover:bg-purple-800">Explore</a>
        </div>
    </section>

    <!-- Products -->
    <div class="bg-violet-400">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="sr-only">Services</h2>

        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        <?php
            // Supongamos que estamos obteniendo todos los productos (servicios) desde la base de datos
            $query = "SELECT id, detail_service, price_service FROM service";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
            ?>
            <a href="service.php?id=<?php echo $row['id']; ?>" class="group">
                <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                <img src="./imagenes/<?php echo $row['id']; ?>.jpg" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                </div>
                <h3 class="mt-4 text-sm text-gray-700"> <?php echo $row['detail_service'] ?></h3>
                <p class="mt-1 text-lg font-medium text-gray-900"><?php echo $row['price_service'] ?></p>
            </a>
        <?php
        }
        ?>
        </div>
    </div>
    </div>


    <!-- Contact Section -->
    <section id="contact" class="bg-gray-200 py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-semibold mb-8">Contáctanos</h2>
            <form action="contact.php" method="POST" class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
                <div class="mb-4">
                    <label for="name" class="block text-left mb-2">Nombre:</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-left mb-2">Email:</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-left mb-2">Mensaje:</label>
                    <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Enviar</button>
            </form>
        </div>
    </section>

    <!-- Cart Section -->
    <section id="cart" class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-semibold mb-8">Tu Carrito</h2>
            <div id="cart-items" class="text-left mx-auto bg-white p-6 rounded-lg shadow-lg max-w-lg">
                <p class="text-gray-600">No tienes productos en tu carrito.</p>
            </div>
            <a href="#" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 mt-4 inline-block">Finalizar Compra</a>
        </div>
    </section>

<?php include("./footer.php")?>
