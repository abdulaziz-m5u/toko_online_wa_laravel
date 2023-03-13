<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function index()
    {
        $products = Product::active()->get();

        return view('frontend.homepage', compact('products'));
    }

    public function detail(Product $product)
    {
        return view('frontend.detail', compact('product'));
    }

    public function kategori(Category $category)
    {
        $childIds = Category::childIds($category->id);
        $categoryIds = array_merge([$category->id], $childIds);

        $products = Product::whereHas(
            'categories',
            function ($query) use ($categoryIds) {
                $query->whereIn('categories.id', $categoryIds);
            }
        )->get();

        return view('frontend.category', compact('products', 'category'));
    }

    public function checkout(Request $request) {
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'wa' => 'required',
            'kota' => 'required'
        ]);

        $product = Product::findOrFail($request->productId);
        header("Location: https://api.whatsapp.com/send?phone=081999483864&&text=Nama%20%3A%20$request->name.%0ANo.Wa%20%3A%20$request->wa.%0AAlamat%20%3A%20$request->alamat,$request->kota.%0A%0A%0ANama%20Produk%20%3A%20$product->name.%0AHarga%20%3A%20Rp.".number_format($product->price).".%0A%0A%0AURL%20%3A%20". url()->previous());
        die();
    }
}
