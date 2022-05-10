$(document).ready(function() {

    var proQty = $('.pro-qty');
        proQty.prepend('<span class="dec qtybtn">-</span>');
        proQty.append('<span class="inc qtybtn">+</span>');
        proQty.on('click', '.qtybtn', function() {
            var $button = $(this);
            var oldValue = $button.parent().find('input').val();
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $button.parent().find('input').val(newVal);
        });

    $('.addToCartBtn').click(function(e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var quantity = $(this).closest('.product_data').find('.qty-input').val();

        // alert(product_id)
        // alert(quantity)
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
    $('.delete-cart-item').click(function (e) { 
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
                'prod_id' : prod_id,
            },
            success: function (response) {
                alert(response.status)
            }
        });
        
    });
    $('.changeQty').click(function (e) { 
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
            url: "{{ route('update.cart') }}",
            data: {
                'product_id': product_id,
                'quantity': quantity,
            },
            success: function (response) {
                alert(response)
            }
        });
    });

    $('.decrement-btn').click(function (e) { 
        e.preventDefault();

        var dec_value = $(this).closest('.product-data').find('.qty-input').val();
        var value = parseInt(dec_value,10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest('.product-data').find('.qty-input').val()
        }
    });
    $('.increment-btn').click(function (e) { 
        e.preventDefault();

        var inc_value = $(this).closest('.product-data').find('.qty-input').val();
        var value = parseInt(inc_value,10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.product-data').find('.qty-input').val()
        }
    });

    // $('.decrement-btn').click(function(e) {
        //     e.preventDefault();

        //     var dec_value = $(this).closest('.product-data').find('.qty-input').val();
        //     var value = parseInt(dec_value, 10);
        //     value = isNaN(value) ? 0 : value;
        //     if (value > 1) {
        //         value--;
        //         $(this).closest('.product-data').find('.qty-input').val()
        //     }
        // });
        // $('.increment-btn').click(function(e) {
        //     e.preventDefault();

        //     var inc_value = $(this).closest('.product-data').find('.qty-input').val();
        //     var value = parseInt(inc_value, 10);
        //     value = isNaN(value) ? 0 : value;
        //     if (value < 10) {
        //         value++;
        //         $(this).closest('.product-data').find('.qty-input').val()
        //     }
        // });
});
