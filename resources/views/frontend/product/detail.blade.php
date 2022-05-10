@extends('frontend.master')
@section('slide')
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{ route('show.home') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ route('show.list.products.by.categoy', $product->pro_category_id) }}">Sản phẩm</a>
                        <span>Chi tiết sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="picoutput"></div>
    <section class="about_section layout_padding">
        <div class="container">
            <div class="row product_data">
                <div class="col-md-6 col-lg-5 ">
                    <div class="img-box">
                        <img src="/uploads/products/{{ $product->image }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-details">
                        <div class="pd-title detail-box">
                            <h3>{{ $product->name }}</h3>
                        </div>
                        <div class="pd-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span>(5)</span>
                        </div>
                        <div class="detail-box">
                            <p>{{ $product->description }}</p>
                            <h4><span>{{ number_format($product->price, 0, ',', '.') }}</span></h4>
                        </div>
                        <div action="" class="cart">
                            <input type="hidden" value="{{ $product->id }}" class="prod_id">
                            <div class="quantity">
                                <input type="number" size="4" class="input-text qty text qty-input" title="Qty" value="1"
                                    name="quantity" min="1" step="1">
                            </div>
                            <button class="btn btn-warning addToCartBtn" role="button" style="padding-top: 5px"
                                type="button">Add to cart <i class="fa fa-shopping-cart"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
