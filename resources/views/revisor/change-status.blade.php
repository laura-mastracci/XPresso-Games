<x-layout>
    <header class="container my-3">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-capitalize title-font text-white">{{ __('ui.modifyStatus') }}</h1>
            </div>
        </div>
    </header>
    <div class="container my-5">
        <div class="row">
            @foreach($articles as $article)
            <div class="col-12 col-md-4">
               <livewire:product-card :article="$article" :key="'product-' . $article->id"/>
        
            </div>
            @endforeach
        </div>
    </div>
</x-layout>