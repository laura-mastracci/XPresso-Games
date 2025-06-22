
<div class="d-flex sticky-bottom justify-content-end ">
    <button type="button" class="chat-bot text-center" data-bs-toggle="modal" data-bs-target="#botModal">
        <img src="{{ asset('img/icons8-bot-64.png') }}" alt="bot" class=" img-fluid coin-img me-2">
    </button>
</div>

<div class="modal fade" id="botModal" tabindex="-1" aria-labelledby="botModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content login-box">
            <div class="modal-qualcosa">
                <button type="button" class="text-pink close-btn" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                    </svg>
                </button>
            </div>
            
            <!-- **Testo introduttivo** -->
            <div class="chat-intro text-center ">
                <p class="text-bold text-white title-font mt-2 fs-4">💬 {{ __('ui.chatBot') }}</p>
            </div>

            <div class="modal-body">
                @livewire('chat')
            </div>
        </div>
    </div>
</div>


  