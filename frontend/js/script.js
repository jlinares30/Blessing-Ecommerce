document.addEventListener('DOMContentLoaded', () => {
    const shoppingCart = document.getElementById('shopping-cart');
    const openCartBtn = document.getElementById('open-cart');
    const closeCartBtn = document.getElementById('close-cart');
    const continueShoppingBtn = document.getElementById('continue-shopping');
    const backgroundBackdrop = document.getElementById('background-backdrop');
    const reservaBtn = document.getElementById('reservaBtn');
    const oculto = document.querySelector('#oculto');

    openCartBtn.addEventListener('click', () => {
        shoppingCart.classList.remove('hidden');  // Mostrar el fondo
        backgroundBackdrop.classList.remove('opacity-0');
        backgroundBackdrop.classList.add('bg-opacity-75');
        backgroundBackdrop.classList.add('bg-gray-500');
        shoppingCart.classList.add('translate-x-0')
        shoppingCart.classList.remove('translate-x-full')
        // body.style.pointerEvents = 'none';
        // backgroundBackdrop.style.pointerEvents = 'none'; 

    });
    //  bg-gray-500 bg-opacity-75 
    
    closeCartBtn.addEventListener('click', () => {
        backgroundBackdrop.classList.remove('opacity-100');
        backgroundBackdrop.classList.add('opacity-0');
        shoppingCart.classList.remove('translate-x-0')
        shoppingCart.classList.add('translate-x-full')
        backgroundBackdrop.style.pointerEvents = 'none'; 
    });

    continueShoppingBtn.addEventListener('click', () => {
    backgroundBackdrop.classList.remove('opacity-100');
    backgroundBackdrop.classList.add('opacity-0');
    shoppingCart.classList.remove('translate-x-0')
    shoppingCart.classList.add('translate-x-full')
    backgroundBackdrop.style.pointerEvents = 'none'; 

    });

    // backgroundBackdrop.addEventListener('click',()=>{
    //     backgroundBackdrop.classList.remove('opacity-100');
    //     backgroundBackdrop.classList.add('opacity-0');
    //     shoppingCart.classList.remove('translate-x-0')
    //     shoppingCart.classList.add('translate-x-full')
    // })

  
//   function closeAlert() {
//     var alertBox = document.getElementById('successAlert');
//     alertBox.classList.add('hidden');
//   }


});

function showAlert() {
    console.log(1)
    var alertBox = document.getElementById('successAlert');
    alertBox.classList.remove('hidden'); // Mostrar el aviso

    // Opción para ocultar el aviso automáticamente después de 5 segundos
  
  }