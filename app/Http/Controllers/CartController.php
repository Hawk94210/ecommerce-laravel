<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $viewData = [
            'cartitems' => $cartitems
        ];
        return view('frontend.cart', $viewData);
    }

    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if (Auth::check()) {

            $prod_check = Product::where('id', $product_id)->first();

            if ($prod_check) {
                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name . 'Already']);
                } else {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->prod_qty = $quantity;
                    $cartItem->user_id = Auth::id();
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name . 'Add to cart']);
                }
            }
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }

    public function remove(Request $request)
    {


        if (Auth::check()) {
            $prod_id = $request->input('prod_id');

            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {

                $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => 'Xóa sản phẩm thành công']);
            }
        } else {
            return response()->json(['status' => "Login to Continue"]);
        }
    }



    // public function addToCart(Request $request, $id)
    // {
    //     dd($id);
    //     $product = Product::findOrFail($id);
    //     $cart = session()->get('cart', []);
    //     if ($request->quantity) {
    //         $cart[$id]['quantity'] = $request->input('quantity');
    //     }
    //     if (isset($cart[$id])) {
    //         $cart[$id]['quantity']++;
    //     } else {
    //         $cart[$id] = [
    //             "name" => $product->name,
    //             "quantity" => 1,
    //             "price" => $product->price,
    //             "image" => $product->image
    //         ];
    //     }

    //     session()->put('cart', $cart);
    //     return redirect()->back()->with('success', 'Product added to cart successfully!');
    // }


    public function update(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $prod_qty = $request->input('prod_qty');
        if (Auth::check()) {
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {

                $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->prod_qty = $prod_qty;
                $cartItem->update();
                return response()->json(['status' => 'Thành công']);
            }
        }
    }
}