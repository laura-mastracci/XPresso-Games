<x-layout>
    <header>
        <div class="container my-3">
            @if (session('message'))   
                <div>{{ session('message') }}</div>
            @endif
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center text-capitalize title-font text-white">{{ __('ui.giochi') }}</h1>
                </div>
                @livewire('shop-filter')
            </div>
        </div>
    </header>
    
</x-layout>
