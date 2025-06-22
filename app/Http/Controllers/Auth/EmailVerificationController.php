<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    // Mostra la pagina di verifica
    public function notice()
    {
        return view('auth.verify-email');
    }

    // Verifica l'email quando clicchi sul link
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->intended('/user/dashboard'); // puoi personalizzare il redirect
    }

    // Rispedire l'email di verifica
    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        $message = 'Email di verifica inviata!';
        $color = '#8fffd2';

        return back()->with('status', [
            'message' => $message, 
            'color' => $color]);
    }
}
