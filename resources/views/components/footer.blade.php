<footer class="text-white py-5 position-relative">
    <div class="container-footer">
        <div class="row justify-content-center align-items-center me-0">
            <!-- Logo Section -->
            <div class="col-md-2 text-center text-md-start">
                <span class="d-flex align-items-center">
        <!-- Logo -->
                    <img src="{{ asset('img/logo-white.png') }}" alt="Logo" class="img-fluid me-2" >
        <!-- Title Font -->
                    <h3 class="mb-0 title-font">XPressoGames</h3>
                </span>
        </div>
            <!-- Information Section -->
            <div class="col-md-4 text-center">
                <h4 class="title-font ps-3">{{ __('ui.info') }}</h4>
                <ul class="list-unstyled ">
                    <li><a href="{{route('aboutus')}}" class="text-white title-font fot-link neonscore">{{ __('ui.chiSiamo') }}</a></li>
                    <li><a href="{{ route('careers') }}" class="text-white title-font fot-link neonscore">{{ __('ui.lavoraConNoi') }}</a></li>
                    <li><a href="#" class="text-white title-font fot-link neonscore">{{ __('ui.privacyPolicy') }}</a></li>
                </ul>
            </div>
            <!-- Support Section -->
            <div class="col-md-4 text-center">
                <h4 class="title-font ps-3">{{ __('ui.supporto') }}</h4>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white title-font fot-link neonscore">{{ __('ui.faq') }}</a></li>
                    <li><a href="#" class="text-white title-font fot-link neonscore">{{ __('ui.assistenza') }}</a></li>
                    <li><a href="#" class="text-white title-font fot-link neonscore">{{ __('ui.terminiCondizioni') }}</a></li>
                        <li class="d-flex flex-column position-absolute bottom-0 end-0 pb-5">
                        </li>
                </ul>
            </div>
        </div>
    </div>
</footer>