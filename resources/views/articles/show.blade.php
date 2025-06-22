<x-layout>
<div class="container my-5 neon px-5 border-0">
    @if(Auth::user() && Auth::user()!=$article->user)
    <span class="position-absolute top-0 end-0 p-2">
        <livewire:like :article="$article" :key="$article->id" />
    </span>
    @endif
    <span class="position-absolute top-0 start-0 p-2">
        <livewire:hot :article="$article" :key="$article->id" />
    </span>
    <div class="row ">
        <!-- Carosello -->
        <div class="col-md-7 my-5"> <!-- Aumenta la colonna per il carosello -->
            @if($article->images->count() > 0)
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded-3 overflow-hidden">
                    @foreach($article->images as $key=>$image)
                    <div class="carousel-item @if($loop->first) active @endif">
                        <img src="{{ $image->getUrl(300, 300) }}"  alt="img {{ $key + 1 }} dell'articolo {{ $article->title }}"> <!-- Aumenta l'altezza dell'immagine -->
                    </div>
                    @endforeach
                </div>
                @if($article->images->count() > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">{{ __('ui.previous') }}</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">{{ __('ui.next') }}</span>
                </button>
                @endif
            </div>
            @else
            <img src="https://i.scdn.co/image/ab67616d00001e02e6dfc48a56a2954aed00e4ee" class="d-block w-100" style="object-fit: contain; height: 400px;" alt="Immagine non disponibile"> <!-- Aumenta l'altezza dell'immagine -->
            @endif
        </div>

       
        <div class="col-md-5 d-flex flex-column justify-content-center ps-4"> <!-- Riduci la colonna e aggiungi padding a sinistra -->
            <h5 class="fw-bold text-white art-title title-font">{{ $article->title }}</h5>
            <p class="text-white title-font">{{ $article->description }}</p>
            <p class="text-success fw-semibold">€ {{ number_format($article->price, 2, ',', '.') }}</p>
            <p><span class="badge  pixel-font">{{ $article->category->name }}</span></p>
            <div class="d-flex flex-row gap-2">
                <button type="button" class="button-magenta" data-bs-toggle="modal" data-bs-target="#reviewModal-{{ $article->id }}">{{ __('ui.lasciaunarecensione') }} <i class="bi bi-star"></i></button>

                <div class="modal fade" id="reviewModal-{{ $article->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content login-box">
                            <livewire:review-form :article="$article" />
                        </div>
                    </div>
                </div>


                <livewire:add-to-cart-button :article="$article" :key="$article->id" />
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center text-capitalize title-font text-white">{{ __('ui.reviews') }}</h2>
        </div>
    </div>
    <div class="row w-100 d-flex gap-2 justify-content-center align-items-stretch mt-3">
        @foreach($article->reviews as $review)
        <livewire:review-card :review="$review" :key="'review-' . $review->id" />
        @endforeach
    </div>
    <div class="row">
        <div class="col-12">
            <h2 class="text-center title-font text-white">Ti potrebbe interessare</h2>
        </div>
    </div>
    <div class="row w-100 d-flex gap-2 justify-content-center align-items-stretch mt-3">
        @foreach($relatedArticles as $article)
        <livewire:product-card :article="$article" :key="'article-' . $article->id" />
        @endforeach
    </div>
</div>


</x-layout>