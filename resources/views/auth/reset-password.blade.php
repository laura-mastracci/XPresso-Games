<x-layout>
    <main class="container d-flex justify-content-center align-items-center" style="min-height: 62vh">
        <div class="row h-50">
            <div class="col-12 text-center">
                <h1 class="title-font">{{__('ui.resetPassword')}}</h1>
                <form method="POST" action="/reset-password">
                    @csrf
                    <input type="hidden" name="token" value="{{request()->route('token')}}">

                    <div class="mb-3">
                        <label for="email" class="form-label text-white">{{ __('ui.inserisciEmail') }}</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">{{ __('ui.scegliPassword') }}</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">{{ __('ui.confermaPassword') }}</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <button type="submit" class="button-magenta">{{ __('ui.salva') }}</button>
                </form>
            </div>
        </div>
    </main>
</x-layout>
