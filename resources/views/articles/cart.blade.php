<x-layout >
    <h1 class="title-font text-center">{{ __('ui.iTuoiArticoli') }}</h1>
    <div class="container">
    
    <div class="full-chart row  show-checkout">
            @livewire('add-to-kart')

       
    </div>

    <!-- {{-- <button class="button-magenta col-12 justify-content-center">
        <a class="anch title-font" href="{{route('stripe.checkout',$kartArticle->amount)}}">Vai al Checkoout</a>
    </button> --}} -->

    </div>
</x-layout>