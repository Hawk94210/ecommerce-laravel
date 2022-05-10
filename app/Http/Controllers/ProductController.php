<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.product.detail', compact('product'));
    }

    public function index()
    {
        $products = Product::paginate(10);

        $viewData = [
            'products' => $products
        ];
        return view('frontend.product.products', $viewData);
    }
}