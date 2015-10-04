<?php

namespace FRD\Http\Controllers;

use FRD\Category;
use FRD\Product;
use Illuminate\Http\Request;
use FRD\Http\Requests;
use FRD\Http\Controllers\Controller;

class StoreController extends Controller
{
    private $productModel;
    private $categoryModel;

    public function __construct(Product $product, Category $category)
    {
        $this->productModel = $product;
        $this->categoryModel = $category;
    }

    public function index()
    {
        $categories = $this->categoryModel->all();
        $featuredProducts = $this->productModel->featured()->take(6)->get();
        $recommendedProducts = $this->productModel->recommend()->take(6)->get();

        return view('store.index', compact('categories', 'featuredProducts', 'recommendedProducts'));
    }

    public function category($id)
    {
        $categories = $this->categoryModel->all();
        $category = $this->categoryModel->find($id);
        $products = $this->productModel->ofCategory($id)->get();

        return view('store.category', compact('categories','category','products'));
    }

    public function product($id)
    {
        $categories = $this->categoryModel->all();
        $product = $this->productModel->find($id);

        return view ('store.product', compact('categories', 'product'));
    }
}
