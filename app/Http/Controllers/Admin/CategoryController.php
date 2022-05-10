<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $this->insertOrUpdate($request);
        Toastr::success('Thêm mới thành công', 'Danh mục', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.update', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $this->insertOrUpdate($request, $id);
        Toastr::success('Cập nhật thành công', 'Danh mục', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

    public function insertOrUpdate(Request $request, $id = '')
    {
        $category = new Category();
        if ($id) {
            $category = Category::findOrFail($id);
            if ($request->hasFile('image')) {
                $path = '/uploads/categories/' . $category->image;
                if (File::exists($path)) {
                    File::delete($path);
                }
            }
        }
        $category->name = $request->name;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/categories/', $filename);
            $category->image = $filename;
        }
        $category->save();
    }

    public function action($action, $id)
    {
        if ($action) {
            $category = Category::findOrFail($id);
            switch ($action) {
                case 'delete':
                    $category->delete();
                    Toastr::error('Xóa danh mục thành công', 'Danh mục', ["positionClass" => "toast-top-right"]);
                    return redirect()->back();
                    break;
            }
        }
    }
}