var time = 100;

var $window = $(window),
    $document = $(document),
    $cart_button = $('.add_cart'),
    $cart_modal = $('.add_to_cart');

$(document).on('click', '.add_cart', function () {
    let _this = $(this);
    let sku = _this.attr('data-sku');
    let qty = $('#quantity_641ac7921420e').val();
    let ajaxUrl = 'ajax/frontend/cart/insert';
    if (swatch.hasClass('selected') && swatch2.hasClass('selected')) {
        if (qty > 0) {
            $.post(ajaxUrl, {
                sku: sku, qty: qty
            },
                function (data) {
                    let json = JSON.parse(data);
                    if (json.response.code == 10) {
                        $('.bag .number').html(json.response.totalItems);
                        toastr.success('Thêm sản phẩm vào giỏ hàng thành công!');
                    } else {
                        toastr.error('Có lỗi xảy ra, vui lòng thử lại, mã lỗi: !' + json.response.code);
                    }
                });
        } else {
            toastr.error('Có lỗi xảy ra, bạn phải mua ít nhất 1 sản phẩm');
        }
    }
    else {
        toastr.error('Có lỗi xảy ra, bạn phải chọn size hoặc màu sắc của sản phẩm');
    }

    return false;
});

$(document).on('click', 'input[name=method]', function () {
    let val = $(this).val();
    if (val == 'store') {
        $('#cityid_field').addClass('hidden')
        $('#districtid_field').addClass('hidden')
        $('#wardid_field').addClass('hidden')
        $('#address_field').addClass('hidden')
    } else {
        $('#cityid_field').removeClass('hidden')
        $('#districtid_field').removeClass('hidden')
        $('#wardid_field').removeClass('hidden')
        $('#address_field').removeClass('hidden')
    }
})

$(document).on('click', '.add_to_cart', function () {
    let _this = $(this);
    let sku = _this.attr('data-sku');
    let qty = $('#qtym_modal').val();
    let ajaxUrl = 'ajax/frontend/cart/insert';
    if (qty > 0) {
        $.post(ajaxUrl, {
            sku: sku, qty: qty
        },
            function (data) {
                let json = JSON.parse(data);
                if (json.response.code == 10) {
                    $('.bag .number').html(json.response.totalItems);
                    toastr.success('Thêm sản phẩm vào giỏ hàng thành công!');
                } else {
                    toastr.error('Có lỗi xảy ra, vui lòng thử lại, mã lỗi: !' + json.response.code);
                }
            });
    } else {
        toastr.error('Có lỗi xảy ra, bạn phải mua ít nhất 1 sản phẩm');
    }

});

$(document).on('change', '.input-quantity', function () {
    update($(this));
})

$(document).on('change', '.radio-price-ship', function () {
    let _this = $(this);
    let price = _this.attr('data-price')
    $('#total_shipping').html(format_curency(price) + '₫')
    $('#total_shipping').attr('data-price', price)
    render_cart(0);
})

$(document).on('click', '.button_quantity_cart', function () {
    update($(this), 'button');
})

$(document).on('click', '.btn-coupon__code', function () {
    let _this = $(this);
    let voucherid = $('.discount_code').val();
    let ajaxUrl = 'ajax/frontend/cart/voucher';
    if (voucherid.length > 0) {
        $.post(ajaxUrl, {
            voucherid: voucherid
        },
            function (data) {
                let json = JSON.parse(data);
                toast_voucher(json, voucherid)
            });
    }
    return false;
});
$(document).on('submit', '#searchInCart', function () {
    let _this = $(this);
    let form = _this.serializeArray();
    let dataForm = convert_object(form);
    let ajaxUrl = 'ajax/frontend/CartSearchProduct/search_product';
    $.get(ajaxUrl, {
        dataForm: dataForm
    }, function (data) {
        $('.list-product-search').html(data)
    });
    return false;
});

$(document).on('click', '.fc-cart-remove', function () {
    let _this = $(this)
    let code = _this.parents('tr').find('.productid_hidden').val();
    let form_URL = 'ajax/frontend/cart/remove';
    let sum = 0;
    $.post(form_URL, {
        code: code
    },function (data) {
        _this.parents('li').remove()
        let count = $('.list-product-cart tr').length;
        $('.panel-head .count').html(count + ' Sản phẩm');
        if (count == 0) {
            $('.list-product-cart').remove();
            $('.panel-body ').append('<p class="info-cart text-danger">Chưa có đơn hàng nào được chọn</p>');
            $('#subtotal').html(0);
            $('#total').html(0);
        } else {
            render_cart(sum);
        }
    });
})

$(document).on('click', '.cart-remove', function () {
    let _this = $(this)
    let code = _this.parents('.cart_item').find('.productid_hidden').val();
    let form_URL = 'ajax/frontend/cart/remove';
    let sum = 0;
    $.post(form_URL, {
        code: code
    },
        function (data) {
            _this.parents('.cart_item').remove()
            render_cart_remove(0);
        });
    return false;
});

function render_cart_remove(sum) {
    $('.new_price').each(function () {
        let abc = $(this).html();
        abc = parseFloat(abc.replaceAll('.', ''))
        sum = sum + abc;
    })
    let count = $('.cart_item').length;
    $('.quantity-cart').html(count)
    let discount = parseFloat($('#total_discount').attr('data-price')) / 100;
    let shipping = parseFloat($('#total_shipping').attr('data-price'));
    let new_sum = 0;
    new_sum = (sum * discount) + shipping;
    sum = sum.toString()
    new_sum = new_sum.toString()
    $('#subtotal').html(format_curency(sum) + 'đ');
    $('.pay_total').val(sum);
    $('#total').html(format_curency(sum) + 'đ');
    $('#total_primary').html(format_curency(new_sum) + 'đ');
}

function convert_object(inputData) {
    var outputData = {
        keyword: "",
        min_price: 0,
        max_price: 3000000,
        catalogueid: {},
        attribute: {}
    };

    $.each(inputData, function (index, item) {
        var propertyName = item.name;
        var propertyValue = item.value;

        if (propertyName === "catalogueid" || propertyName === "attribute") {
            // If property is catalogueid or attribute, use an object to store values
            if (!outputData[propertyName][index]) {
                outputData[propertyName][index] = parseInt(propertyValue);
            }
        } else {
            // For other properties, directly assign values
            outputData[propertyName] = propertyValue;
        }
    });
    return outputData;
}

function format_curency(data) {
    let format = data.replace(/\B(?=(\d{3})+(?!\d))/g, '.')
    return format;
}

function render_cart(sum) {
    $('.new_price').each(function () {
        let abc = $(this).html();
        abc = parseFloat(abc.replaceAll('.', '').replaceAll('đ', '').replaceAll(',', ''))
        sum = sum + abc;
    })
    let discount = parseFloat($('#total_discount').attr('data-price'));
    let shipping = parseFloat($('#total_shipping').attr('data-price'));
    let discount_member = parseFloat($('#loyal_customers').attr('data-percent') / 100);
    discount = isNaN(discount) ? 0 : discount;
    shipping = isNaN(shipping) ? 0 : shipping;
    discount_member = isNaN(discount_member) ? 0 : discount_member;

    let new_sum = 0;
    new_sum = sum - discount + shipping;
    let minus_member_discount = sum * discount_member;
    new_sum = new_sum - minus_member_discount;
    sum = sum.toString()
    new_sum = new_sum.toString()
    $('#subtotal').html(format_curency(sum) + 'đ');
    $('.pay_total').val(sum);

    $('#total').html(format_curency(sum) + 'đ');
    $('#total_primary').html(format_curency(new_sum) + 'đ');
}

function update(__this, type) {
    let _this = __this;
    let price = _this.parents('tr').find('.price_view').html();
    let code = _this.parents('tr').find('.productid_hidden').val();
    let quantity;
    if (type == 'button') {
        quantity = _this.siblings('.input-quantity').val()
    } else {
        quantity = _this.val()
    }
    let new_price = 0;
    let sum = 0;
    price = parseFloat(price.replaceAll('.', ''))
    new_price = price * quantity;
    let form_URL = 'ajax/frontend/cart/change_quantity';
    $.post(form_URL, {
        quantity: quantity, code: code
    },
        function (data) {
            new_price = new_price.toString()
            _this.parents('tr').find('.new_price').html(format_curency(new_price.toString()) + 'đ');
            render_cart(sum);
        });
}

function toast_voucher(data, val) {
    if (data.type == 'error') {
        toastr.error(data.text);
    }
    if (data.type == 'success') {
        toastr.success(data.text);
        $('.voucherid_hidden').val(val)
        $('.voucher_price_hidden').val(data.price)
    }
    let shipping = parseFloat($('#total_shipping').attr('data-price'));
    let discount_member = parseFloat($('#loyal_customers').attr('data-percent') / 100);
    let price_discount = 0;
    let new_sum = 0;
    let sum = 0;
    $('.new_price').each(function () {
        let abc = $(this).html();
        abc = parseFloat(abc.replaceAll('.', ''))
        sum = sum + abc;
    })
    if (data.voucher_type == 'percent') {
        price_discount = (sum * data.price) / 100;
        new_sum = (sum - price_discount) + shipping;
        new_sum = Math.round(new_sum);
        $('#total_discount').html(data.price + '%' + ' - ' + format_curency(price_discount.toString()) + '₫')
    } else {
        price_discount = data.price;
        new_sum = (sum - price_discount) + shipping;
        $('#total_discount').html(format_curency(price_discount.toString()) + '₫')
    }
    let minus_member_discount = sum * discount_member;
    new_sum = new_sum - minus_member_discount;
    $('#total_discount').attr('data-price', price_discount)
    $('#total_primary').html(format_curency(new_sum.toString()) + 'đ');
}