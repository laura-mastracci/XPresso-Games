<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class HotGames extends Component
{
    public $hotarticles;

    public function mount() {
        $this->hotarticles = Article::where( 'is_accepted', true)->where('hot', true)->latest()->take(3)->get();
    }
    public function render()
    {
        return view('livewire.hot-games', ['hotarticles' => $this->hotarticles]);
    }
}
