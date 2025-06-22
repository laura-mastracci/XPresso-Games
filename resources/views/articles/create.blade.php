<x-layout>
    <div class="container-fluid wrapper-log justify-content-evenly shape-wrap">
        <div class="wrap-bg">
            <div class="absolute">
            <div class="absolute inset-0 justify-center">
                <div id="shape1" class="bg-shape1 bg-shape  bg-teal opacity-50 bg-blur"></div>
                <div id="shape2" class="bg-shape2 bg-shape  bg-primary opacity-50 bg-blur"></div>
                <div id="shape1" class="bg-shape2 bg-shape   bg-teal opacity-50 bg-blur"></div>

                
            </div>
            
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-12">
                <h1 class="text-white text-center title-font mb-3 ">{{ __('ui.inserisciAnnuncio') }}</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 login-box text-center px-5">
                    <livewire:create-article-form />
                </div>
            </div>
        </div>
        </div>
    </div>
</x-layout>