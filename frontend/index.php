<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<?php include("../backend/contact.php")?>
<?php include("./header.php")?>
<?php include("./shopping_cart.php")?>

    <!-- HERO SECTION -->
    <section id="home" class="py-16 opacity-50">
        <div class="container mx-auto text-center">
            <h2 class="text-6xl font-bold mb-4">Welcome to <span class="text-9xl" style="font-family: Great Vibes, cursive;">Blessing</span> </h2>
            <p class="text-2xl mb-8">Find exclusive services for your lifestyle.</p>
            <a href="#services" class="bg-violet-400 text-white py-4 px-6 text-lg rounded hover:bg-purple-800">Explore</a>
        </div>
    </section>

    <!-- SERVICES -->
    <div id="services" class="bg-violet-400">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="sr-only">Services</h2>

        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        <?php
            $query = "SELECT id, detail_service, price_service FROM service";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
            ?>
            <?php if (session_status() == PHP_SESSION_NONE){?>
                <a href="login.php" class="group">
                    <?php 
                }
                else{ ?>
                    <!-- echo "service.php?id=" . $row['id']; -->
                    <a href="service.php?id=<?php echo $row['id']?>" class="group">
                <?php
                }?>
           
                <div id="conteniner-img-service" class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                <img id="img-service" src="./imagenes/<?php echo $row['id']; ?>.jpg" alt="image" class="h-full w-full object-cover object-center group-hover:opacity-75">
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

    <section  class="bg-purple-900 text-white pt-44	">
        <div id="section-presentation" class="container mx-auto px-10 pb-8">
            <p class="text-purple-300 text-center mb-2">Experiencia de belleza</p>
            <h2 class="text-4xl font-bold text-center mb-8">Todo lo que necesitas para realzar tu belleza</h2>
            <p class="text-center max-w-2xl mx-auto mb-12">
            En Blessing, nos dedicamos a resaltar tu belleza natural. Nuestros expertos estilistas y esteticistas están aquí para transformar tu apariencia y aumentar tu confianza.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center mb-4">
                <svg class="w-6 h-6 mr-2 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="text-xl font-semibold">Cortes de cabello</h3>
                </div>
                <p class="text-purple-200">Nuestros estilistas expertos te darán el corte perfecto que complementa tus rasgos y estilo de vida.</p>
                <!-- <a href="#" class="text-purple-300 hover:text-purple-100 mt-4 inline-block">Saber más &rarr;</a> -->
            </div>

            <div>
                <div class="flex items-center mb-4">
                <svg class="w-6 h-6 mr-2 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                <h3 class="text-xl font-semibold">Tratamientos faciales</h3>
                </div>
                <p class="text-purple-200">Rejuvenece tu piel con nuestros tratamientos faciales personalizados para todo tipo de piel.</p>
                <!-- <a href="#" class="text-purple-300 hover:text-purple-100 mt-4 inline-block">Saber más &rarr;</a> -->
            </div>

            <div>
                <div class="flex items-center mb-4">
                <svg class="w-6 h-6 mr-2 text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                <h3 class="text-xl font-semibold">Manicura y pedicura</h3>
                </div>
                <p class="text-purple-200">Dale a tus manos y pies el cuidado que merecen con nuestros servicios de manicura y pedicura de lujo.</p>
                <!-- <a href="#" class="text-purple-300 hover:text-purple-100 mt-4 inline-block">Saber más &rarr;</a> -->
            </div>
            </div>
        </div>
    </section>


    <section  class="pt-32 pb-44 bg-gradient-to-r from-purple-50 via-white to-purple-50">
    <div id="section-testimonial" class="max-w-7xl mx-auto px-6 lg:px-8">
        <h2 class="text-center text-3xl font-extrabold text-gray-900 mb-6">Testimonials</h2>
        <p class="text-center text-lg text-gray-500 mb-12">We have worked with thousands of amazing people</p>
        
        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <p class="text-gray-600 italic">"Laborum quis quam. Dolorum et ut quod quia. Voluptas numquam delectus nihil. Aut enim doloremque et ipsum."</p>
                <div class="mt-4 flex items-center">
                    <img src="https://randomuser.me/api/portraits/women/1.jpg" alt="Leslie Alexander" class="w-10 h-10 rounded-full">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">Leslie Alexander</p>
                        <p class="text-sm text-gray-500">@lesliealexander</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white shadow-lg rounded-lg p-6">
                <p class="text-gray-600 italic">"Quia dolorem qui et. Atque quo aliquid sit eos officia. Dolores similique laboriosam quaerat cupiditate."</p>
                <div class="mt-4 flex items-center">
                    <img src="https://randomuser.me/api/portraits/men/2.jpg" alt="Michael Foster" class="w-10 h-10 rounded-full">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">Michael Foster</p>
                        <p class="text-sm text-gray-500">@michaelfoster</p>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6">
                <p class="text-gray-600 italic">"Consequatur ut atque. Itaquem nostrum molestiae id veniam eos cumque. Ut quia eum fugit laborum autem inventore ut voluptate."</p>
                <div class="mt-4 flex items-center">
                    <img src="https://randomuser.me/api/portraits/men/3.jpg" alt="Dries Vincent" class="w-10 h-10 rounded-full">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">Dries Vincent</p>
                        <p class="text-sm text-gray-500">@driesvincent</p>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6">
                <p class="text-gray-600 italic">"Integer id nunc sit semper purus. Bibendum at lacus ut arcu blandit montes vitae auctor libero."</p>
                <div class="mt-4 flex items-center">
                    <img src="https://randomuser.me/api/portraits/women/4.jpg" alt="Brenna Goyette" class="w-10 h-10 rounded-full">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">Brenna Goyette</p>
                        <p class="text-sm text-gray-500">@brennagoyette</p>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <p class="text-gray-600 italic">"Aut reprehenderit voluptatem eum asperiores beatae id. Iure molestias ipsum ut officia rerum nulla blanditiis."</p>
                <div class="mt-4 flex items-center">
                    <img src="https://randomuser.me/api/portraits/women/5.jpg" alt="Lindsay Walton" class="w-10 h-10 rounded-full">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">Lindsay Walton</p>
                        <p class="text-sm text-gray-500">@lindsaywalton</p>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-6">
                <p class="text-gray-600 italic">"Molestias ea earum quos nostrum doloremque sed. Quoerat quasi aut velit incidunt excepturi rerum voluptatem minus harum."</p>
                <div class="mt-4 flex items-center">
                    <img src="https://randomuser.me/api/portraits/men/6.jpg" alt="Leonard Krasner" class="w-10 h-10 rounded-full">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">Leonard Krasner</p>
                        <p class="text-sm text-gray-500">@leonardkrasner</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include("./footer.php")?>
