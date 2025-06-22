<div class="container">
    @if (!$gameover && ($coin == 0 || Auth::guest()))
        @guest
            <h2 class="text-pink mb-3 pixel-font"><a
                    href="{{ route('register') }}"class="text-pink pixel-font">{{ __('ui.registrati') }}</a>
                {{ __('ui.o') }} <a href="{{ route('login') }}"class="text-pink pixel-font">{{ __('ui.login') }}</a>
                {{ __('ui.perGiocare') }}!
            </h2>
        @endguest
        @auth
            <h2 class="text-pink mb-3 pixel-font">{{ __('ui.noCoin') }}!
            </h2>
            <div class="row g-2 justify-content-center">
                <a href="{{ route('articles.index') }}"class="button-magenta ">{{ __('ui.gotoshop') }}</a>
            </div>
        @endauth
    @else
        <h2 class="text-pink pixel-font mb-3">{{ __('ui.rouletteCallToAction') }}</h2>
        <h2 class="text-pink pixel-font mb-3 fs-5">{{ __('ui.coin') }} {{ $coin }}</h2>
        <div class="row g-2 justify-content-center">
            @if (!$gameover)
                @for ($i = 1; $i <= 9; $i++)
                    <div class="col-4 tex-center">
                        <button wire:click="tryNumber({{ $i }})" class="button-roulette">
                            <img src="https://i.gifer.com/origin/e0/e02ce86bcfd6d1d6c2f775afb3ec8c01_w200.gif"
                                alt="">
                        </button>
                    </div>
                @endfor
            @else
                <div class="d-grid gap-3 text-center">
                    @if ($winPrize)
                        <h2 class="pixel-font text-gold">{{ __('ui.youWon') }}</h2>
                        <p class="pixel-font text-white">{{ __('ui.takePrize') }}</p>
                        <button wire:click="addPrize" class="button-magenta">{{ __('ui.getPrize') }}</button>
                    @else
                        <h2 class="pixel-font text-pink">{{ __('ui.youLose') }}</h2>
                        <a href="{{ route('homepage') }}"class="button-magenta ">{{ __('ui.back') }}</a>
                        <button wire:click="newGame" class="button-magenta">{{ __('ui.tryAgain') }}</button>
                    @endif
                </div>
            @endif
        </div>
    @endif


</div>
