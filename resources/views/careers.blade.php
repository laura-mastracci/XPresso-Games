<x-layout>

    <header class="container my-3">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-capitalize title-font text-white">{{ __('ui.WorkWithUs') }}</h1>
            </div>
        </div>
    </header>

    <main class="container d-flex justify-content-center align-items-center" style="min-height: 62vh">
        <div class="row justify-content-center">
            <div class="col-12 text-center login-box">
                <form method="POST" action="{{ route('become.revisor')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">{{ __('ui.email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label text-white">{{ __('ui.message') }}</label>
                        <textarea type="text" class="form-control text-white" id="message" name="userMessage" placeholder="{{ __('ui.whyrevisor') }}" rows="5"></textarea>
                    </div>
                    <button type="submit" class="button-magenta">{{__('ui.invia')}}</button>
                </form>
            </div>
        </div>
    </main>
    






</x-layout>