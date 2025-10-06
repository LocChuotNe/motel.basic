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
</head>

<body class="page-template-default page page-id-14 theme-wapo woocommerce-cart woocommerce-page woocommerce-js elementor-default elementor-kit-11">
    <?php echo view('frontend/homepage/common/header') ?>
    <div class="content-header cart-page pb0 bg-white">
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
                        <span itemprop="name" class="post post-page current-item">Giỏ hàng</span>
                        <meta itemprop="position" content="2" />
                    </li>
                </ol>
            </div>
        </nav>
    </div>
    <main id="site-content" class="flex-grow-1" role="main">
        <div class="uk-container uk-container-center">
            <article class="post-14 page type-page status-publish hentry bg-white pr10 pl10" id="post-14">
                <div class="post-inner">
                    <header class="entry-header header-group">
                        <div class="entry-header-inner"></div>
                    </header>
                    <div class="entry-content clearfix">
                        <div class="woocommerce">
                            <?php
                            $sum_price = 0;
                            ?>
                            <?php if (isset($cart) && is_array($cart) && count($cart)) { ?>
                                <form class="woocommerce-cart-form" action="" method="post">
                                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents " cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail" style="width: 150px;"><span class="screen-reader-text">Thumbnail image</span></th>
                                                <th class="product-name">Sản phẩm</th>
                                                <th class="product-price">Giá</th>
                                                <th class="product-quantity">Số lượng</th>
                                                <th class="product-subtotal">Tổng tiền</th>
                                                <th class="fc-cart-remove"><span class="screen-reader-text">Remove item</span></th>
                                            </tr>
                                        </thead>
                                        <tbody class="list-product-cart">
                                            <?php foreach ($cart as $key => $value) { ?>
                                                <?php
                                                    $image = (isset($value['detail']['image']) && !empty($value['detail']['image']) ? getthumb($value['detail']['image'], true) : 'public/frontend/resources/img/istockphoto-1075374570-612x612.jpg');
                                                ?>
                                                <tr class="woocommerce-cart-form__cart-item cart_item ">
                                                    <input type="hidden" name="rowid" class="productid_hidden" value="<?php echo $key ?>">
                                                    <td class="product-thumbnail">
                                                        <?php echo render_a($value['detail']['canonical'] . HTSUFFIX, $value['name'], 'class="image img-cover"', '<img src="'.$image.'" class="lazyloading img-cover" alt="'.$value['detail']['title'].'">') ?>
                                                    </td>

                                                    <td class="product-name" data-title="Product">
                                                        <?php echo render_a($value['detail']['canonical'] . HTSUFFIX, $value['name'], '', $value['name']) ?>
                                                    </td>

                                                    <td class="product-price" data-title="Price">
                                                        <div class="price price_view mb5"><?php echo number_format(check_isset($value['price']), 0, ',', '.') ?>đ<span class="vnd_price"></span></div>
                                                    </td>

                                                    <td class="product-quantity" data-title="Quantity">
                                                        <div class="uk-flex uk-flex-center">
                                                            <button class="btn_num num_1 button button_qty button_quantity_cart" onclick="var result = document.getElementById('<?php echo $value['rowid'] ?>'); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro > 1 ) result.value--;return false;" type="button">
                                                                <i class="fa fa-minus-circle"></i>
                                                            </button>
                                                            <input type="text" id="<?php echo $value['rowid'] ?>" name="quantity" value="<?php echo $value['qty'] ?>" maxlength="3" class="form-control prd_quantity input-quantity" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onchange="if(this.value == 0)this.value=1;">
                                                            <button class="btn_num num_2 button button_qty button_quantity_cart" onclick="var result = document.getElementById('<?php echo $value['rowid'] ?>'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;" type="button">
                                                                <i class="fa fa-plus-circle"></i>
                                                            </button>
                                                        </div>
                                                    </td>

                                                    <td class="product-subtotal" data-title="Subtotal"> 
                                                        <div class="price new_price mt5" style="font-weight:bold;">
                                                            <?php echo number_format(cal_quantity(check_isset($value['price']), $value['qty']), 0, ',', '.') ?>đ
                                                            <span class="vnd_price"></span>
                                                        </div>
                                                    </td>
                                                    <td class="cart-remove">
                                                        <a href="" class="remove" aria-label="Remove this item" data-product_id="13084" data-product_sku="">×</a>
                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                </form>
                                <div class="cart-collaterals">
                                    <div class="cart_totals">
                                        <h4 class="mb-4">Tổng số giỏ hàng</h4>
                                        <table cellspacing="0" class="shop_table shop_table_responsive">
                                            <tbody>
                                                <tr class="order-total">
                                                    <th>Tổng cộng</th>
                                                    <td data-title="Total">
                                                        <strong>
                                                            <span class="woocommerce-Price-amount amount">
                                                                <bdi class="value" id="total" data-price="<?php echo ($cartTotal + 0) ?>"><?php echo number_format($cartTotal, 0, ',', '.') ?><span class="vnd_price">đ</span></bdi>
                                                            </span>
                                                        </strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="wc-proceed-to-checkout">
                                            <a href="dat-hang" class="checkout-button button alt wc-forward wp-element-button"> Thanh toán</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="woocommerce-notices-wrapper"></div>
                                <p class="cart-empty woocommerce-info">Giỏ hàng của bạn hiện tại đang trống</p>
                                <p class="return-to-shop">
                                    <a class="button wc-backward wp-element-button" href=""> Quay về cửa hàng </a>
                                </p>
                            <?php } ?>
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
    <script src="public/frontend/cart.js"></script>
</body>

</html>