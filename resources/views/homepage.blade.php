<x-layout>
    <x-hero></x-hero>

    {{-- <header class="container my-5">
        <div class="row">
            <div class="col-12 text-center text-capitalize title-font text-white">
                <h1 class="main-title appear"> Hero section​</h1>
                <h2 class="sub-title title-font appear">work in progress</h2>
            </div>

    </header> --}}
    <div class="container-fluid coinBanner mt-5 pb-2">
        <div class="row text-center" >
            <div class="col-1 ">
                <x-coin-button/>
            </div>
            <div class="col-8 con-wrap">
                <h2 class="title-font con-title mt-3 ms-5">{{ __('ui.clikOnCoin') }}</h2>
                <p class="pixel-font con-title mb-0 ms-5">{{ __('ui.discountWin') }}</p>
            </div>
            <div class="col-1 coin-pos">
                <x-coin-button/>
            </div>
        </div>
    </div>

    <livewire:latest-games />

    
    <section class="work-with-us  mt-4 ">
        <div class="container text-center">
            <h2 class="section-title text-white title-font fs-2">🚀{{ __('ui.lavoraConNoi') }}</h2>
            <p class="section-text text-white title-font fs-4">
                {{ __('ui.workWithUsh2') }} 
            </p>
            <a href="{{ route('careers') }}" class="button-magenta">{{ __('ui.scopri') }}</a>
        </div>
    </section>
    <livewire:hot-games />
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center slide">
                <h2 class="text-white title-font">{{ __('ui.allCategories') }}</h2>
            </div>
        </div>
    </div>


    <!-- <div class="container mb-5">
        <div class="row justify-content-center gap-2 slide">
            @foreach ($categories as $category)
                <div
                    class="card col-12 col-md-3 bg-transparent border-white category-card d-flex align-items-center me-3 m-3 p-0">
                    <img src="{{ asset('img/image1.jpg') }}" alt="image" class="img">
                    <span
                        class="category-overlay position-absolute top-50 start-50 translate-middle pixel-font text-white">{{ $category->name }}</span>
                    <div class="category-body">
                        <a href="{{ route('categories.show', $category->id) }}" class="text-decoration-none">
                            <h5 class="card-title text-white pixel-font text-uppercase">
                                {{ __('ui.esplora') }}
                            </h5>
                        </a>

                    </div>
                </div>
            @endforeach

        </div>

    </div> -->

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center">
            <a href="{{ route('categories.show', 1) }}" class="text-decoration-none">
                <div class="cardct mb-5">
                    <div class="wrapperct">
                        <img src="img/bg-cat/Action.jpg" alt="" class="cover-image">
                    </div>
                <h2 class="title title-font">{{ __('ui.action') }}</h2>
                    <img src="img/png/action01.png" alt="" class="character">
                </div>
            </a>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center">
            <a href="{{ route('categories.show', 2) }}" class="text-decoration-none">
                <div class="cardct mb-5">
                    <div class="wrapperct">
                        <img src="img/bg-cat/arcade.jpg" alt="" class="cover-image">
                    </div>
                    <h2 class="title title-font ">{{ __('ui.arcade') }}</h2>
                    <img src="img/png/arcade01.png" alt="" class="character">
                </div>
            </a>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center">
            <a href="{{ route('categories.show', 3) }}" class="text-decoration-none">
                <div class="cardct mb-5">
                    <div class="wrapperct">
                        <img src="img/bg-cat/sport.png" alt="" class="cover-image">
                    </div>
                    <h2 class="title title-font  ">{{ __('ui.sport') }}</h2>
                    <img src="img/png/sport01.png" alt="" class="character" style="width: 47%;">
                </div>
            </a>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center">
            <a href="{{ route('categories.show', 4) }}" class="text-decoration-none">
                <div class="cardct mb-5">
                    <div class="wrapperct">
                        <img src="img/bg-cat/scrb.jpg" alt="" class="cover-image">
                    </div>
                    <h2 class="title title-font">{{ __('ui.educative') }}</h2>
                    <img src="img/png/educativi.png" alt="" class="character" style="width: 38%;">
                </div>
            </a>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center">
            <a href="{{ route('categories.show', 5) }}" class="text-decoration-none">
                <div class="cardct mb-5">
                    <div class="wrapperct">
                        <img src="img/bg-cat/fghtr.jpg" alt="" class="cover-image">
                    </div>
                    <h2 class="title fight title-font">{{ __('ui.fight') }}</h2>
                    <img src="img/png/fghtr.png" class="character" style="width: 55%;">
                </div>
            </a>
        </div>
    </div>
</div>  

</x-layout>
