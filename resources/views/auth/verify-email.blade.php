<x-layout>
    <main class="container d-flex justify-content-center align-items-center" style="min-height: 62vh">
        <div class="row h-50">
            <header class="col-12 my-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1 class="title-font">{{ __('ui.verificaEmail') }}</h1>
                        <p class="text-white">{{ __('ui.mailVerificaInviata') }}
                        </p>
                    </div>
                </div>
            </header>

            <div class="col-12 my-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <!-- Messaggio di successo se l'utente ha richiesto di rispedire l'email -->

                        <!-- Form per rispedire l'email di verifica -->
                        @livewire('verification-mail-button')
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
