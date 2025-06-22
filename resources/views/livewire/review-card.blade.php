
    <div class="card mb-3 col-12 col-md-2 neon border-0 text-white">
        <div class="card-header border-0">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $review->rating)
                        <i class="bi bi-star-fill"></i>
                    @else
                        <i class="bi bi-star"></i>
                    @endif
                @endfor
        </div>
        <div class="card-body">
            <h4 class="card-text text-white mt-3 mb-1">{{ $review->comment }}</h4>
            </div>
            <div class="card-footer border-0">
            <p class="card-text mb-0"><small class="text-white">Lasciato da: {{ $review->user->name }}</small></p>
            <p class="card-text mb-0"><small class="text-white">Data: {{ $review->created_at->format('d/m/Y') }}, {{$review->created_at->format('H:i')}}</small></p>
        </div>
    </div>

