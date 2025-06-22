<?php

namespace App\Http\Controllers;

use App\Mail\OrderSummaryMail;
use App\Models\Discount;
use App\Models\Kart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class StripePaymentController extends Controller
{
    public $coinCounter;
    public function checkout($payment)
    {
        return view('stripe.checkout', compact('payment'));
    }

    public function processPayment(Request $request, $payment)
    {
    Stripe::setApiKey(config('services.stripe.secret'));

    $charge = Charge::create([
        'amount' => $payment * 100, 
        'currency' => 'eur',
        'description' => 'Esempio pagamento',
        'source' => $request->stripeToken,
    ]);

    Discount::where('user_id', Auth::id())
        ->where('used', true)
        ->delete();

    $order = Order::create([
        'user_id' => Auth::id(),
        'total' => $payment,
        'status' => 'paid',
        'stripe_charge_id' => $charge->id,
    ]);

    $cartItems = Kart::where('user_id', Auth::id())->get();

    foreach ($cartItems as $item) {
        $order->items()->create([
            'order_id' => $order->id,
            'article_id' => $item->article_id,
            'quantity' => $item->amount,
            'price' => $item->article->price,
        ]);
    }

    Kart::where('user_id', Auth::id())->delete();

    $coinCounter = floor($payment / 25); 
    $user = Auth::user();
    if ($user && $coinCounter > 0) {
        $user->increment('coin', $coinCounter);
    }

    $order->load(['user', 'items']);
    Mail::to(Auth::user()->email)->send(new OrderSummaryMail($order));

    return redirect()->route('homepage')->with([
        'message' => 'Pagamento riuscito!',
        'color' => '#8fffd2'
    ]);
    }

}
