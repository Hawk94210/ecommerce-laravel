<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends FrontendController
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

    public function index()
    {
        $productHot = Product::where([
            'active' => Product::STATUS_PUBLIC,
            'hot' => Product::HOT_ON
        ])->limit(4)->get();
        $viewData = [
            'productHot' => $productHot
        ];

        return view('frontend.home', $viewData);
    }
}