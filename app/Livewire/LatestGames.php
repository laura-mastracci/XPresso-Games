<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class LatestGames extends Component
{
    public $latestgames;

    public function mount() {
        $this->latestgames = Article::where( 'is_accepted', true)->latest()->take(3)->get();
    }
    public function render()
    {
        return view('livewire.latest-games', ['latestgames' => $this->latestgames]);
    }
}
