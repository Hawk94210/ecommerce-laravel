<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('carts'));
    }

    public function placeOrder(Request $request)
    {
        $order = new Order();
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->company_name = $request->company_name;
        $order->country = $request->country;
        $order->address = $request->address;
        $order->phone = $request->phone;
        $order->save();

        $carts = Cart::where('user_id', Auth::id())->get();
        foreach ($carts as $cart) {
            OrderDetail::create([
                'order_id' => $order->id,
                'prod_id' => $cart->prod_id,
                'qty' => $cart->qty,
                'amount' => $cart->products->price
            ]);
        }
        return redirect('/')->with('success', 'Đặt đơn thành công');
    }
}