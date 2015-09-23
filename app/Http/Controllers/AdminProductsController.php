<?php

namespace FRD\Http\Controllers;

use FRD\Product;
use Illuminate\Http\Request;
use FRD\Http\Requests;
use FRD\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
    private $products;

    public function __construct(Product $product)
    {
        $this->products = $product;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->products->all();

        return view('products', compact('products'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function insert($id)
    {

    }

    /**
     * Update product.
     *
     * @param  Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Delete product.
     *
     * @param  Request  $request
     * @param  int  $id
     */
    public function delete(Request $request, $id)
    {

    }
}
