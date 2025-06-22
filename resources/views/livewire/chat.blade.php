<div class="row d-flex flex-column justify-content-between gap-3">
    <div class="col-12 message-container ">
        @foreach ($messages as $message)
            @if ($message['role'] === 'user')
                <div class="user-message text-end title-font" role="alert">
                    {{ $message['content'] }}
                </div>
            @endif

  @if ($message['role'] === 'assistant')
    <div class="bot-message title-font" role="alert">
        {!! $message['content'] !!}
    </div>
@endif
        @endforeach
    </div>

    <form wire:submit="run" class="d-flex justify-content-center align-items-center">
        <div class="input-box d-flex gap-2">
            <input wire:model="prompt" type="text" class="title-font" placeholder="{{ __('ui.writeYourMessage') }}">
            <button class="text-pink chat-btn" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-send" viewBox="0 0 16 16">
                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                </svg>
            </button>
        </div>
    </form>
</div>