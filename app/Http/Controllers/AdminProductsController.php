<?php

namespace FRD\Http\Controllers;

use FRD\Category;
use FRD\Product;
use FRD\ProductImage;
use Illuminate\Http\Request;
use FRD\Http\Requests;
use FRD\Http\Requests\ProductRequest;
use FRD\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
{
    private $products;

    public function __construct(Product $product)
    {
        $this->products = $product;
    }

    public function index()
    {
        $products = $this->products->paginate(5);

        return view('admin.products.index', compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name','id');

        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $input = $request->all();

        $product = $this->products->fill($input);
        $product->save();

        return redirect()->route('products.index');
    }

    public function edit($id, Category $category)
    {
        $product = $this->products->findOrNew($id);
        $categories = $category->lists('name','id');

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = $this->products->findOrNew($id);
        $input = $request->all();

        if (!isset($input['featured'])) {
            $input['featured'] = 0;
        }
        if (!isset($input['recommend'])) {
            $input['recommend'] = 0;
        }

        $product->update($input, $id);

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $this->products->findOrNew($id)->delete();

        return redirect()->route('products.index');
    }

    public function images($id)
    {
        $product = $this->products->findOrNew($id);

        return view('admin.products.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->products->findOrNew($id);

        return view('admin.products.create_image', compact('product'));
    }

    public function storeImage(Request $request, $id, ProductImage $productImage)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id . '.' . $extension, File::get($file));

        return redirect()->route('products.images',['id'=>$id]);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->findOrNew($id);

        if (file_exists(public_path() . '/uploads' . $image->id . '.' . $image->extension))
        Storage::disk('public_local')->delete($image->id . '.' . $image->extension);

        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images',['id'=>$product->id]);
    }
}
