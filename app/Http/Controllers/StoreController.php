<?php

namespace FRD\Http\Controllers;

use FRD\Category;
use FRD\Product;
use Illuminate\Http\Request;
use FRD\Http\Requests;
use FRD\Http\Controllers\Controller;

class StoreController extends Controller
{

    public function index(Category $category, Product $product)
    {
        $categories = $category->all();
        $featuredProducts = $product->featured()->take(6)->get();
        $recommendedProducts = $product->recommend()->take(6)->get();

        return view('store.index', compact('categories', 'featuredProducts', 'recommendedProducts'));
    }
}
