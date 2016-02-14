<?php

namespace FRD\Http\Controllers;

use FRD\Order;
use FRD\OrderItem;
use Illuminate\Http\Request;
use FRD\Http\Requests;
use FRD\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{

    public function place(Order $orderModel, OrderItem $orderItem)
    {
        if (!Session::has('cart')) {
            return false;
        }

        $cart = Session::get('cart');

        if ($cart->getTotal() > 0) {
            $order = $orderModel->create([
                'user_id'   => 1,
                'total'     => $cart->getTotal(),
            ]);

            foreach($cart->all() as $k => $item) {

                $order->order_items()->create([
                    'product_id'    => $k,
                    'price'         => $item['price'],
                    'qtd'           => $item['qtd'],
                ]);

            }

            dd($order);
        }

    }

    public function teste()
    {

    }

}
