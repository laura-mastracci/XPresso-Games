<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Like extends Component
{
    public Article $article;
    public bool $liked = false;


    public function mount(){
        $this->liked = DB::table('likes')->where('article_id', $this->article->id)->where('user_id', Auth::id())->exists();
    }   

    public function like(){
        if (DB::table('likes')->where('article_id', $this->article->id)->where('user_id', Auth::id())->exists()) {
           DB::table('likes')->where('article_id', $this->article->id)->where('user_id', Auth::id())->delete();

        }else{
            DB::table('likes')->insert([
                'article_id' => $this->article->id,
                'user_id' => Auth::id(),
                'created_at' => now()
            ]);
        }
        $this->liked = !$this->liked;
    }
    public function render()
    {
        return view('livewire.like');
    }
}
