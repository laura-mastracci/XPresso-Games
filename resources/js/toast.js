import Toastify from 'toastify-js';

export function showMessage(text, color, textcolor = '#fff') {
    Toastify({
    text: text,
    duration: 5000,
    newWindow: true,
    close: true,
    gravity: "top", // `top` or `bottom`
    position: "center", // `left`, `center` or `right`
    offset: {
      x: 0, // horizontal axis - left to right
      y: 70 // vertical axis - top to bottom
    },
    stopOnFocus: true, // Prevents dismissing of toast on hover
    style: {
      background: color,
      color: textcolor,
    },
    onClick: function(){} // Callback after click
  }).showToast();
};

document.addEventListener('livewire:init', () => {
    Livewire.on('articleCreated', (event) => {
        showMessage(event.message, event.color, "#000");
    });
 });
 document.addEventListener('livewire:init', () => {
  Livewire.on('articleUpdated', (event) => {
      showMessage(event.message, event.color, "#000");
  });
});
 document.addEventListener('livewire:init', () => {
    Livewire.on('verificationEmailSent', (event) => {
        showMessage(event.message, event.color, "#000");
    });
 });

window.addEventListener('load', () => {
  if(window.error.message && window.error.color){
    if(window.error.color == '#8fffd2'){
      showMessage(window.error.message, window.error.color, '#000');
      return;
    }
    showMessage(window.error.message, window.error.color);
  }
});



// Reset password
window.addEventListener('load', () => {
  if(window.session){
    showMessage(window.session,' #8fffd2', '#000');
  }
});
window.addEventListener('load', () => {
  if(errors){
    errors.forEach(error => {
      showMessage(error,' #FF0072');
    })
  }
});

document.addEventListener('livewire:init', () => {
  Livewire.on('reviewMessage', (event) => {
    if(event.color == '#8fffd2'){
      showMessage(event.message, event.color, '#000');
      return;
    }
      showMessage(event.message, event.color);
  });
});

document.addEventListener('livewire:init', () => {
  Livewire.on('addToCartError', (event) => {
      showMessage(event.message, event.color);
  });
});



