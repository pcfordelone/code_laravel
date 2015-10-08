<?php

namespace FRD\Http\Controllers;

use FRD\Cart;
use FRD\Product;
use Illuminate\Http\Request;
use FRD\Http\Requests;
use FRD\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private $cart;
    private $product;

    /**
     * @param Cart $cart
     */
    public function __construct(Cart $cart, Product $product)
    {
        $this->cart = $cart;
        $this->product = $product;
    }

    public function index()
    {
        if (!Session::has('cart')) {
            Session::set('cart', $this->cart);
        }

        return view('store.cart', ['cart' => Session::get('cart')]);
    }

    public function add($id)
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }

        $product = $this->product->findOrNew($id);
        echo $product->name; die;


        //$cart->add($id, $product->name, $product->price);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }
}
