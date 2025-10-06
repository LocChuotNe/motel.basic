$(document).on('click', '.search-box .input-submit', function () {
    let _this = $(this);
    let canonical = $('.search-dropdown').val();
    let keyword = $('.form_search input').val()
    if (canonical == 0) {
        window.location.href = BASE_URL + 'tat-ca-san-pham' + SUFFIX + '?keyword=' + slug(keyword);
    } else {
        window.location.href = BASE_URL + canonical + SUFFIX + '?keyword=' + slug(keyword) + '&cat=' + canonical;
    }
    return false;
});
// Gửi form liên hệ
$(document).ready(function () {
    $('body').on('click', '.submit-form-contact', function (e) {
        let _this = $(this)
        let email = $('.minh-email-contact').val();
        let check = 0;
        var loader = $('.loader');

        if (IsEmail(email) == false) {
            loader.show();
            setTimeout(() => {
                loader.hide();
                toastr.error('Định dạng Email không hợp lệ!', 'Xin vui lòng thử lại!');
            }, "2000")

        } else {
            let form_URL = 'ajax/frontend/action/contact_full_email';
            $.post(form_URL, {
                email: email
            },
                function (data) {

                    if (data.trim() == 'success') {
                        loader.show();
                        setTimeout(() => {
                            loader.hide();
                            toastr.success('Thành công', 'Bạn đã gửi thông tin thành công, chúng tôi sẽ liên hệ với bạn sớm nhất!');
                        }, "2000")

                    } else {
                        loader.show();
                        setTimeout(() => {
                            loader.hide();
                            toastr.error('An error occurred!', 'Xin vui lòng thử lại!');
                        }, "2000")
                    }
                });
        }
        return false;
    });
});
$(document).on('click', '.submit-form-contact2', function () {
    let _this = $(this)
    let fullname = $('.minh-fullname-contact').val()
    let email = $('.minh-email-contact').val()
    let phone = $('.minh-phone-contact').val()
    let message = $('.minh-message-contact').val()
    var loader = $('.loader');
    let check = 0;
    loader.show();
    if (fullname.length == 0) {
        setTimeout(() => {
            loader.hide();
            toastr.error('Họ và tên không được để trống!', 'Xin vui lòng thử lại!');
        }, "2000")
    }
    else if (phone.length == 0) {
        setTimeout(() => {
            loader.hide();
            toastr.error('Số điện thoại không được để trống!', 'Xin vui lòng thử lại!');
        }, "2000")
    }
    else if (IsEmail(email) == false) {
        setTimeout(() => {
            loader.hide();
            toastr.error('Định dạng Email không hợp lệ!', 'Xin vui lòng thử lại!');
        }, "2000")
    }
    else if (message.length < 10) {
        setTimeout(() => {
            loader.hide();
            toastr.error('Nội dung cần gửi tối thiểu 10 kí tự!', 'Xin vui lòng thử lại!');
        }, "2000")
    }
    else {
        let form_URL = 'ajax/frontend/action/contact_full_2';
        $.post(form_URL, {
            email: email, fullname: fullname, phone: phone, message: message
        },
            function (data) {
                if (data.trim() == 'success') {
                    setTimeout(() => {
                        loader.hide();
                        toastr.success('Thành công', 'Bạn đã gửi yêu cầu thành công, chúng tôi sẽ liên hệ với bạn sớm nhất!');
                    }, "2000")
                } else {
                    setTimeout(() => {
                        loader.hide();
                        toastr.error('An error occurred!', 'Xin vui lòng thử lại!');
                    }, "2000")
                }
            });
    }
    return false;
})


$(document).on('click', '.btn-booking-form', function () {
    let _this = $(this)
    let fullname = $('.minh-fullname-contact').val()
    let email = $('.minh-email-contact').val()
    let phone = $('.minh-phone-contact').val()
    let message = $('.minh-message-contact').val()
    let checkin = $('.minh-checkin-contact').val()
    let checkout = $('.minh-checkout-contact').val()
    var loader = $('.loader');
    let check = 0;
    loader.show();
    if (fullname.length == 0) {
        setTimeout(() => {
            loader.hide();
            toastr.error('Họ và tên không được để trống!', 'Xin vui lòng thử lại!');
        }, "2000")
    }
    else if (phone.length == 0) {
        setTimeout(() => {
            loader.hide();
            toastr.error('Số điện thoại không được để trống!', 'Xin vui lòng thử lại!');
        }, "2000")
    }
    else if (IsEmail(email) == false) {
        setTimeout(() => {
            loader.hide();
            toastr.error('Định dạng Email không hợp lệ!', 'Xin vui lòng thử lại!');
        }, "2000")
    }
    else if (message.length < 10) {
        setTimeout(() => {
            loader.hide();
            toastr.error('Nội dung cần gửi tối thiểu 10 kí tự!', 'Xin vui lòng thử lại!');
        }, "2000")
    }
    else {
        let form_URL = 'ajax/frontend/action/booking';
        $.post(form_URL, {
            email: email, fullname: fullname, phone: phone, message: message, checkin: checkin, checkout: checkout
        },
            function (data) {
                if (data.trim() == 'success') {
                    setTimeout(() => {
                        loader.hide();
                        toastr.success('Thành công', 'Bạn đã gửi yêu cầu thành công, chúng tôi sẽ liên hệ với bạn sớm nhất!');
                    }, "2000")
                } else {
                    setTimeout(() => {
                        loader.hide();
                        toastr.error('An error occurred!', 'Xin vui lòng thử lại!');
                    }, "2000")
                }
            });
    }
    return false;
})
//Định dạng email
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}

$(".owl-slide").each(function () {
    let _this = $(this);
    let option = _this.find('.owl-carousel').attr('data-owl');
    let owlInit = atob(option);
    console.log(1)
    owlInit = JSON.parse(owlInit);
    _this.find('.owl-carousel').owlCarousel(owlInit);
});
$('.smooth-move').on('click', function () {
    var thisAttr = $(this).attr('href');
    if ($(thisAttr).length) {
        var scrollPoint = $(thisAttr).offset().top - 50;
        $('body,html').animate({
            scrollTop: scrollPoint
        }, 800);
    }
    return false;
});
// header
$(document).ready(function () {
    $('.mobile-nav-toggler').on('click', function () {
        var mobile_menu = $('.mobile-menu');
        var menu_backdrop = $('.menu-backdrop');
        menu_backdrop.addClass('active');
        mobile_menu.addClass('open');
        return false;
    });
    $('.close-btn').on('click', function () {
        var mobile_menu = $('.mobile-menu');
        var menu_backdrop = $('.menu-backdrop');
        menu_backdrop.removeClass('active');
        mobile_menu.removeClass('open');
        return false;
    });
    $('.navigation li').on('click', function () {
        let _this = $(this);
        _this.find('.submenu').slideToggle();
        _this.find('.dropdown-btn').toggleClass('open');
    });
    $('.header-search').on('click', function () {
        var search_popup_wrap = $('.search-popup-wrap');
        search_popup_wrap.slideToggle();
        return false;
    });
    $('.search-close').on('click', function () {
        var search_popup_wrap = $('.search-popup-wrap');
        search_popup_wrap.slideToggle();
        return false;
    });
    $(document).click(function (e) {
        var sub_menu = $('.submenu');
        var mobile_menu = $('.mobile-menu');
        var menu_backdrop = $('.menu-backdrop');
        if (!mobile_menu.is(e.target) && mobile_menu.has(e.target).length === 0) {
            mobile_menu.removeClass('open');
            menu_backdrop.removeClass('active');
            sub_menu.removeClass('block');
        }

    });
});
$(document).on('click', '.btn-addcart', function () {
    let _this = $(this)
    let sku = _this.attr('data-sku');
    let qty = $('#qtym').val();
    let ajaxUrl = 'ajax/frontend/cart/insert';
    _this.addClass('loading');
    $.post(ajaxUrl, {
        sku: sku, qty: (qty != undefined ? qty : 1
        )
    }, function (data) {
        let json = JSON.parse(data);
        $('.hd-quantity-cart').text(json.response.totalItems)
        if (json.response.code == 10) {
            _this.removeClass('loading')
            $('.quantity-cart').html(json.response.totalItems)
            toastr.success('Thêm sản phẩm vào giỏ hàng thành công!');
            if (_this.hasClass('cart-search')) {
                render_html_cart();
            }
        } else {
            toastr.error('Có lỗi xảy ra, vui lòng thử lại, mã lỗi: !' + json.response.code);
        }
    });
    return false;
})
$(document).ready(function () {
    var wd_width = $(window).width();
    // Bộ lọc
    if ($('.filter-label') && $('.filter-checkbox')) {
        $('.filter-label').click(function () {
            $(this).parent().find('.filter-checkbox').trigger('click');
        });
    }

    //Thay đổi ảnh chi tiết sản phẩm
    if (wd_width > 960 && $('.prd-gallerys .small-image .image')) {
        $('.prd-gallerys .small-image .image').click(function (event) {
            var img_src = $(this).attr('data-image');
            $('.prd-gallerys .big-image').find('img').attr({
                src: img_src,
                'data-zoom-image': img_src
            });
            $('.prd-gallerys .small-image li').removeClass('active');
            $(this).parents('li').addClass('active');
            event.preventDefault();
        });
    }


    //Product tab
    if ($('.tabs-anchor')) {
        $('.tabs-anchor li a').click(function () {
            var tab_id = $(this).attr('href');
            $('html,body').animate({ scrollTop: $(tab_id).offset().top - 50 }, 500)
        });
    }

    //Sắp xếp sản phẩm mobile
    if (wd_width < 960 && $('.order-list')) {
        $('.order-list>li>a').click(function (e) {
            $(this).parents('.order-list').find('li').removeClass('active')
            $(this).parent().addClass('active');
        })
    }

    //Lọc theo giá mobile
    if (wd_width < 960 && $('.list-price')) {
        $('.list-price>li>a').click(function (e) {
            $(this).parents('.list-price').find('li').removeClass('active')
            $(this).parent().addClass('active');
        })
    }

    //Hiển thị bộ lọc trên mobile
    if (wd_width < 960 && $('.btn-mobile-fliter')) {
        $('.btn-mobile-fliter').click(function (event) {
            var filer_section = $(this).attr('data-mobile-box');
            $(filer_section).addClass('active');
            $(this).parents('.mobile-filter-bar').hide();
            $('html, body').animate({ 'scrollTop': 0 }, 100);
            event.preventDefault();
        });

        $('.mobile-filer-section .heading').click(function () {
            $(this).parents('.mobile-filer-section').removeClass('active');
        });

        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('.mobile-filter-bar').show();
            } else {
                $('.mobile-filter-bar').hide();
            }
        });
    }
});

$(document).ready(function () {
    $('.cart-panel .input-check-label').click(function () {
        $(this).parents('.check-box').find('.input-check').trigger('click');
    });
});

$(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
        $('.pc-header').addClass('fix');
    } else {
        $('.pc-header').removeClass('fix');

    }
});