<x-layout>
<div class="wrapper-log shape-wrap">
    <div class="wrap-bg">
        <div class="absolute">
            <div class="absolute inset-0 justify-center">
                <div id="shape1" class="bg-shape1 bg-shape  bg-teal opacity-50 bg-blur"></div>
                <div id="shape2" class="bg-shape2 bg-shape  bg-primary opacity-50 bg-blur"></div>
                <div id="shape1" class="bg-shape2 bg-shape   bg-teal opacity-50 bg-blur"></div>

                
            </div>
            
        </div>
        <div class="login-box">
            <form  method="POST" action="{{route('register')}}" id="register" class="text-center">
                @csrf
                <h2 class="title-font log-fnt mt-2 fs-1">{{ __('ui.registrati') }}</h2>
                <div class="input-box">
                    <span class="icon"><ion-icon name="name"></ion-icon></span>
                    <input id="name" type="text" name="name" placeholder="{{ __('ui.placeholderName') }}" class="input">
                    <div id="error-name" class="invalid-feedback d-none">
                        {{-- testo errore --}}
                    </div>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input id="email" type="email" name="email" placeholder="{{ __('ui.placeholderEmail') }}" class="input">
                    <div id="error-email" class="invalid-feedback d-none">
                        {{-- testo errore --}}
                    </div>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input id="password" type="password" name="password" placeholder="{{ __('ui.password') }}" class="input">
                    <div id="error-pwd" class="invalid-feedback d-none">
                        {{-- testo errore --}}
                    </div>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input id="passwordConfirmation" type="password" name="password_confirmation" placeholder="{{ __('ui.confermaPassword') }}" class="input">
                    <div id="error-pwd-confirmation" class="invalid-feedback d-none">
                        {{-- testo errore --}}
                    </div>
                </div>
                <button type="submit" class="button-magenta">{{ __('ui.registrati') }}</button>
                <div class="register-link pixel-font">
                    {{ __('ui.giaRegistrato') }}
                    <a href="{{ route('login') }}" class="pixel-font">{{ __('ui.login') }}</a>
                </div>
            </form>
        </div>
    </div>
</div>
</x-layout>
    