<x-layout>
    
    <header class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-6">
                <h1 class="text-white text-center font-title position-relative ">{{ __('ui.revisorDashboard') }}
                    @if(\App\Models\Article::toBeRevisedCount() > 0)<span class="position-absolute top-0 start-75 notification-badge ms-4"> {{\App\Models\Article::toBeRevisedCount()}}</span>@endif
                </h1>
                
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($article_to_review) <h2 class="text-center text-capitalize title-font text-white">{{ __('ui.annuncioDaRevisionare') }}</h2> @endif
            </div>
        </div>
    </header>
    
    @if ($article_to_review)
    <div class="container neon py-5 d-flex flex-row align-items-center my-5">
        <div class="row  h-100 gap-3 justify-content-center">
            @if ($article_to_review->images->count())
            @foreach ($article_to_review->images as $key => $image)
            <div class="col-3 col-md-4 mb-4">
                <h2 class="title-font text-start">{{ __('ui.image') }} </h2>
                <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid pro-pic"
                alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_review->title }}'">
            </div>
            <div class="col-3">
                <div class="card-body">
                    <h2 class="title-font text-start">{{ __('ui.labels') }}  </h2>
                    @if ($image->labels)
                    @foreach ($image->labels as $label)
                    <p class="my-1 text-start">#{{str_replace(' ', '', $label)}} </p>
                    
                    @endforeach
                    @else
                    <p class="desc-font">{{ __('ui.noLabels') }} no labels</p>    
                    @endif
                </div>
            </div>
            <div class="col-3">
                <div class="card-body">
                    <h2 class="title-font text-start">{{ __('ui.ratings') }}</h2>
                    <div class="row justify-content-center">
                        
                        <div class="col-10 desc-font" >
                            <p class="desc-font text-start">{{ __('ui.adult') }}</p>
                        </div>
                        <div class="col-2">
                            <div class="text-center mx-auto {{$image->adult}}">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        
                        <div class="col-10 desc-font">
                            <p class="desc-font text-start">{{ __('ui.violence') }}</p>
                        </div>
                        <div class="col-2">
                            <div class="text-start mx-auto {{$image->violence}}">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        
                        <div class="col-10">
                            <p class="desc-font text-start">{{ __('ui.spoof') }}</p>
                        </div>
                        <div class="col-2">
                            <div class="text-start mx-auto {{$image->spoof}}">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <p class="desc-font text-start">{{ __('ui.racy') }}</p>
                        </div>
                        <div class="col-2">
                            <div class="text-start mx-auto {{$image->racy}}">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        
                        <div class="col-10">
                            <p class="desc-font text-start">{{ __('ui.medical') }}</p>
                        </div>
                        <div class="col-2">
                            <div class="text-start mx-auto {{$image->medical}}">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            @for ($i = 0; $i < 6; $i++)
            <div class="col-6 col-md-3 mb-4 text-center">
                <img src="https://i.scdn.co/image/ab67616d00001e02e6dfc48a56a2954aed00e4ee" alt="immagine segnaposto"
                class="img-fluid rounded shadow">
            </div>
            @endfor
            @endif
            
        </div>
        <div class="row w-50 h-100 justify-content-center ">
            <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                <div class="text-center">
                    <h2 class="text-capitalize title-font text-white fs-1">{{ $article_to_review->title }}
                    </h2>
                    <p class="text-white title-font fs-4">{{ __('ui.autore') }}: {{ $article_to_review->user->name }}</p>
                    <p class="text-white title-font fs-4">{{ __('ui.nomeCategoria') }}: {{ $article_to_review->category->name }}</p>
                    <p class="text-white title-font fs-4">{{ __('ui.prezzo') }}: {{ $article_to_review->price }} €</p>
                    <p class="text-white title-font fs-4">{{ __('ui.descrizione') }}: {{ $article_to_review->description }}</p>
                </div>
                <div class="d-flex w-100 justify-content-center gap-3">
                    <form action="{{ route('accept', ['article' => $article_to_review]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="button-magenta" type="submit">{{ __('ui.accetta') }}</button>
                    </form>
                    <form action="{{ route('reject', ['article' => $article_to_review]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="button-magenta" type="submit">{{ __('ui.rifiuta') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @else
    <div class="container my-5">
        <div class="row justfy-content-center align-items-center">
            <div class="col-12 text-center">
                <h2 class="text-center text-capitalize text-white title-font  ">{{ __('ui.nessunAnnuncioDaRevisionare') }}</h2>
                <a href="{{ route('homepage') }}" class="button-magenta">{{ __('ui.back') }}</a>
            </div>
        </div>
    </div>
    @endif
    
    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-center text-capitalize text-white title-font position-relative d-inline-block">{{ __('ui.acceptedAds') }}<span class="notification-badge ms-1 position-absolute"> {{ $acceptedArticles->count()}}</span></h2>
            </div>
            <div class="col-12 text-center">
                <h2 class="text-center text-capitalize text-white title-font  position-relative d-inline-block">{{ __('ui.rejectedAds') }}<span class="notification-badge ms-1 position-absolute"> {{ $rejectedArticles->count()}}</span></h2>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('revisor.change-status') }}" class="button-magenta">Tutti gli annunci</a>
            </div>
        </div>
    </div>

    
    
</x-layout>
