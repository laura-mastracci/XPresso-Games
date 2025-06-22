<?php

namespace App\Livewire;

use Illuminate\Support\Str;
use App\Models\Kart;
use App\Models\Prize;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Mail\PrizeMail;
use App\Models\Discount;
use Illuminate\Support\Facades\Mail;


class Roulette extends Component
{
    public $user;
    public $gameover = false;
    public $num;
    public $coin;
    public $prize;
    public $winPrize = false;
    public $discount;

    // Invia l'email

    public function mount()

    {
        if (!Auth::user()) {
            return;
        } else {
            $user = Auth::user();
            $this->discount = Discount::where('user_id', $user->id)
                ->where('percentage', 40)
                ->where('used', false)
                ->first();
            $this->newGame();
        }
    }
    public function newGame()
    {
        $this->gameover = false;
        $this->winPrize = false;
        $this->num = 1;
        $this->coin = Auth::user()->coin ?? 0;
        $this->prize = Prize::inRandomOrder()->first();
    }
    public function tryNumber($selected)
    {
        if ($this->coin <= 0) {
            $this->gameover = true;
            return;
        }


        Auth::user()->decrement('coin');
        $this->coin--;

        if ($this->num === (int) $selected) {
            $this->winPrize = true;
        }

        $this->gameover = true;
    }

    // public function addPrize()
    // {
    //     $user = Auth::user();
    //     $discount = $this->discount;

    //     // if ($discount) {
    //     //     Mail::to($user)->send(new PrizeMail($discount));
    //     // } 
    //     if ($discount) {
    //         dd('Invio mail a: ' . $user->email);
    //         Mail::to($user)->send(new PrizeMail($discount));
    //     } else {
    //     }
    //     return to_route('articles.index');
    // }

    public function addPrize()
    {
        $user = Auth::user();

        $percentage = [15, 30, 40];

        $randomPercentage = $percentage[array_rand($percentage)];

        $this->discount = Discount::create([
            'user_id' => $user->id,
            'percentage' => $randomPercentage,
            'used' => false,
            'code' => strtoupper(Str::random(8)),
        ]);

        Mail::to($user)->send(new PrizeMail($this->discount));

        return to_route('articles.index');
    }



    public function render()
    {
        return view('livewire.roulette');
    }
}
