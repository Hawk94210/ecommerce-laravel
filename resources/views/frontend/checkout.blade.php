@extends('frontend.master')
@section('slide')
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <h6>Thông tin khách hàng</h6>
                <form>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tên:</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Tên">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Họ:</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Họ">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Công ty:</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Công ty">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Địa chỉ:</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Địa chỉ">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Quê quán:</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Quê quán">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Số điện thoại:</label>
                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                            placeholder="Số điện thoại">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-warning">Thanh toán</button>
                </form>
            </div>
            <div class="col-sm-5">
                <h6>Thông tin giỏ hàng</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá sản phẩm</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                            <tr>
                                <td>{{ $cart->products->name }}</td>
                                <td>{{ $cart->prod_qty }}</td>
                                <td>{{ number_format($cart->products->price, 0, ',', '.') }}đ</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
