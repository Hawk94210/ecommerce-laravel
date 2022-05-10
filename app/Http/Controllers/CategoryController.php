<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends FrontendController
{

    private $categories;

    public function __construct()
    {
        $this->categories = parent::__construct();
    }

    public function master()
    {
        view('frontend.master', compact($this->categories));
    }

    public function getListProduct($id)
    {
        $products = Product::where([
            'active' => Product::STATUS_PUBLIC,
            'pro_category_id' => $id
        ])->orderBy('id', 'DESC')->paginate(10);

        $category = Category::find($id);
        $viewData = [
            'products' => $products,
            'category' => $category
        ];

        return view('frontend.product.index', $viewData);
    }
}