<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Kart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Discount;
use Faker\Core\Color;

class AddToKart extends Component
{
    public $counter = 0;
    public $kartArticles = [];
    public $total = 0;
    public $coinCounter;

    public $lastInvalidDiscountCode = null;
    public $discountApplied = false;
    public $currentDiscount = null;
    public $applyingDiscountManually = false;



    public $discountInput;
    public $discountedTotal;

    public function mount()
    {
        $this->loadCartItems();
        $this->discountInput = '';
    }

    public function delete($kartArticleId)
    {

        Kart::where('id', $kartArticleId)->delete();

        $this->loadCartItems();
        $this->applyDiscount();
    }

    public function more($kartArticleId)
    {
        $article = Kart::find($kartArticleId);
        $article->increment('amount');

        $this->loadCartItems();
        $this->applyDiscount();
    }

    public function less($kartArticleId)
    {
        $article = Kart::find($kartArticleId);

        if ($article->amount === 1) {
            Kart::where('id', $kartArticleId)->delete();
        } else {
            $article->decrement('amount');
        }
        $this->loadCartItems();
        $this->applyDiscount();
    }


    #[On('addToCartAction')]
    public function loadCartItems()
    {
        $this->kartArticles = Kart::where('user_id', Auth::id())
            ->with('article')
            ->get();
        $this->counter = Kart::where('user_id', Auth::id())->sum('amount');
        $this->total = $this->kartArticles->sum(function ($kart) {
            return $kart->article->price * $kart->amount;
        });
        $this->coinCounter = floor($this->total / 25);
    }
    public function applyDiscount()
    {
        $this->loadCartItems(); // Sempre aggiorna il carrello
        $this->discountedTotal = $this->total;

        if (!$this->discountInput || !Auth::check()) {
            return;
        }

        if ($this->currentDiscount === $this->discountInput) {
            return;
        }

        $discount = Discount::where('code', $this->discountInput)
            ->where('user_id', Auth::id())
            ->first();

        if (!$discount) {
            if ($this->lastInvalidDiscountCode !== $this->discountInput && $this->applyingDiscountManually) {
                $this->dispatch('discountFailureCode', message: "Codice sconto errato", color:'#ff0095');
                $this->lastInvalidDiscountCode = $this->discountInput;
            }
            return;
        }

        if ($discount->used) {
            if ($this->applyingDiscountManually) {
                $this->dispatch('discountUsed', message: "Codice sconto già utilizzato!", color:'#ff0095');
            }
            return;
        }

        if ($this->total >= 10) {
            $percentage = $discount->percentage;

            $this->discountedTotal = $this->total - ($this->total * ($percentage / 100));
            $this->dispatch('discountSuccess', message: "Hai applicato uno sconto del $percentage%!", color:'#8fffd2');

            $this->currentDiscount = $this->discountInput;
            $this->discountInput = '';

            $discount->used = true; 
            $discount->save();
        } else {
            if ($this->applyingDiscountManually) {
                $this->dispatch('discountFailure', message: "Per applicare uno sconto il tuo totale deve essere almeno di 150€", color:'#ff0095');
            }
        }
    }

    public function applyDiscountManually()
    {
        $this->applyingDiscountManually = true;
        $this->applyDiscount();
        $this->applyingDiscountManually = false;
    }




    public function render()
    {
        return view('livewire.add-to-kart');
    }
}
