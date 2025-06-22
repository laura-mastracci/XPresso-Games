<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <!-- Logo -->
        <div class="logo-container ms-4 d-flex align-items-center">
            <img src="{{ asset('img/logo-white.png') }}" class="logo" alt="">
            <a class="logo-title text-white title-font ms-2" href="/">XpressoGames</a>
        </div>

        <!-- Toggler -->
        <button class="navbar-toggler burger" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <!-- Navbar Menu -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Link della navbar -->
            <ul class="navbar-nav mx-auto text-center link-menu mt-3 ">
                <div class="nav-link-wrap d-flex">

                    <li class="nav-item active">
                        <a class="nav-link title-font neonscore text-white" href="/">{{ __('ui.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link title-font neonscore text-white"
                            href="{{ route('articles.index') }}">{{ __('ui.shop') }}</a>
                    </li>

                </div>
            </ul>

            <!-- Bottoni di Login e Logout -->

            <div class="regi-btn d-flex justify-content-lg-end justify-content-center align-items-center mt-3 mt-lg-0">
                <li class=" mb-3 me-2">
                    <form action="{{ route('articles.search') }}" role="search" method="GET">
                        <div class="imput-group d-flex gap-2 ">
                            <input type="search" name="query" class="form-control src-Bar "
                                placeholder="{{ __('ui.placeholderCerca') }}">

                            <button type="submit" class="pink-btn m-0"><span class="material-symbols-outlined">
                                   <span class="material-symbols-outlined">
                                    search
                                    </span>
                                </span></button>
                        </div>
                    </form>
                </li>
                @guest
                    <a href="{{ route('login') }}" class="button-magenta login-btn mx-2">{{ __('ui.login') }}</a>
                    <a href="{{ route('register') }}" class="button-magenta mx-2">{{ __('ui.registrati') }}</a>
                @endguest
                @auth
                    <div class="dropdown me-3">
                        <a class=" dropdown-toggle me-5 title-font user neonscore text-white fs-5 ps-2 "
                            id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('ui.saluto') }} {{ Auth::user()->name }}!
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark fade-dropdown  text-center " aria-labelledby="dropdownMenuButton2">
                            <li><a class="title-font me-4 title-font user neonscore text-white fs-6 ms-2 pb-1 "
                                    href="{{ route('auth.dashboard') }}">{{ __('ui.dashboard') }}</a></li>
                            <li>
                                @if (Auth::user()->is_revisor)
                                    <a href="{{ route('revisor.index') }}"
                                        class="me-4 title-font user neonscore text-white fs-6 ms-2 pb-1 notification-text">{{ __('ui.areaRevisione') }}
                                        @if (\App\Models\Article::toBeRevisedCount() > 0)
                                            <span class="notification card-text ms-4"></span>
                                        @endif
                                    </a>
                                @endif
                            </li>

                            <li>
                                <a class="me-4 title-font user neonscore text-white fs-6 ms-2 pb-1"
                                    href="{{ route('articles.create') }}">{{ __('ui.creaAnnuncio') }}</a>
                            </li>

                            <li>
                                <a class="me-4 title-font user neonscore text-white fs-6 ms-2 pb-1"
                                href="{{route('articles.cart')}}">{{ __('ui.goToCart') }}</a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="mb-0">
                                    @csrf
                                    <button class="button-magenta mx-2" type="submit">{{ __('ui.logout') }}</button>
                                </form>
                            </li>
                        @endauth
                        <li class="mt-2">
                        <x-locale/>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</nav>
