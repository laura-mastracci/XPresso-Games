
<form wire:submit.prevent="review">
    <div class="mb-3  d-flex flex-wrap justify-content-center">
        @foreach(range(1, 5) as $i)
        @if($stars[$i])
            <div class="rating me-1" wire:click="setRating({{ $i }}) "><i class="bi bi-star-fill text-white fs-3"></i></div>
        @else
            <div class="rating me-1" wire:click="setRating({{ $i }})"><i class="bi bi-star text-white fs-3"></i></div>
        @endif
        @endforeach
    </div>

    <div class=" mb-3">
        <textarea class="form-control text-white " placeholder="Scrivi la tua recensione" wire:model="reviewComment"></textarea>
    </div>
    
        
    <button type="submit" class="button-magenta mt-3 mb-3" data-bs-dismiss="modal">{{ __('ui.salva') }}</button>
</form>


