@extends('frontend.master')
@section('slide')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ route('show.home') }}"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Danh mục sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container-fluid ">
                        <div class="row align-items-center">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="images/slider-img.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (isset($categories))
                    @foreach ($categories as $cate)
                        <div class="carousel-item ">
                            <div class="container-fluid ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="detail-box">
                                            <h1>
                                                {{ $cate->name }}
                                            </h1>
                                            <div class="btn-box">
                                                <a href="{{ route('show.list.products.by.categoy', $cate->id) }}"
                                                    class="btn1">
                                                    Xem sản phẩm
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="img-box">
                                            <img src="/uploads/categories/{{ $cate->image }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
            <ol class="carousel-indicators">
                <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                <li data-target="#customCarousel1" data-slide-to="1"></li>
                <li data-target="#customCarousel1" data-slide-to="2"></li>
                <li data-target="#customCarousel1" data-slide-to="3"></li>

            </ol>
        </div>

    </section>
@endsection
@section('content')
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    {{ $category->name }}
                </h2>
            </div>
            <div class="row">
                @if (isset($products))
                    @foreach ($products as $product)
                        <div class="col-sm-6 col-xl-3">
                            <div class="box">
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
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
