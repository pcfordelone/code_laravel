<?php

namespace FRD\Http\Controllers;

use FRD\Product;
use Illuminate\Http\Request;
use FRD\Http\Requests;
use FRD\Http\Requests\ProductRequest;
use FRD\Http\Controllers\Controller;

class AdminProductsController extends Controller
{
    private $products;

    public function __construct(Product $product)
    {
        $this->products = $product;
    }

    public function index()
    {
        $products = $this->products->all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(ProductRequest $request)
    {
        $input = $request->all();
        print_r($input);

        $product = $this->products->fill($input);
        $product->save();

        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = $this->products->findOrNew($id);

        return view('admin.products.edit', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $this->products->findOrNew($id)->update($request->all());

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $this->products->findOrNew($id)->delete();

        return redirect()->route('products.index');
    }
}
