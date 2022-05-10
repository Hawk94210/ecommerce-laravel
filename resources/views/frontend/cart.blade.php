@extends('frontend.master')
@section('slide')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ route('show.home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3 mb-3">
        <div class="d-flex justify-content-center row">
            <div class="col-md-12">
                <div class="heading_container heading_center">
                    <h2>
                        Giỏ hàng
                    </h2>
                </div>
                <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                    <div class="mr-1">Ảnh sản phẩm
                    </div>
                    <div class="d-flex flex-column align-items-center product-details"><span>Tên sản phẩm</span>
                    </div>
                    <div class="d-flex flex-row align-items-center qty">
                        Số lượng
                    </div>
                    <div>
                        Giá sản phẩm
                    </div>
                    <div class="d-flex align-items-center"></div>
                </div>
                @php
                    $total = 0;
                @endphp
                @if (isset($cartitems))
                    @foreach ($cartitems as $cart)
                        <div
                            class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded product-data">
                            <div class="mr-1"><img class="rounded"
                                    src="/uploads/products/{{ $cart->products->image }}" width="70">
                            </div>
                            <div class="d-flex flex-column align-items-center product-details"><span
                                    class="font-weight-bold">{{ $cart->products->name }}</span>
                            </div>
                            <div class="qua-col">
                                <input type="hidden" class="prod_id" value="{{ $cart->prod_id }}">
                                {{-- <div class="input-group text-center mb-3" style="width: 130px">
                                    <button class="input-group-text changeQty decrement-btn">-</button>
                                    <input type="text" class="form-control text-center qty-input"
                                        value="{{ $cart->prod_qty }}">
                                    <button class="input-group-text changeQty increment-btn">+</button>
                                </div> --}}
                                <div data-th="Quantity"><input type="number"
                                        class="form-control form-control-lg text-center qty-input changeQty"
                                        value="{{ $cart->prod_qty }}"></div>
                                {{-- <input type="text" class="qty-input" id="qty" value="{{ $cart->prod_qty }}"> --}}

                            </div>
                            <div>
                                <h5 class="text-grey">{{ number_format($cart->products->price, 0, ',', '.') }}đ</h5>
                            </div>
                            <div class="d-flex align-items-center">
                                <button class="btn btn-danger delete-cart-item" type="submit"><i class="fa fa-trash"
                                        aria-hidden="true"></i>
                                    Xóa</button>
                            </div>
                        </div>
                        @php
                            $total += $cart->products->price * $cart->prod_qty;
                        @endphp
                    @endforeach
                @endif
                <div class="cart-footer">
                    <h6>Total price: {{ number_format($total, 0, ',', '.') }}đ</h6>
                </div>
                <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><input type="text"
                        class="form-control border-0 gift-card" placeholder="discount code/gift card"><button
                        class="btn btn-outline-warning btn-sm ml-2" type="button">Apply</button></div>
                <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded"><button
                        class="btn btn-warning btn-block btn-lg ml-2 pay-button" type="button">Proceed to Pay</button></div>
            </div>
        </div>
    </div>
@endsection
