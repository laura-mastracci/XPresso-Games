<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Review as ReviewModel;

class ReviewForm extends Component
{
    public $stars = [1 => false, 2 => false, 3 => false, 4 => false, 5 => false];
    public $rating;
    public $star;
    public String $reviewComment = '';
    public $article;
    public function mount($article)
    {
        $this->article = $article;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;

        for($i = 1; $i <= 5; $i++) {
            $this->stars[$i] = $i <= $rating;
        }
       
    }

    public function review()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::id() == $this->article->user_id) {
            $this->dispatch('reviewMessage', message: 'L\'articolo è tuo! Nessuna recensione aggiunta', color: '#ff0095');
            $this->reset();
            return;
        }
        if($this->checkReviewer()){
            $this->dispatch('reviewMessage', message: 'Hai gia recensito questo articolo!', color: '#ff0095');
            $this->reset();
            return;
        }
        ReviewModel::create([
            'user_id' => Auth::id(),
            'article_id' => $this->article->id,
            'rating' => $this->rating,
            'comment' => $this->reviewComment
        ]);
        $this->dispatch('reviewMessage', message: 'Recensione aggiunta con successo!', color: '#8fffd2');

        $this->reset();
    }

    public function checkReviewer(){
        $reviewer = ReviewModel::where('article_id', $this->article->id)->where('user_id', Auth::id())->first();
        return $reviewer;
    }
    public function render()
    {
        return view('livewire.review-form');
    }
}
