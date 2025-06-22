var cart = document.querySelector(".cart");
var closeCart = document.querySelector(".close-btn");
var addToCartButtons = document.querySelectorAll(".add-to-cart");

let hasError = false;

Livewire.on('addToCartError', () => {
    hasError = true;
    close();
});

for (let i = 0; i < addToCartButtons.length; i++) {
    addToCartButtons[i].addEventListener("click", function () {
        open();
    });
}
function open() {
    if(cart.classList.contains("close")){
        cart.classList.remove("close");
    }
    cart.classList.add("open");
}

function close() {
    if(cart.classList.contains("open")){
        cart.classList.remove("open");
    }
   cart.classList.add("close"); 
}

closeCart.addEventListener("click", close);

