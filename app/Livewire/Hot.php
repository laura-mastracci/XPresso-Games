<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Hot extends Component
{
    public Article $article;
    public bool $hot = false;
    
    public function mount(){
        $this->hot();
    }
    public function hot(){
        $total_likes = DB::table('likes')->select('article_id')->count();
        $total_articles = DB::table('likes')->select('article_id')->distinct()->count();

        if ($total_articles == 0) {
            $this->hot = false;
            return;
        }
        
        $medium_likes = $total_likes / $total_articles;
        $this->hot = DB::table('likes')->where('article_id', $this->article->id)->count() > $medium_likes;

        $this->article->update([
            'hot' => $this->hot
        ]);

    
    }
    public function render()
    {
        return view('livewire.hot');
    }
}
