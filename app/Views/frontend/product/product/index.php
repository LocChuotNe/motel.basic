<?php
$model = new App\Models\AutoloadModel();
$productHot = $model->_get_where(array(
    'select' => 'tb1.id, tb1.viewed,  tb1.created_at ,tb1.productid, tb1.image,tb1.price,tb1.rate, tb1.price_promotion,  tb1.album, tb3.title, tb3.canonical, tb3.description, tb3.content',
    'table' => 'product as tb1',
    'where' => [
        'tb1.deleted_at' => 0,
        'tb1.publish' => 1,
        'tb1.hot' => 1,
    ],
    'join' => [
        [
            'object_relationship as tb2',
            'tb1.id = tb2.objectid AND tb2.module = "product" ',
            'inner'
        ],
        [
            'product_translate as tb3',
            'tb1.id = tb3.objectid AND tb3.module = "product" AND tb3.language = \'' . currentLanguage() . '\' ',
            'inner'
        ],
    ],
    'limit' => 3,
    'order_by' =>  'tb1.created_at desc',
    'group_by' => 'tb1.id'
), TRUE);
$criteria = get_slide(['keyword' => 'criteria', 'language' => $language]);
?>
<div class="style_04 layout-productDetail layout-pageProduct">
    <div class="breadcrumb-shop">
        <div class="container">
            <div class="breadcrumb-list">
                <ol class="breadcrumb breadcrumb-arrows" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a href="../index.htm" target="_self" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1" />
                    </li>

                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a href="../collections/hot-products.html" target="_self" itemprop="item">
                            <span itemprop="name">Sản phẩm nổi bật</span>
                        </a>
                        <meta itemprop="position" content="2" />
                    </li>

                    <li class="active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <span itemprop="item" content="https://www.yolover.com.vn/products/bot-ve-sinh-tre-hoa-vung-kin-hyacare-intimate">
                            <strong itemprop="name"><?php echo $object['title'] ?></strong>
                        </span>
                        <meta itemprop="position" content="3" />
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <!-- temp 04 -->
    <section class="productDetail-information productDetail_style__04">
        <div class="container container-pd0">
            <div class="productDetail--main">
                <div class="productDetail--gallery">
                    <div class="product-container-gallery stickyProduct-gallery">
                        <?php if (isset($object['album']) && is_array(($object['album']) && count($object['album']))) { ?>
                            <div class="wrapbox-gallery">
                                <div class="wrapbox-image">
                                    <div class="productGallery_slider">
                                        <div class="productList-slider productCarousel-slider owl-carousel" id="productCarousel-slider">
                                            <?php foreach ($object['album'] as $key => $val) { ?>
                                                <div class="product-gallery boxlazy-img" data-image="<?php echo $val ?>">
                                                    <div class="boxlazy-img__insert lazy-img__prod">
                                                        <span class="boxlazy-img__aspect">
                                                            <a class="product-gallery__item" data-fancybox="gallery" href="<?php echo $val ?>">
                                                                <img src="<?php echo $val ?>" alt="<?php echo $object['title'] ?>" />
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="productGallery_thumb">
                                        <div class="productList-thumb productCarousel-thumb owl-carousel" id="productCarousel-thumb">
                                            <?php foreach ($object['album'] as $key => $val) { ?>
                                                <div class="product-thumb" data-image="<?php echo $val ?>">
                                                    <div class="product-thumb__item boxlazy-img">
                                                        <div class="boxlazy-img__insert lazy-img__prod">
                                                            <span class="boxlazy-img__aspect">
                                                                <img src="<?php echo $val ?>" alt="<?php echo $object['title'] ?>" />
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-percent"></div>
                            </div>
                        <?php } ?>
                        <div class="wrapbox-detail"></div>
                    </div>
                </div>
                <div class="productDetail--content">
                    <div class="wrapbox-inner">
                        <div class="wrapbox-detail">
                            <div class="product-heading">
                                <h1><?php echo $object['title'] ?></h1>

                                <span class="pro-soldold">
                                    Tình trạng:

                                    <strong>Còn hàng</strong>
                                </span>
                                <span class="pro-vendor">
                                    Thương hiệu: <strong><a title="Show vendor" href=""><?php echo !empty($general['homepage_brand']) ? $general['homepage_brand'] : ''; ?></a></strong>
                                </span>
                            </div>
                            <div class="product-price" id="price-preview">
                                <span class="pro-title">Giá: </span>
                                <span class="pro-price"><?php echo (empty($object['price']) ? 'Liên hệ' : (!empty($object['price_promotion']) ? number_format(check_isset($object['price_promotion']), 0, ',', '.') . ' đ' : number_format(check_isset($object['price']), 0, ',', '.') . ' đ')) ?></span>
                            </div>
                            <div class="product-variants">
                                <form id="add-item-form" action="/cart/add" method="post" class="variants clearfix">
                                    <div class="select clearfix">
                                        <select id="product-select" name="id" style="display: none;">
                                            <option value="1109647496">Không màu / 150 ml - <?php echo (empty($val['price']) ? 'Liên hệ' : (!empty($val['price_promotion']) ? number_format(check_isset($val['price_promotion']), 0, ',', '.') . ' đ' : number_format(check_isset($val['price']), 0, ',', '.') . ' đ')) ?></option>
                                        </select>
                                    </div>
                                    <div class="select-swatch clearfix"></div>
                                </form>
                            </div>
                            <div class="product-app combo-info combo-info--horizontal mg-top d-none">
                                <h3 class="combo-info--title">THƯỜNG ĐƯỢC MUA CÙNG</h3>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($criteria) && is_array($criteria) && count($criteria)) { ?>
                        <div class="wrapbox-inner">
                            <div class="product-deliverly">
                                <div class="deliverly-inner">
                                    <div class="row m-0 infoList-deliverly">
                                        <?php foreach ($criteria as $key => $val) { ?>
                                            <div class="col-lg-4 col-md-6 col-12 deliverly-item">
                                                <span>
                                                    <img
                                                        class="lazyload"
                                                        data-src="<?php echo $val['image'] ?>"
                                                        alt="<?php echo $val['title'] ?>" />
                                                </span>
                                                <?php echo $val['title'] ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="productDetail--navs mg-top">
                    <div class="nav tab-title" id="nav-tab" role="tablist">
                        <a class="nav-item active" id="nav-home-tab" data-toggle="tab" href="#nav-desc" role="tab">Mô tả sản phẩm</a>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-desc" role="tabpanel">
                            <div class="product-description">
                                <div class="description-content expandable-toggle opened">
                                    <div class="description-productdetail">
                                        <?php echo $object['content'] ?>
                                    </div>
                                    <div class="description-btn">
                                        <button class="expandable-content_toggle js_expandable_content">
                                            <span class="expandable-content_toggle-icon"></span>
                                            <span class="expandable-content_toggle-text">Xem thêm nội dung</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-comment" role="tabpanel"></div>
                    </div>
                </div>
                <div class="productDetail--box mg-top">
                    <div class="product-question pro-pd">
                        <div class="card-tt">
                            <div class="box-title">
                                <h2>Câu hỏi thường gặp</h2>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="list-faqs">
                                <?php
                                if (isset($object['sub_title']) && isset($object['sub_content'])) {
                                    foreach ($object['sub_title'] as $index => $title) {
                                        if (isset($object['sub_content'][$index])) {
                                            $content = $object['sub_content'][$index];
                                            echo '<div class="faq-item">';
                                            echo '<div class="header-faqs">' . ($title) . '</div>';
                                            echo '<div class="content-faqs" style="display: none;">' . ($content) . '</div>';
                                            echo '</div>';
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related -->
    <?php if (isset($product_general) && is_array($product_general) && count($product_general)) { ?>
        <section class="productDetail-related">
            <div class="container container-pd0">
                <div class="productRelated-title">
                    <h2>Sản phẩm liên quan</h2>
                </div>

                <div class="productRelated-content">
                    <div class="listProduct-related listProduct-row owlCarousel-dfex owl-carousel owlCarousel-style" id="owlProduct-related">
                        <?php foreach ($product_general as $key => $val) { ?>
                            <?php $album = json_decode($val['album']) ?>
                            <div class="product-loop product-loop-slide" data-id="1109647402">
                                <div class="product-inner" data-proid="1048478950" id="listProdRelated_loop_2">
                                    <div class="proloop-image">
                                        <div class="product--image">
                                            <div class="lazy-img first-image">
                                                <picture>
                                                    <source data-srcset="<?php echo $album[0] ?>" />
                                                    <img
                                                        class="lazyload img-loop"
                                                        data-src="<?php echo $album[0] ?>"
                                                        alt="<?php echo $val['title'] ?>" />
                                                </picture>
                                            </div>
                                            <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                <picture>
                                                    <source data-srcset="<?php echo $album[1] ?>" />
                                                    <img
                                                        class="lazyload img-loop"
                                                        data-src="<?php echo $album[1] ?>"
                                                        alt="<?php echo $val['title'] ?>" />
                                                </picture>
                                            </div>
                                        </div>
                                        <a
                                            href="<?php echo $val['canonical'] ?>"
                                            class="proloop-link quickview-product"
                                            data-handle="<?php echo $val['canonical'] ?>"
                                            title="Gel dưỡng trẻ hóa vùng kín Hyacare Intimate"></a>
                                    </div>
                                    <div class="proloop-detail">
                                        <p class="proloop--vendor"><a title="Show vendor" href="<?php echo $val['canonical'] ?>"><?php echo !empty($general['homepage_brand']) ? $general['homepage_brand'] : ''; ?></a></p>
                                        <h3>
                                            <a href="<?php echo $val['canonical'] ?>" class="quickview-product" data-handle="<?php echo $val['canonical'] ?>">
                                                <?php echo $val['title'] ?>
                                            </a>
                                        </h3>

                                        <div class="wrapper-action-loop">
                                            <p class="proloop--price prices-ctas">
                                                <span class="price"><?php echo (empty($val['price']) ? 'Liên hệ' : (!empty($val['price_promotion']) ? number_format(check_isset($val['price_promotion']), 0, ',', '.') . ' đ' : number_format(check_isset($val['price']), 0, ',', '.') . ' đ')) ?></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</div>
<script>
    $(document).ready(function() {
        var expandable_content_height = $(".expandable-toggle .description-productdetail").height();
        if (expandable_content_height > 220) {
            $(".expandable-toggle .description-productdetail").css({
                height: "220px",
                overflow: "hidden",
            });
        } else {
            $(".expandable-content_toggle").addClass("d-none");
        }
    });
</script>
<script>
    $(document).ready(function() {

        var slider = $("#productCarousel-slider");
        var thumbnailSlider = $("#productCarousel-thumb");
        var duration = 500;

        slider.owlCarousel({
            items: 1,
            nav: true,
            dots: true,
            loop: false,
            smartSpeed: 1000,
            //touchDrag: false,
            //mouseDrag: false
        });
        slider.on("changed.owl.carousel", function(e) {
            thumbnailSlider.trigger("to.owl.carousel", [e.item.index, duration, true]);
            thumbnailSlider.find(".owl-item").removeClass("current");
            thumbnailSlider.find(".owl-item:nth-child(" + (e.item.index + 1) + ")").addClass("current");
        });
        thumbnailSlider.on("initialized.owl.carousel", function() {
            thumbnailSlider.find(".owl-item").eq(0).addClass("current");
        });
        thumbnailSlider.owlCarousel({
            loop: false,
            nav: false,
            margin: 15,
            center: false,
            responsive: {
                0: {
                    items: 5,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                },
                1200: {
                    items: 6,
                },
            },
        });
        thumbnailSlider.on("changed.owl.carousel", function(e) {
            slider.trigger("to.owl.carousel", [e.item.index, duration, true]);
            slider.find(".owl-item").removeClass("current");
            slider.find(".owl-item:nth-child(" + (e.item.index + 1) + ")").addClass("current");
        });
        thumbnailSlider.on("click", ".owl-item", function(e) {
            e.preventDefault();
            thumbnailSlider.find(".owl-item").removeClass("current");
            $(this).addClass("current");
            var number = $(this).index();
            slider.data("owl.carousel").to(number, duration, true);
        });
        $("body").scrollspy({
            target: "#productScroll-spy",
            offset: $(".productDetail-information").offset().top,
        });
        $('#productScroll-spy a[href*="#"]').click(function(e) {
            e.preventDefault();
            $("#productScroll-spy .product-thumb").removeClass("active");
            $("html, body").animate({
                    scrollTop: $($.attr(this, "href")).offset().top + 20,
                },
                500
            );
        });
        var sliderMobile = $("#productCarousel-slider-mobile");
        sliderMobile.owlCarousel({
            items: 1,
            nav: true,
            dots: true,
            lazyLoad: true,
            loop: false,
            smartSpeed: 1000,
        });

    });
    $("body").on("click", ".js_expandable_content", function(e) {
        if (!$(".expandable-toggle").hasClass("opened")) {
            $(".expandable-content_toggle").removeClass("btn-closemore").addClass("btn-viewmore").find(".expandable-content_toggle-text").html("Xem thêm nội dung");
            var curHeight = $(".expandable-toggle .description-productdetail").height();
            expandable_content_height = 220;
            $(".expandable-toggle .description-productdetail")
                .height(curHeight)
                .animate({
                        height: expandable_content_height,
                    },
                    300,
                    function() {
                        $(this).parent().addClass("opened");
                    }
                );
            var x = $(".product-description").offset().top;
            HRT.All.smoothScroll(x - 90, 250);
        } else {
            $(".expandable-toggle .description-productdetail").css("height", "auto");
            $(".expandable-toggle").removeClass("opened");
            $(".expandable-content_toggle").removeClass("btn-viewmore").addClass("btn-closemore").find(".expandable-content_toggle-text").html("Rút gọn nội dung");
        }
    });
    $(".js-btn-faq").click(function() {
        $(this).hide();
        $(".faq-item").removeClass("d-none");
    });

    $(".product-question .header-faqs").on("click", function() {
        if (!$(this).hasClass("opened")) {
            $(this).closest(".product-question").find(".header-faqs").removeClass("opened");
            $(this).closest(".product-question").find(".content-faqs").stop().slideUp("medium");
            $(this).toggleClass("opened").parent().find(".content-faqs").stop().slideToggle("medium");
        } else {
            $(this).toggleClass("opened").parent().find(".content-faqs").stop().slideToggle("medium");
        }
    });
    $(document).ready(function() {
        $('.product-gallery__item[data-fancybox="gallery"]').fancybox({
            protect: true,
            hash: false,
            buttons: ["slideShow", "zoom", "thumbs", "close"],
            animationEffect: "zoom",
            infobar: false,
        });
    });
</script>
<script src="public/frontend/200000743117/1001150740/14/jquery.fancybox.min.js?v=140" type="text/javascript"></script>