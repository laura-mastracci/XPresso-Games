<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XPressoGames</title>
    <link rel="icon" href="{{ asset('img/logo-black.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/069fc385a8.js" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-navbar />
    <div class="bg-background">
    </div>
    <aside class="cart container close">
        <div class="row">
            @livewire('add-to-kart')
        </div>
    </aside>

    {{ $slot }}



    @if (!request()->is('articles/create') && !request()->is('login') && !request()->is('register'))
 
<div class="sticky-container">
    <x-chat-bot />
    <x-coin-button />
</div>
    @endif
    <x-footer />
    <script>
document.addEventListener("DOMContentLoaded", function() {
    const botModal = document.getElementById("botModal");
    document.body.appendChild(botModal);
});

document.addEventListener("DOMContentLoaded", function() {
    const coinModal = document.getElementById("coinModal");
    document.body.appendChild(coinModal);
});
</script>

    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <script>
        window.error = @json([
            'message' => session('message'),
            'color' => session('color'),
        ]);
        // Reset password
        window.session = @json(session('status'));
        var errors = <?php echo json_encode($errors->all()); ?>;

        //     document.addEventListener('DOMContentLoaded', () => {
        //     document.addEventListener('closeModal', (event) => {
        //         console.log(event.detail.modalId);
        //         const modalElement = document.getElementById('editModal-' + event.detail.modalId);

        //         const modal =  bootstrap.Modal.getInstance(modalElement);
        //         if(modal){
        //             console.log('modal found:', modal)
        //             modal.hide();
        //         }
        //     })
        // })
    </script>


</body>

</html>
