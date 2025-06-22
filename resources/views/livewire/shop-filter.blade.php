<div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-12 col-md-3">
                <div class="input-group d-flex flex-row align-items-center mt-2 gap-2 pb-2">
                    <select class="form-select filtr-select" aria-label="Default select example" wire:model.live="orderby">
                        <option selected value="">{{ __('ui.order') }}</option>
                        <option value="latest">{{ __('ui.mostRecent') }}</option>
                        <option value="oldest">{{ __('ui.lessRecent') }}</option>
                        <option value="desc">{{ __('ui.decreasingPrice') }}</option>
                        <option value="asc">{{ __('ui.increasingPrice') }}</option>
                        <option value="a-z">A-Z</option>
                        <option value="z-a">Z-A</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="container d-flex flex-row gap-3 align-items-start">
        <div class="row w-25 h-25">
            <div class="col-12  d-flex flex-column gap-2 neon border-0 justify-content-center px-3 py-3">
                <div class="input-group d-flex flex-row align-items-center gap-2">
                    <input type="search" class="form-control text-white" placeholder="{{ __('ui.placeholderCerca') }}"
                        wire:model.live="search">
                </div>
                <div class="input-group d-flex flex-row align-items-center justify-content-center">
                    <p class="text-white pixel-font mb-0 mt-2">{{ __('ui.prezzo') }}</p>
                </div>
                <div class="input-group d-flex flex-row align-items-center gap-2">
                    <input type="number" class="form-control text-white" placeholder="min" wire:model.live="priceMin">
                    <input type="number" class="form-control text-white" placeholder="max" wire:model.live="priceMax">
                </div>
                <div class="input-group d-flex flex-row align-items-center mt-2 gap-2">
                    <select class="form-select filtr-select" aria-label="Default select example"
                        wire:model.live="category">
                        <option selected value="">{{ __('ui.categoria') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <span class="text-white" wire:click="toggleHot">
                    @if (!$hot)
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-heart" viewBox="0 0 16 16">
                            <path
                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                        </svg>
                    @endif
                </span>
                <div class="input-group d-flex justify-content-center mt-2">
                    <button class="button-magenta" wire:click="resetFilter">
                        {{ __('ui.reset') }}
                    </button>
                </div>
            </div>
        </div>
        <div class="row w-75">
            <div class="col-12 d-flex flex-row flex-wrap gap-2">
                @foreach ($articles as $article)
                    <livewire:product-card :article="$article" :key="'product-' . $article->id" />
                @endforeach
            </div>
        </div>

    </div>
    <div class="row justify-content-end mt-3">
            <div class="col-3 d-flex justify-content-end me-2">
                {{ $articles->links() }}
            </div>
        </div>
</div>
