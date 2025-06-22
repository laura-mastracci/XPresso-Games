<x-layout>


        <header>
            <div class="container my-5">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h1 class="text-white text-center mb-3">{{ __('ui.dashboard') }}</h1>
                    </div>
                    <div class="col-12">
                        <h2 class="text-white text-center title-font">{{ __('ui.profilo') }}</h2>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card neon border-0 p-3">
                        <div class="card-body">
                            <div class="card-title d-flex justify-content-center align-items-center gap-2">
                                <h5 class="pixel-font mb-0">{{__('ui.nome')}}</h5>
                                <p class="fs-5 mb-0">{{ Auth::user()->name }}</p>
                            </div>
                            <div class="card-title d-flex justify-content-center align-items-center gap-2">
                                <h5 class="pixel-font mb-0">{{ __('ui.email') }}</h5>
                                <p class="fs-5 mb-0">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="button-box d-flex flex-row gap-2 justify-content-center">
                                <form action="{{ route('logout') }}" method="POST" class="mb-0">
                                    @csrf
                                    <button class="button-magenta mx-2" type="submit">{{ __('ui.logout') }}</button>
                                </form>
                                @auth
                                    @if (!auth()->user()->two_factor_secret)
                                        <form method="POST" action="{{ url('user/two-factor-authentication') }}">
                                            @csrf
                                            {{-- <button type="submit" class="button-magenta">{{__('ui.2faBtnOn')}}</button> --}}
                                        </form>
                                    @else
                                        <p class="mt-3">{{ __('ui.2faEnabled') }}</p>

                                        <div class="my-3">
                                            {!! auth()->user()->twoFactorQrCodeSvg() !!}
                                        </div>

                                        <h5>{{ __('ui.codiciRecupero') }}</h5>
                                        <ul class="list-unstyled">
                                            @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                                                <li>{{ $code }}</li>
                                            @endforeach
                                        </ul>

                                        <form method="POST" action="{{ url('user/two-factor-authentication') }}"
                                            class="mt-3">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="button-magenta">{{__('ui.2faBtnOff')}}</button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center text-white title-font">{{ __('ui.iTuoiAnnunci') }}</h2>
            </div>
        </div>
        <div class="row gap-2 justify-content-center">
            @foreach ($articles as $article)
                <livewire:product-card :article="$article" :key="'product-' . $article->id" />
            @endforeach
        </div>
    </div>


    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center text-white title-font">{{ __('ui.preferiti') }}</h2>
            </div>
        </div>

        <div class="row gap-2 justify-content-center">
            @if ($likedArticles)
                @foreach ($likedArticles as $article)
                <livewire:product-card :article="$article" :liked="true" :key="'product-' . $article->id" />
                @endforeach
            @endif
        </div>


    </div>


</x-layout>
