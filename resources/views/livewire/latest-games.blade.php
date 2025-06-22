<div>

    <h2 class="mt-5 title-font text-white text-center appear">{{ __('ui.Novità') }}</h2>
    @if($latestgames->count() == 0)
        <div class="container">
            <div class="row justify-content-center appear">
                <div class="col-12 text-center">
                    <h2 class="title-font text-white text-center appear">{{ __('ui.nessunRisultato') }}</h2>
                </div>
            </div>
        </div>
    @else
    <div class="container">
        <div class="row justify-content-center appear">
            @foreach ($latestgames as $article)
                <livewire:product-card :article="$article" :key="'product-' . $article->id" />
            @endforeach
        </div>
    </div>
    @endif
</div>
