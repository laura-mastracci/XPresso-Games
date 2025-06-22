<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ProductCard extends Component
{   
    public $article;

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function render(Article $article)
    {
        return view('livewire.product-card', compact('article'));
    }
}
