<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;

class ReviewCard extends Component
{

    public Review $review;
    public function render()
    {
        return view('livewire.review-card');
    }
}
