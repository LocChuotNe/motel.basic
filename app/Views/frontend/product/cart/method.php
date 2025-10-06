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
    <div class="content-header cart-page successfully pb0 bg-white">
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
                        <span itemprop="name" class="post post-page current-item">Đặt hàng thành công</span>
                        <meta itemprop="position" content="2" />
                    </li>
                </ol>
            </div>
        </nav>
    </div>
    <div id="cart-done-page" class="page-container bg-white">
        <div class="uk-container uk-container-center uk-text-center">
            <div class="cart-container">
                <div class="cart-information">
                    <div class="heading">Cảm ơn bạn <span style="color:#012196;"><?php echo $orderDetail['fullname'] ?></span> đã cho chúng tôi cơ hội phục vụ</div>
                    <div class="cart-order-code">Mã Số đơn hàng của bạn: <span style="color:#012196;"><?php echo $orderDetail['bill_id'] ?></span></div>
                    <div class="cart-order-description mb10">
                        Quý khách đã đặt hàng thành công!
                        Chúng tôi sẽ liên hệ với quý khách trong thời gian sớm nhất.
                        Cảm ơn quý khách đã sử dụng sản phẩm của chúng tôi. Xin cảm ơn!
                    </div>
                    <div class="cart-order-button"><a href="<?php echo BASE_URL; ?>" title="Tiếp tục mua hàng">Tiếp tục mua sắm</a></div>
                </div>
            </div>
        </div>
    </div>
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