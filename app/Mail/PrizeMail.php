<?php

namespace App\Mail;

use App\Models\Discount;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PrizeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $discountCode;
    public $discountPercentage;

    public function __construct(Discount $discount)
    {
        $this->discountCode = $discount->code;
        $this->discountPercentage = $discount->percentage;
    }

    public function build()
    {
        return $this->subject('Il tuo codice sconto')
            ->view('mail.prize')
            ->with([
                'discountCode' => $this->discountCode,
                'discountPercentage' => $this->discountPercentage,
            ]);
    }
}
