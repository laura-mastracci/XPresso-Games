<div class="col-12 p-4 text-white pb-2 ps-4 sticky ">
    <span class="position-absolute top-0 end-0 d-flex align-items-center p-2 btn delete-btn close-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x"
            viewBox="0 0 16 16">
            <path
                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
        </svg>
    </span>
    <span
        class="position-absolute top-0 start-0 p-2 text-center text-white d-flex align-items-center justify-content-start gap-2 ms-2 ">
        <span class="material-symbols-outlined chart">
            shopping_cart
        </span>
        <p class="mb-0 title-font chart">{{ $counter }}</p>
        <p class="title-font text-center ms-2 mt-2 chart">{{ __('ui.ArticleAdded') }}</p>
    </span>
    <hr>
    <div class="row mt-2">
        @if($kartArticles)
        @foreach ($kartArticles as $kartArticle)
            <div class="col-12">
                <p class="mb-0 fw-bold title-font font-chart fnt-cstm shadow">{{ $kartArticle->article->title }}</p>
                <p class="mb-0 title-font font-chart fnt-cstm shadow">{{ $kartArticle->article->price }} €</p>
                <p class="mb-0 title-font font-chart fnt-cstm shadow">{{ __('ui.quantità') }}: {{ $kartArticle->amount }}</p>
                <div class="button-box d-flex flex-row justify-content-center">
                    <button wire:click="more({{ $kartArticle->id }})" class="pink-btn"><span class="material-symbols-outlined">
                    add
                    </span></button>

                    <button wire:click="less({{ $kartArticle->id }})" class="pink-btn"><span class="material-symbols-outlined">
                    remove
                    </span>
                    </button>

                    <button class=" pink-btn text-center"
                        wire:click="delete({{ $kartArticle->id }})"><span class="material-symbols-outlined">
                    delete
                    </span></button>
                </div>
            </div>
            @endforeach
            <hr>
            <div class="col-12 "><p class="title-font fnt-cstm shadow">{{ __('ui.totale')}}: {{ $discountedTotal ?? $total }} €</p></div>
            <div class="col-12"><p class="title-font fnt-cstm shadow">{{ __('ui.every25€')}}:</p></div>
            <div class="col-12 text-gold"><p class="title-font">{{ __('ui.gainedCoin')}} {{$coinCounter}}</p></div>
            <input type="text"  wire:model.lazy="discountInput" id="discountInput"><p class="title-font fnt-cstm shadow">{{ __('ui.discount') }}</p>
            <button wire:click='applyDiscountManually' class=" button-magenta mb-2 d-flex justify-content-center title-font ">{{ __('ui.applyDiscount') }}</button>

            
         @elseif(!$kartArticles)
        <div class="col-12">
            <p>{{ __('ui.emptyCartMessage') }}
                <span class="material-symbols-outlined">sentiment_dissatisfied</span>
            </p>
        </div>
        @endif
        <button class="button-magenta chart">
            
            <a class="anch title-font fnt-cstm" href="{{route('articles.cart')}}">{{ __('ui.goToCart') }}</a>
        </button>
    </div>
     <button class="button-magenta col-12 justify-content-center mt-2 chk-btn d-none ">
        @if ($discountedTotal)
            <a class="anch title-font   " href="{{route('stripe.checkout',['payment'=>$discountedTotal])}}">{{ __('ui.vaiAlCheckout') }}</a>
            @else
            <a class="anch title-font " href="{{route('stripe.checkout',['payment'=>$total])}}">{{ __('ui.vaiAlCheckout') }}</a>
            
        @endif
    </button>
</div>
