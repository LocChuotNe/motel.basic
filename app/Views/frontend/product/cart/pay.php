<?php
$widget = [];
$widget['data'] = widget_frontend();
?>
<!DOCTYPE html>
<html lang="vi-VN">

<head>
    <!-- CONFIG -->
    <base href="<?php echo BASE_URL ?>" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,follow" />
    <meta name="author" content="<?php echo (isset($general['homepage_company'])) ? $general['homepage_company'] : ''; ?>" />
    <meta name="copyright" content="<?php echo (isset($general['homepage_company'])) ? $general['homepage_company'] : ''; ?>" />
    <meta http-equiv="refresh" content="1800" />
    <link rel="icon" href="<?php echo $general['homepage_favicon'] ?>" type="image/png" sizes="30x30">
    <!-- GOOGLE -->
    <title>Giỏ hàng</title>
    <meta name="description" content="<?php echo isset($meta_description) ? htmlspecialchars($meta_description) : ''; ?>" />
    <?php echo isset($canonical) ? '<link rel="canonical" href="' . $canonical . '" />' : ''; ?>
    <meta property="og:locale" content="vi_VN" />
    <!-- for Facebook -->
    <meta property="og:title" content="<?php echo (isset($meta_title) && !empty($meta_title)) ? htmlspecialchars($meta_title) : ''; ?>" />
    <meta property="og:type" content="<?php echo (isset($og_type) && $og_type != '') ? $og_type : 'article'; ?>" />
    <meta property="og:image" content="<?php echo (isset($meta_image) && !empty($meta_image)) ? $meta_image : base_url(isset($general['homepage_logo']) ? $general['homepage_logo'] : ''); ?>" />
    <?php echo isset($canonical) ? '<meta property="og:url" content="' . $canonical . '" />' : ''; ?>
    <meta property="og:description" content="<?php echo (isset($meta_description) && !empty($meta_description)) ? htmlspecialchars($meta_description) : ''; ?>" />
    <meta property="og:site_name" content="<?php echo (isset($general['homepage_company'])) ? $general['homepage_company'] : ''; ?>" />
    <meta property="fb:admins" content="" />
    <meta property="fb:app_id" content="" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?php echo isset($meta_title) ? htmlspecialchars($meta_title) : ''; ?>" />
    <meta name="twitter:description" content="<?php echo (isset($meta_description) && !empty($meta_description)) ? htmlspecialchars($meta_description) : ''; ?>" />
    <meta name="twitter:image" content="<?php echo (isset($meta_image) && !empty($meta_image)) ? $meta_image : base_url((isset($general['homepage_logo'])) ? $general['homepage_logo']  : ''); ?>" />
    <?php if(isset($home) && $home == 'detail_user'){ ?>
        <link rel="stylesheet" href="public/frontend/resources/library/css/bootstrap.min.css">
    <?php } ?>
    

    <link rel="stylesheet" href="public/frontend/cart.css">

    <?php /*echo view('frontend/homepage/common/style', $widget)*/ ?>
    <script type="text/javascript">
        var BASE_URL = '<?php echo BASE_URL; ?>';
        var SUFFIX = '<?php echo HTSUFFIX; ?>';
    </script>
    <?php echo $general['analytic_google_analytic'] ?>
    <?php echo $general['facebook_facebook_pixel'] ?>
    <?php echo view('frontend/homepage/common/head') ?>
    <style>
        :root{
            --color-primary: <?php echo $general['homepage_color'] ?> !important;
        }
    </style>
    <script src="public/frontend/resources/js/jquery-3.1.1.min.js"></script>
    <script src="public/frontend/resources/uikit/js/uikit.min.js"></script>
</head>

<body class="page-template-default page page-id-14 theme-wapo woocommerce-cart woocommerce-page woocommerce-js elementor-default elementor-kit-11">
    <?php echo view('frontend/homepage/common/header') ?>
    <div class="content-header cart-page bg-white pb0">
        <nav class="breadcrumbs" aria-label="Breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
            <div class="uk-container uk-container-center">
                <ol class="breadcrumb-list">
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="" title="VapeKinhBac Trang chủ" class="home">
                            <span itemprop="name"><i class="fa fa-home"></i> Trang chủ</span>
                        </a>
                        <meta itemprop="position" content="1" />
                    </li>
                    <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <i class="fa fa-chevron-right"></i>
                        <span itemprop="name" class="post post-page current-item">Thanh toán</span>
                        <meta itemprop="position" content="2" />
                    </li>
                </ol>
            </div>
        </nav>
    </div>
    <main id="site-content" class="flex-grow-1 pt50 pb50" role="main">
        <div class="uk-container uk-container-center ">
            <article class="post-15 page type-page status-publish hentry" id="post-15">
                <div class="post-inner">
                    <header class="entry-header header-group">
                        <div class="entry-header-inner"></div>
                    </header>
                        <script>
                            var cityid = '<?php echo (isset($_POST['cityid'])) ? $_POST['cityid'] : ((isset($member['cityid'])) ? $member['cityid'] : ''); ?>';
                            var districtid = '<?php echo (isset($_POST['districtid'])) ? $_POST['districtid'] : ((isset($member['districtid'])) ? $member['districtid'] : ''); ?>'
                            var wardid = '<?php echo (isset($_POST['wardid'])) ? $_POST['wardid'] : ((isset($member['wardid'])) ? $member['wardid'] : ''); ?>'
                        </script>
                            <div class="entry-content clearfix">
                                <div class="woocommerce">
                                    <div class="woocommerce-notices-wrapper"></div>
                                    <form name="checkout" method="post" class=" form form-cart checkout woocommerce-checkout p0" action="" enctype="multipart/form-data" >
                                        <div class="uk-grid uk-grid-large uk-clearfix">
                                            <div class="uk-width-1-1 uk-width-large-3-5 order2">
                                                <div id="customer_details">
                                                    <div>
                                                        <h4 class="mb20">Chi tiết thanh toán</h4>
                                                        <p class="note">Bạn phải nhập đầy đủ thông tin bên dưới nếu muốn nhận hàng nhanh chóng, chính xác nhất!</p>
                                                        <div class="woocommerce-billing-fields__field-wrapper">
                                                        <div class="box-body">
                                                            <?php echo  (!empty($validate) && isset($validate)) ? '<div class="alert alert-danger">'.$validate.'</div>'  : '' ?>
                                                        </div>
                                                            <p class="form-row form-row-wide validate-required" id="fullname_field">
                                                                <label for="fullname">Họ và tên&nbsp;<span class="required" title="required">*</span></label>
                                                                <span class="woocommerce-input-wrapper"><input require="" class="" type="text" class="input-text" name="fullname" id="fullname" placeholder="" value="<?php echo isset($member['fullname']) ? $member['fullname'] : '' ?>" autocomplete="given-name" /></span>
                                                            </p>
                                                            <p class="form-row form-row-wide validate-required validate-phone" id="phone_field">
                                                                <label for="phone">Số điện thoại&nbsp;<span class="required" title="required">*</span></label>
                                                                <span class="woocommerce-input-wrapper"><input require="" class="" type="tel" class="input-text" name="phone" id="phone" placeholder="" value="<?php echo isset($member['phone']) ? $member['phone'] : '' ?>" autocomplete="tel" /></span>
                                                            </p>
                                                            <p class="form-row form-row-wide validate-required validate-email" id="email_field">
                                                                <label for="email">Email&nbsp;<span class="required" title="required">*</span></label>
                                                                <span class="woocommerce-input-wrapper"><input  require="" class="" type="tel" class="input-text" name="email" id="email" placeholder="" value="<?php echo isset($member['email']) ? $member['email'] : '' ?>" autocomplete="tel" /></span>
                                                            </p>
                                                            <?php
                                                                $city = get_data(['select' => 'provinceid, name','table' => 'vn_province','order_by' => 'order desc, name asc']);
                                                                $city = convert_array([
                                                                    'data' => $city,
                                                                    'field' => 'provinceid',
                                                                    'value' => 'name',
                                                                    'text' => 'Thành Phố',
                                                                ]);
                                                            ?>
                                                            <p class="form-row form-row-wide validate-required" id="cityid_field">
                                                                <label for="address">Tỉnh/Thành phố</label>
                                                                <span class="woocommerce-input-wrapper"><?php echo form_dropdown('cityid', $city, set_value('cityid', (isset($member['cityid'])) ? $member['cityid'] : 0), 'class="form-control select2 m-b city"  id="city"');?></span>
                                                            </p>
                                                            <p class="form-row form-row-wide validate-required" id="address_field">
                                                                <label for="address">Địa chỉ&nbsp;<span class="required" title="required">*</span></label>
                                                                <span class="woocommerce-input-wrapper"><input class="" type="address" class="input-text" name="address" id="address" placeholder="" value="<?php echo isset($member['address']) ? $member['address'] : '' ?>"  /></span>
                                                            </p>
                                                            <p class="form-row notes" id="messages_field" data-priority="">
                                                                <label for="messages">Thông tin bổ sung&nbsp;</label>
                                                                <span class="woocommerce-input-wrapper">
                                                                    <textarea class="" name="messages" class="input-text" id="messages" placeholder="Bạn muốn giao hàng thế nào, ở đâu, mấy giờ..." cols="5" style="height: auto;"></textarea>
                                                                </span>
                                                            </p>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="uk-text-right" style="margin-top: 20px;">
                                                        <button type="submit" class="button alt wp-element-button" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Đặt hàng</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-width-1-1 uk-width-large-2-5 order1">
                                                <div class="wrap-cart-info">
                                                    <h4 id="order_review_heading">Đơn hàng của bạn</h4>
                                                <div id="order_review" class="woocommerce-checkout-review-order">
                                                    <?php if(isset($cart) && is_array($cart) && count($cart)) { ?>

                                                        <table class=" woocommerce-checkout-review-order-table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="product-name uk-text-left">Sản phẩm</th>
                                                                    <th class="product-total" style="width: 150px;">Tổng</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($cart as $key => $val) {?>
                                                                    <?php
                                                                        $image = (isset($val['detail']['image']) && !empty($val['detail']['image']) ? getthumb($val['detail']['image'], true) : 'public/frontend/resources/img/istockphoto-1075374570-612x612.jpg');
                                                                    ?>
                                                                    <tr class="cart_item mb10">
                                                                        <td class="product-name uk-text-left uk-flex">
                                                                            <?php echo render_a($val['detail']['canonical'].HTSUFFIX,$val['name'],'class="image img-cover"', '<img src="'.$image.'" class="lazyloading img-cover" alt="'.$val['detail']['title'].'">') ?>
                                                                            <div class="ml10 name-prd">
                                                                                <?php echo $val['name'] ?>
                                                                            </div>
                                                                        </td>
                                                                        <td class="product-total">
                                                                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                                                                <strong class="product-quantity"><?php echo $val['qty'] ?>&nbsp;×&nbsp;</strong>
                                                                                <span class="woocommerce-Price-amount amount">
                                                                                    <bdi><div class="price new_price" style="font-weight:bold;"><?php echo number_format(check_isset($val['detail']['price']), 0, ',', '.') ?>đ<span class="vnd_price"></span></div></div></bdi>
                                                                                </span>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr class="dash-table">
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" class="voucher-cart hidden">
                                                                        <div class="field ">
                                                                            <div class="field-input-btn-wrapper">
                                                                                <div class="field-input-wrapper">
                                                                                    <label class="field-label" for="code">Mã giảm giá</label>
                                                                                    <input type="hidden" value="<?php echo isset($voucher['price']) ? $voucher['price'] : '' ?>" class="voucher_price_hidden">
                                                                                    <input type="hidden" value="<?php echo isset($voucher['voucherid']) ? $voucher['voucherid'] : '' ?>" class="voucherid_hidden">
                                                                                    <input placeholder="Mã giảm giá" class="field-input discount_code" data-discount-field="true" autocomplete="off" autocapitalize="off" spellcheck="false" size="30" type="text" id="code" name="code" value="">
                                                                                </div>
                                                                                <button type="submit" class="field-input-btn btn btn-default btn-coupon__code">
                                                                                    <span class="btn-content">Sử dụng</span>
                                                                                    <i class="btn-spinner icon icon-button-spinner"></i>
                                                                                </button>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </td>
                                                                </tr>   
                                                                <tr class="dash-table hidden">
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr class="hidden">
                                                                    <td class="uk-text-left">
                                                                        Tạm tính
                                                                    </td>
                                                                    <td class="uk-text-right">
                                                                        <span class="woocommerce-Price-amount amount">
                                                                            <bdi class="value" id="total" data-price="<?php echo ($cartTotal + 0) ?>"><?php echo number_format($cartTotal,0,',','.') ?>đ<span class="vnd_price"></span></bdi>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="hidden">
                                                                    <td class="uk-text-left">
                                                                        Phí Ship
                                                                    </td>
                                                                    <td class="uk-text-right" id="total_shipping" data-price="0">0₫</td>
                                                                </tr>
                                                                <tr class="hidden">
                                                                    <td class="uk-text-left">
                                                                        Giảm giá
                                                                    </td>
                                                                    <td class="uk-text-right" id="total_discount" data-price="0">0₫</td>
                                                                </tr>
                                                                <?php 
                                                                    if(isset($member['rank_id'])) $memberRank = get_data(['select' => 'id, name, value','table' => 'member_rank','where' => ['id' => $member['rank_id']]]);
                                                                    $member_discount = (isset($memberRank[0]['value']) ? $memberRank[0]['value'] : 0); 
                                                                ?>
                                                                <?php 
                                                                    $minusMemberDiscount = ($cartTotal * $member_discount) / 100;
                                                                 ?>
                                                                <tr class="hidden">
                                                                    <td class="uk-text-left">
                                                                        Khách hàng thân thiết
                                                                    </td>
                                                                    <td class="uk-text-right" id="loyal_customers" data-percent="<?php echo $member_discount ?>"><?php echo $member_discount ?>% - <?php echo number_format($minusMemberDiscount, 0,',','.') ?>đ</td>
                                                                </tr>
                                                                <tr class="dash-table">
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr class="order-total" style="padding-top: 10px;">
                                                                    <th class="uk-text-left">Tổng tiền</th>
                                                                    <td>
                                                                        <strong>
                                                                            <span class="woocommerce-Price-amount amount">
                                                                                <bdi class="value" id="total_primary" data-price="<?php echo ($cartTotal - $minusMemberDiscount) ?>"><?php echo number_format($cartTotal - $minusMemberDiscount,0,',','.') ?>đ<span class="vnd_price"></span></bdi>
                                                                            </span>
                                                                        </strong>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    <?php } ?>
                                                    <div id="payment" class="woocommerce-checkout-payment mt20">
                                                        <div class="form-row place-order">
                                                            <div class="woocommerce-terms-and-conditions-wrapper">
                                                                <div class="woocommerce-privacy-policy-text">
                                                                    <p>
                                                                        Dữ liệu cá nhân của bạn sẽ được sử dụng để xử lý đơn đặt hàng, hỗ trợ trải nghiệm của bạn trên trang web này và cho các mục đích khác được mô tả trong chính sách bảo mật của chúng tôi.
                                                                        <a href="" class="woocommerce-privacy-policy-link" target="_blank">Chính sách bảo mật</a>.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    

                <div class="section-inner clearfix"></div>
            </article>
        </div>
    </main>
    <script>
        <?php echo isset($script) ? $script : '' ?>
    </script>
    <?php echo view('frontend/homepage/common/footer') ?>
    <?php echo view('frontend/homepage/common/script') ?>
    <?php echo view('frontend/homepage/common/offcanvas') ?>
    <?php echo view('backend/dashboard/common/notification') ?>
    <script src="public/frontend/resources/cart.js"></script>
    <script>

        $(document).on('change', '#city', function(e, data){
            let _this = $(this);
            let id = _this.val();
            let param = {
                'id' : id,
                'text' : '[Chọn Quận/Huyện]',
                'table' : 'vn_district',
                'trigger_district': (typeof(data) != 'undefined') ? true : false,
                'where' : {'provinceid' : id},
                'select' : 'districtid as id, name',
                'object' : '#district',
            };
            get_location(param);
        });

        if(typeof(cityid) != 'undefined' && cityid != ''){
            $('#city').val(cityid).trigger('change', [{'trigger':true}]);
        }

        $(document).on('change', '#district', function(){
            let _this = $(this);
            let id = _this.val();
            let param = {
                'id' : id,
                'text' : '[Chọn Phường/Xã]',
                'table' : 'vn_ward',
                'where' : {'districtid' : id},
                'select' : 'wardid as id, name',
                'object' : '#ward',
            };
            get_location(param);
        });

        $(document).on('change', '#section-payment-method input:radio.input-radio-method', function() {
            $('#section-payment-method .content-box-row.content-box-row-secondary').addClass('hidden');
            var id = $(this).attr('id');

            if(id) {
                var sub = $('body').find('.content-box-row.content-box-row-secondary[for=' + id + ']')
                    
                if(sub && sub.length > 0) {
                    $(sub).removeClass('hidden');
                }
            }
        });

        function get_location(param){
            if(districtid == '' || param.trigger_district == false) districtid = 0;
            if(wardid == ''  || param.trigger_ward == false) wardid = 0;

            let formURL = 'ajax/dashboard/get_location';
            $.post(formURL, {
                param: param},
                function(data){
                    let json = JSON.parse(data);
                    if(param.object == '#district'){
                        $(param.object).html(json.html).val(districtid).trigger('change');
                    }else if(param.object == '#ward'){
                        $(param.object).html(json.html).val(wardid);
                    }

                });
        }
    </script>
</body>

</html>