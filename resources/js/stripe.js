document.addEventListener('DOMContentLoaded', function () {
    const stripePublicKey = document.querySelector('meta[name="stripe-key"]').getAttribute('content');
    const stripe = Stripe(stripePublicKey);
    const elements = stripe.elements();

    // Definizione dello stile PRIMA della creazione dell'elemento
    var style = {
        base: {
            color: "#ffffff", /* Testo bianco */
            fontSize: "16px",
            "::placeholder": {
                color: "#bbbbbb" /* Placeholder */
            }
        },
        invalid: {
            color: "#ff0095" /* Testo rosso in caso di errore */
        }
    };

    // Creazione dell'elemento carta con lo stile applicato
    const card = elements.create("card", { style: style });
    card.mount("#card-element");

    // Gestione del form
    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const { token, error } = await stripe.createToken(card);

        if (error) {
            alert(error.message);
        } else {
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }
    });
});