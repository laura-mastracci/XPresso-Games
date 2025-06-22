import Toastify from 'toastify-js';

export function roulette(text, background, textColor = "#000") {
  Toastify({
    text: text,
    duration: 5000,
    newWindow: true,
    close: true,
    gravity: "top",
    position: "center",
    offset: {
      x: 0,
      y: 70
    },
    stopOnFocus: true,
    style: {
      background: background,
      color: textColor,
    },
    onClick: function () { }
  }).showToast();
}

document.addEventListener('livewire:init', () => {
  const successStyle = { background: "#8fffd2", color: "#000" };
  const errorStyle = { background: "#FF0072", color: "#fff" };

  Livewire.on('win', event => {
    roulette(event.message, successStyle.background, successStyle.color);
  });

  Livewire.on('takePrize', event => {
    roulette(event.message, successStyle.background, successStyle.color);
  });

  Livewire.on('discountSuccess', event => {
    roulette(event.message, successStyle.background, successStyle.color);
  });

  Livewire.on('lose', event => {
    roulette(event.message, errorStyle.background, errorStyle.color);
  });

  Livewire.on('discountFailureCode', event => {
    roulette(event.message, errorStyle.background, errorStyle.color);
  });

  Livewire.on('discountUsed', event => {
    roulette(event.message, errorStyle.background, errorStyle.color);
  });

  Livewire.on('resetDiscountInput', () => {
    const input = document.getElementById('discountInput');
    if (input) {
      input.value = '';
      input.dispatchEvent(new Event('input'));
    }
  });
});
