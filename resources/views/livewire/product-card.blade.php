<div class="card col-12 col-md-3 mt-3 neon p-0 border-0" style="width: 18rem;">
    <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://i.scdn.co/image/ab67616d00001e02e6dfc48a56a2954aed00e4ee' }}"
        class="card-img opacity-25" alt="...">

    <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center">
        @if(!Route::is('revisor.change-status'))
        <livewire:hot :article="$article" :key="$article->id" />
            @else
            <span class=" position-absolute top-0 end-0 d-flex align-items-center gap-2 p-2">
                <form action="{{ route('accept', ['article' => $article]) }}" method="POST"> @csrf @method('PATCH')<button type="submit" class="btn p-0 bi bi-check-circle-fill"></button>
                </form>
                <form action="{{ route('reject', ['article' => $article]) }}" method="POST"> @csrf @method('PATCH')<button type="submit" class="btn p-0 bi bi-dash-circle-fill"></button>
                </form>
            </span>
        @endif
        @auth
            @if (Auth::id() == $article->user_id && !Route::is('homepage') && !Route::is('articles.index') && !Route::is('articles.show'))
                @if ($article->is_accepted === null)
                    <span class=" position-absolute bottom-0 end-0 d-flex align-items-center p-2">
                        <i class="bi bi-question-circle-fill">

                        </i>
                    </span>
                @elseif($article->is_accepted == 1)
                    <span class=" position-absolute bottom-0 end-0 d-flex align-items-center p-2">
                        <i class="bi bi-check-circle-fill">

                        </i>
                    </span>
                @elseif($article->is_accepted == 0)
                    <span class=" position-absolute bottom-0 end-0 d-flex align-items-center p-2">
                        <i class="bi bi-dash-circle-fill">

                        </i>
                    </span>
                @endif
                @if (Route::is('auth.dashboard') )
                    <span class=" position-absolute top-0 end-0 d-flex align-items-center p-2">
                        <button type="button" class="btn edit-btn p-0" data-bs-toggle="modal"
                            data-bs-target="#editModal-{{ $article->id }}">
                            <span class="material-symbols-outlined">
                            edit
                            </span>
                        </button>

                        <div class="modal fade" id="editModal-{{ $article->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content login-box">
                                    <livewire:edit-article-form :article="$article" :key="'modal-' . $article->id" />
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('articles.destroy', $article) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn delete-btn" type="submit"><span class="material-symbols-outlined">
                            delete
                            </span></button>
                        </form>
                    </span>
                @endif
            @endif
            @if (Auth::id() == $article->user_id)
            @else
                @if(!Route::is('revisor.change-status'))
                <span class="card-like position-absolute top-0 end-0 p-2">
                    <livewire:like :article="$article" :key="$article->id" />
                </span>
                @endif
            @endif
        @endauth
        <h5 class="card-title title-font shadow"> {{ $article->title }}</h5>
        <p class="card-text ">{{ $article->price }} €</p>
        <p class="card-text card-category shadow ">{{ $article->category->name }}</p>
        <div class="button-box d-flex flex-row gap-2 justify-content-center">
            <a href="{{ route('articles.show', $article) }}" class="button-magenta">
                {{ __('ui.dettagli') }}
            </a>
            <livewire:add-to-cart-button :article="$article" :key="$article->id" />
        </div>
    </div>
</div>
