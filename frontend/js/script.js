document.addEventListener('DOMContentLoaded', () => {
    const shoppingCart = document.getElementById('shopping-cart');
    const openCartBtn = document.getElementById('open-cart');
    const closeCartBtn = document.getElementById('close-cart');
    const continueShoppingBtn = document.getElementById('continue-shopping');
    const backgroundBackdrop = document.getElementById('background-backdrop');

    // Cerrar modal al hacer clic fuera del modal
    // document.getElementById('login-modal').addEventListener('click', (e)=> {
    //     if (e.target === this) {
    //         this.classList.add('hidden');
    //     }
    // });


    // Slide-over panel, show/hide based on slide-over state.

    //                 Entering: "transform transition ease-in-out duration-500 sm:duration-700"
    //                 From: "translate-x-full"
    //                 To: "translate-x-0"
    //                 Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
    //                 From: "translate-x-0"
    //                 To: "translate-x-full"
    // Abrir el carrito
    openCartBtn.addEventListener('click', () => {
    shoppingCart.classList.remove('hidden');  // Mostrar el fondo
    backgroundBackdrop.classList.remove('opacity-0');
    backgroundBackdrop.classList.add('bg-opacity-75');
    backgroundBackdrop.classList.add('bg-gray-500');
    shoppingCart.classList.add('translate-x-0')
    shoppingCart.classList.remove('translate-x-full')
    // backgroundBackdrop.style.pointerEvents = 'auto'; 
    setTimeout(() => {
        shoppingCart.classList.remove('hidden'); // Asegúrate de que esté visible después de la animación
    }, 500);
    });
    //  bg-gray-500 bg-opacity-75 
    // Cerrar carrito (ocultando el fondo con animación de opacidad)
    closeCartBtn.addEventListener('click', () => {
    backgroundBackdrop.classList.remove('opacity-100');
    backgroundBackdrop.classList.add('opacity-0');
    shoppingCart.classList.remove('translate-x-0')
    shoppingCart.classList.add('translate-x-full')
    backgroundBackdrop.style.pointerEvents = 'none'; 
    setTimeout(() => {
        shoppingCart.classList.add('hidden');  // Ocultar completamente después de la animación
    }, 500);  // El tiempo debe coincidir con la duración de la transición (500ms)
    });



    // Continuar comprando (cerrar el carrito)
    continueShoppingBtn.addEventListener('click', () => {
    backgroundBackdrop.classList.remove('opacity-100');
    backgroundBackdrop.classList.add('opacity-0');
    shoppingCart.classList.remove('translate-x-0')
    shoppingCart.classList.add('translate-x-full')
    backgroundBackdrop.style.pointerEvents = 'none'; 
    setTimeout(() => {
        shoppingCart.classList.add('hidden');  // Ocultar completamente después de la animación
    }, 500);  // El tiempo debe coincidir con la duración de la transición (500ms)
    });


});