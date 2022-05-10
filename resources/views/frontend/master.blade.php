<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')
    <base href="{{ asset('') }}">


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>
    <div class="hero_area">
        <div class="hero_social">
            <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
        </div>
        <!-- header section strats -->
        @include('frontend.layouts.header')
        <!-- end header section -->
        <!-- slider section -->
        @yield('slide')
        <!-- end slider section -->
    </div>

    @yield('content')
    <!-- end contact section -->

    <!-- client section -->
    <!-- end client section -->

    <!-- footer section -->
    @include('frontend.layouts.footer')
    <!-- footer section -->
    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <script>
        $(document).ready(function() {

            // var proQty = $('.pro-qty');
            // proQty.prepend('<span class="dec qtybtn changeQty">-</span>');
            // proQty.append('<span class="inc qtybtn changeQty">+</span>');
            // proQty.on('click', '.qtybtn', function() {
            //     var $button = $(this);
            //     var oldValue = $button.parent().find('input').val();
            //     if ($button.hasClass('inc')) {
            //         var newVal = parseFloat(oldValue) + 1;
            //     } else {
            //         // Don't allow decrementing below zero
            //         if (oldValue > 0) {
            //             var newVal = parseFloat(oldValue) - 1;
            //         } else {
            //             newVal = 0;
            //         }
            //     }
            //     $button.parent().find('input').val(newVal);
            // });

            $('.addToCartBtn').click(function(e) {
                e.preventDefault();

                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var quantity = $(this).closest('.product_data').find('.qty-input').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $.ajax({
                    type: "POST",
                    url: "{{ route('add.to.cart') }}",
                    data: {
                        'product_id': product_id,
                        'quantity': quantity,
                    },
                    success: function(response) {
                        alert(response.status)
                    }
                });
            });
            $('.delete-cart-item').click(function(e) {
                e.preventDefault();

                var prod_id = $(this).closest('.product-data').find('.prod_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('remove.from.cart') }}",
                    data: {
                        'prod_id': prod_id,
                    },
                    success: function(response) {
                        location.reload()
                        alert(response.status)
                    }
                });

            });
            $('.changeQty').click(function(e) {
                e.preventDefault();
                var quantity = $(this).closest('.product-data').find('.qty-input').val();
                var prod_id = $(this).closest('.product-data').find('.prod_id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                data = {
                    'prod_id': prod_id,
                    'prod_qty': quantity,
                }

                $.ajax({
                    type: "POST",
                    url: "{{ route('update.cart') }}",
                    data: data,
                    success: function(response) {
                        location.reload()
                    }
                });
            });

            $('.decrement-btn').click(function(e) {
                e.preventDefault();

                var dec_value = $(this).closest('.product-data').find('.qty-input').val();
                var value = parseInt(dec_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--;
                    $(this).closest('.product-data').find('.qty-input').val()
                }
            });
            $('.increment-btn').click(function(e) {
                e.preventDefault();

                var inc_value = $(this).closest('.product-data').find('.qty-input').val();
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    value++;
                    $(this).closest('.product-data').find('.qty-input').val()
                }
            });
        });
    </script>
    {{-- <script src="js/main.js"></script> --}}
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- End Google Map -->

</body>

</html>
