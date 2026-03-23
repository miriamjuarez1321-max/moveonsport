<?php

namespace App\Services;

use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeService
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function createCheckoutSession($order)
    {
        $lineItems = [];

        foreach ($order->items as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'mxn',
                    'product_data' => [
                        'name' => $item->prenda->nombre,
                        'description' => "Talla: {$item->talla}",
                    ],
                    'unit_amount' => (int) ($item->precio * 100), // Stripe usa centavos
                ],
                'quantity' => $item->cantidad,
            ];
        }

        return Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.stripe.success', ['order' => $order->id]) . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.payment', ['order' => $order->id, 'method' => 'stripe']),
            'metadata' => [
                'order_id' => $order->id,
            ],
        ]);
    }

    public function verifySession($sessionId)
    {
        return Session::retrieve($sessionId);
    }
}
