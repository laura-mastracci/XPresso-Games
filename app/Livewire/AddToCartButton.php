<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Kart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class AddToCartButton extends Component
{
    public $article;
    public $counter = 0;
    

    public function addToKart($articleId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if ($this->checkAuthor()) {
            $this->dispatch('addToCartError', message: 'Non puoi acquistare i tuoi articoli!', color: '#ff0095');
            return;
        }

        $article = Article::find($articleId);

        $controlKartArticle = Kart::where('user_id', Auth::id())
            ->where('article_id', $article->id)
            ->first();

        if ($controlKartArticle) {
            $controlKartArticle->increment('amount');
        } else {
            Kart::create([
                'user_id' => Auth::id(),
                'article_id' => $article->id,
                'amount' => 1,
            ]);
        }

        $this->dispatch('addToCartAction');
    }
    public function checkAuthor(){
        if (Auth::id() == $this->article->user_id) {
            return true;
        }
        return false;
    }
    #[On('filter')]
    public function render()
    {
        return view('livewire.add-to-cart-button');
    }
}
