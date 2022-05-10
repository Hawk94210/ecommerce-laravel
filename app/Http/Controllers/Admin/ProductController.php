<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        $viewData = [
            'products' => $products
        ];
        return view('admin.product.index', $viewData);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $this->insertOrUpdate($request);
        Toastr::success('Thêm mới thành công', 'Sản phẩm', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.update', compact('product'));
    }

    public function update(ProductRequest $request, $id)
    {
        $this->insertOrUpdate($request, $id);
        Toastr::success('Cập nhật thành công', 'Sản phẩm', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function insertOrUpdate(Request $request, $id = '')
    {
        $product = new Product();
        if ($id) {
            $category = Category::findOrFail($id);
            if ($request->hasFile('image')) {
                $path = '/uploads/categories/' . $category->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->content = $request->content;
        $product->pro_category_id = $request->pro_category_id;
        $product->price = $request->price;
        $product->sale = $request->sale;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;
        }
        $product->save();
    }


    public function action(Request $request, $action, $id)
    {
        if ($action) {
            $product = Product::findOrFail($id);
            switch ($action) {
                case 'delete':
                    $product->delete();
                    Toastr::error('Xóa danh mục thành công', 'Sản phẩm', ["positionClass" => "toast-top-right"]);
                    break;
                case 'active':
                    $product->active = $product->active ? 0 : 1;
                    Toastr::success('Cập nhật thành công', 'Sản phẩm', ["positionClass" => "toast-top-right"]);
                    break;
                case 'hot':
                    $product->hot = $product->hot ? 0 : 1;
                    Toastr::success('Cập nhật thành công', 'Sản phẩm', ["positionClass" => "toast-top-right"]);
                    break;
            }
            $product->save();
        }
        return redirect()->back();
    }
}