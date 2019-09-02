<?php

namespace App;

use App\Http\Client;

class CheckoutController
{
    public function checkout()
    {
        $client = new Client;
        $result = $client->post('/checkout', $_POST['user']);

        $response = json_decode($result);

        if (true === $response->status) {
            return "{$response->payer} 付款成功, 金額 {$response->total}";
        }

        return "付款失敗，原因: $response->message";
    }
}
