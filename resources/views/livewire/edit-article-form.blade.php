<form wire:submit="update({{ $article->id }})" id="edit-form-{{ $article->id }}">
    <div class="mb-2 input-box">
        <span class="icon"><ion-icon name="game-controller-outline"></ion-icon></span>
        <label for="name" class="form-label">{{ __('ui.titolo') }}</label>
        <input type="text" class="input @error('title') is-invalid @enderror" id="name" name="name"
            placeholder="" wire:model.blur="title">
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-2 input-box">
        <span class="icon"><ion-icon name="information-circle-outline"></ion-icon></span>
        <label for="description" class="form-label">{{ __('ui.descrizione') }}</label>
        <input type="text" class="input @error('description') is-invalid @enderror" id="description"
            name="description" placeholder="" wire:model.blur="description">
        @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-2 input-box">
        <span class="icon"><ion-icon name="cash-outline"></ion-icon></span>
        <label for="price" class="form-label">{{ __('ui.prezzo') }}</label>
        <input type="number" class="input @error('price') is-invalid @enderror" id="price" name="price"
            placeholder="" wire:model.blur="price">
        @error('price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-2 input-box">
        <span class="icon" wire:ignore><ion-icon name="link-outline"></ion-icon></span>
        <label for="link" class="form-label title-font fs-5">Link di gioco</label>
        <input type="text" class="input @error('link') is-invalid @enderror title-font fs-5 ms-1" id="link"
            name="link" placeholder="" wire:model.blur="link">
        @error('link')
            <div class="invalid-feedback title-font fs-6">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-2 input-box">
        <span class="icon"><ion-icon name="pricetag-outline"></ion-icon></span>
        <select class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example"
            wire:model.blur="category">
            <option selected value="">{{ __('ui.categoria') }}</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-2 input-box d-flex flex-column justify-content-center align-items-center">
        <span class="icon" wire:ignore><ion-icon name="image-outline"></ion-icon></span>
         <label for="images" class="upload-label align-self-start title-font">Scegli file</label>
        <input id="images" type="file" wire:model.live="temporary_images"
            class="@error('temporary_images.*') is-invalid @enderror title-font upload " multiple>
        @error('temporary_images.*')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        @error('temporary_images')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    @if (!empty($images))
        <div class="row">
            <div class="col">
                <p class="text-white title-font">{{ __('ui.photoPreview') }}</p>
                <div class="row">
                    @foreach ($images as $key => $image)
                        <div class="col d-flex  align-items-center justify-content-center my-3  gap-2">
                            <div class="img-preview" style="background-image:url({{ $image->temporaryUrl() }});">
                            </div>
                            <button type="button" class="btn pink-btn"
                                wire:click="removeImage({{ $key }})">x</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <button type="submit" class="button-magenta mt-3 mb-3" data-bs-dismiss="modal">{{ __('ui.salva') }}</button>
</form>
