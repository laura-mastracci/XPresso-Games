<x-layout>
    <main class="container d-flex justify-content-center align-items-center" style="min-height: 62vh">
        <div class="row h-50">
            <div class="col-12 text-center">
                <h1 class="title-font">{{ __('ui.passwordDimenticata') }}</h1>
                <form method="POST" action="/forgot-password">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">{{ __('ui.inserisciEmail') }}</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <button type="submit" class="button-magenta">{{ __('ui.invia') }}</button>
                </form>
            </div>
        </div>
    </main>
</x-layout>
