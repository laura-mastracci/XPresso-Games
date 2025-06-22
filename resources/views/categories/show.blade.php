<x-layout>
    <header>
        <div class="container my-3">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center text-capitalize">{{ $category->name }}</h1>
                </div>
            </div>
        </div>
    </header>
    <div class="container my-5">
        <div class="row">
            @foreach($articles as $article)
            <livewire:product-card :article="$article" :key="'product-' . $article->id"/>
            @endforeach
        </div>
    </div>
</x-layout>