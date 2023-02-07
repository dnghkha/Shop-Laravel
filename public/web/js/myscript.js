
'use strict';

(function ($) {
    //setup toastr
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //add to cart
    $('.addtocart').click(function () {
        var _that = $(this);
        var _url = _that.data('href');
        var _data = {};
        var _method = 'POST';
        //loading
        _that.prop('disabled', true).text('Loading...');
        $.ajax({
            url: _url,
            data: _data,
            method: _method,
            success: function (d) {
                $('#count_cart').text(d.count_cart);
                $('#total').text(d.total);
                _that.prop('disabled', d.prop).text(d.action);
                toastr.success(d.msg, d.title);
            },
            error: function (d) {
                toastr.error(d.responseJSON.message);
            }
        })
    });

    //update item
    $('.updatebtn').click(function(){
        var _that =  $(this);
        var _url = _that.data('href')
        var _data = {_action: _that.data('value')};
        var _method = 'PUT';
        // _that.prop('disabled', true);
        $.ajax({
            url: _url,
            data: _data,
            method: _method,
            success: function(d){
                $('#buyqty_'+d.id).val(d.buyqty_item);
                $('#price_total_'+d.id).text(d.price_total);
                $('#count_cart').text(d.count_cart);
                $('#total').text(d.total);
                $('#subTotal').text(d.total);
                $('#tax').text(d.tax);
                $('#total2').text(d.total2);
            },
            error: function (d) {
                toastr.error(d.responseJSON.message);
            },

        })
    });

    //remove item
    $('.removeitem').click(function(){
        var _that =  $(this);
        var _id = _that.data('id');
        var _url = _that.data('href')
        var _data = {};
        var _method = 'DELETE';
        $.ajax({
            url: _url,
            data: _data,
            method: _method,
            success: function(d){
                $('#'+_id).remove();
                $('#count_cart').text(d.count_cart);
                $('#total').text(d.total);
                $('#subTotal').text(d.total);
                $('#tax').text(d.tax);
                $('#total2').text(d.total2);
                if(!d.count_cart){
                    $('#cartBody').html(
                        '<tr>'+
                                '<td colspan="3" class="text-center"><img class="img-fluid" src="uploads/images/shopping-cart/cart_is_empty.png" alt=""></td>'+
                        '</tr>'
                    )

                };
                toastr.success(d.msg, d.title);
            },
            error: function (d) {
                toastr.error(d.responseJSON.message);
            }
        })
    });

})(jQuery);
