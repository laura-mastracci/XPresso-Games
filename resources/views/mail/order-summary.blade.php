<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
    <title>{{ __('ui.titoloMailSummary') }}</title>
   
    <style>
        .title-font{
            font-family: "Jersey 10", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .full-page-bg {
            min-height: 100vh; /* Occupa tutta l’altezza della finestra */
            width: 100%;
            background-color: #212121;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .email-wrapper {
            max-width: 600px;
            background-color: #212121;
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        .logo {
            width: 50px;
            margin-bottom: 20px;
        }

        .list-ord{
            list-style-type: none;
            
        }
        strong{
            color: #ff4081;
            font-size: 22px;
            font-weight: normal;
        }
        .btn-custom {
            background-color: #ff4081;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 18px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        .btn-custom:hover {
            background-color: #e73370;
        }
    </style>
</head>
<html>
    <div class="full-page-bg">
        <div class="container email-wrapper">
            <!-- Logo -->
            <div class="text-center">
                <span>

                    <img src="{{ asset('img/logo-white.png') }}" alt="Logo" class="logo">
                    <h2 class="logo-title text-white title-font ms-2">XpressoGames</h2>

                </span>
            </div>

            <!-- Contenuto Email -->
            <h2 class="mt-3 text-white title-font">{{ __('ui.iltuordine') }}</h2>
            <p class="fs-4 text-white title-font"> {{ __('ui.ciaordine') }}, {{ $order->user->name }}!</p>
            <p class="fs-4 text-white title-font">{{ __('ui.ringraziamento') }}.</p>
            <p class="fs-4 text-white title-font"><strong>{{ __('ui.datiOrdine') }}</strong></p>
            <p class="fs-4 text-white title-font">{{ __('ui.numeroOrdine') }}: {{ $order->id }}</p>
            <p class="fs-4 text-white title-font">{{ __('ui.totaleOrdine') }}: {{ $order->total }} €</p>
            <ul class="fs-4 text-white title-font text-start"><strong>{{ __('ui.riepilogoprodotti') }}</strong> 
            
            @foreach($order->items as $item)
                <li class="text-start list-decoration-none">{{__('ui.totaleprodotti')}}: {{ $item->article->title }} - {{ __('ui.quantitaprodotti') }}: {{ $item->quantity }} - {{ __('ui.prezzoprodotti') }}: {{ $item->price }} €
                <a href="{{ $item->article->link ?? 'https://drysland.vercel.app/' }}" class="btn btn-custom title-font">{{__('ui.play')}}</a>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</html>