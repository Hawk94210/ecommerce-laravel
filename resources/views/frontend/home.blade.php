@extends('frontend.master')
@section('slide')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <span>Trang chủ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide " data-ride="carousel">
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
                    @foreach ($categories as $category)
                        <div class="carousel-item ">
                            <div class="container-fluid ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="detail-box">
                                            <h1 class="product-name">
                                                {{ $category->name }}
                                            </h1>
                                            <p>
                                                Aenean scelerisque felis ut orci condimentum laoreet. Integer nisi nisl,
                                                convallis
                                                et augue sit amet, lobortis semper quam.
                                            </p>
                                            <div class="btn-box">
                                                <a href="{{ route('show.list.products.by.categoy', $category->id) }}"
                                                    class="btn1">
                                                    Xem sản phẩm
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="img-box">
                                            <img src="/uploads/categories/{{ $category->image }}" alt="">
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
                    Sản phẩm nổi bật
                </h2>
            </div>
            <div class="row product_data">
                @if (isset($productHot))
                    @foreach ($productHot as $hot)
                        <div class="col-sm-6 col-xl-3">
                            <div class="box">
                                <input type="hidden" value="{{ $hot->id }}" class="prod_id">
                                <a href="{{ route('show.detail', $hot->id) }}">
                                    <div class="img-box">
                                        <img src="/uploads/products/{{ $hot->image }}" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <h6>
                                            {{ $hot->name }}
                                        </h6>
                                        <h6>
                                            Price:
                                            <span>
                                                {{ number_format($hot->price, 0, ',', '.') }}
                                            </span>
                                        </h6>
                                    </div>
                                    <div class="new">
                                        <span>
                                            Nổi bật
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="btn-box">
                <a href="{{ route('show.product') }}">
                    View All
                </a>
            </div>
        </div>
    </section>
@endsection
