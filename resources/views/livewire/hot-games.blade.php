<div>
    @if($hotarticles->count() > 0)
    <h2 class="mt-5 title-font text-white text-center appear">{{ __('ui.hotArticles') }}</h2>

    <div class="container">
        <div class="row justify-content-center appear">
            @foreach ($hotarticles as $article)
                <livewire:product-card :article="$article" :key="'product-' . $article->id" />
            @endforeach
        </div>
    </div>
    @endif
</div>
