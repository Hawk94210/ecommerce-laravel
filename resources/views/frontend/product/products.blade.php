@extends('frontend.master')
@section('slide')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ route('show.home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Sản phẩm
                </h2>
            </div>
            <div class="row product_data">
                @if (isset($products))
                    @foreach ($products as $product)
                        <div class="col-sm-6 col-xl-3">
                            <div class="box">
                                <input type="hidden" value="{{ $product->id }}" class="prod_id">
                                <a href="{{ route('show.detail', $product->id) }}">
                                    <div class="img-box">
                                        <img src="/uploads/products/{{ $product->image }}" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h6>
                                            {{ $product->name }}
                                        </h6>
                                        <h6>
                                            Price:
                                            <span>
                                                {{ number_format($product->price, 0, ',', '.') }}
                                            </span>
                                        </h6>
                                    </div>
                                    @if ($product->hot == 1)
                                        <div class="new">
                                            <span>
                                                Nổi bật
                                            </span>
                                        </div>
                                    @endif
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
