<x-layout>
    <meta name="stripe-key" content="{{ config('services.stripe.key') }}">

    <div class="container wrapper-log flex-column pay-chck">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">{{ __('ui.checkout') }}</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center text-white">{{ __('ui.totale') }}: {{ $payment }}€</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 login-box text-center text-white">
                <form action="{{ route('stripe.process', compact('payment')) }}" method="POST" id="payment-form">
                    @csrf
                    
                    <div class="input-box">
                        <input type="text" id="card-holder-name" name="card_holder_name" class="form-control" placeholder="{{ __('ui.nome') }}" value="{{ Auth::user()->name }}" required>
                    </div>

                    <div class="input-box">
                        <input type="email" id="email" name="email" class="custom-input" placeholder="{{ __('ui.email') }}" value="{{ Auth::user()->email }}" required>
                    </div>

                    <div class="input-box">
                        <input type="text" id="billing-address" name="billing_address" class="form-control" placeholder="{{ __('ui.indirizzo') }}" required>
                    </div>

                    <div id="card-element" class="input-box"></div>

                    <button type="submit" class="button-magenta">{{ __('ui.paga') }}</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/stripe.js') }}"></script>
    <script src="https://js.stripe.com/v3/"></script>

</x-layout>
