<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class VerificationMailButton extends Component
{

public function resendVerificationEmail()
{
    Auth::user()->sendEmailVerificationNotification();

    $this->dispatch('verificationEmailSent', message: 'Email di verifica inviata!', color: '#8fffd2');
}
    public function render()
    {
        return view('livewire.verification-mail-button');
    }
}
