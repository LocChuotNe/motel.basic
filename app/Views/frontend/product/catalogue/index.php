<?php
$model = new App\Models\AutoloadModel();
$productCatalogue = $model->_get_where(array(
    'select' => 'tb1.id, tb1.level, tb2.title, tb2.canonical',
    'table' => 'product_catalogue as tb1',
    'where' => array(
        'tb1.publish' => 1,
        'tb1.deleted_at' => 0,
        'tb1.level' => 1
    ),
    'join' => [
        [
            'product_translate as tb2',
            'tb2.module = \'product_catalogue\' AND tb2.objectid = tb1.id AND tb2.language = \'' . currentLanguage() . '\'',
            'inner'
        ]
    ],
    'order_by' => 'tb1.order desc'
), TRUE);

foreach ($productCatalogue as &$category) {
    $category['children'] = $model->_get_where(array(
        'select' => 'tb1.id, tb1.parentid, tb1.level, tb2.title, tb2.canonical',
        'table' => 'product_catalogue as tb1',
        'where' => array(
            'tb1.publish' => 1,
            'tb1.deleted_at' => 0,
            'tb1.parentid' => $category['id']
        ),
        'join' => [
            [
                'product_translate as tb2',
                'tb2.module = \'product_catalogue\' AND tb2.objectid = tb1.id AND tb2.language = \'' . currentLanguage() . '\'',
                'inner'
            ]
        ],
        'order_by' => 'tb1.order desc'
    ), TRUE);
}
?>
<?php $main_nav = get_menu(array('keyword' => 'main-menu', 'language' => $language, 'output' => 'array')); ?>
<div class="layout-collections">
    <div class="breadcrumb-shop">
        <div class="container">
            <div class="breadcrumb-list">
                <ol class="breadcrumb breadcrumb-arrows" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a href="" target="_self" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1" />
                    </li>

                    <li class="active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <span itemprop="item" content="<?php echo $detailCatalogue['canonical'] ?>"><strong itemprop="name">Tất cả sản phẩm</strong></span>
                        <meta itemprop="position" content="2" />
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="wrapper-mainCollection">
        <div class="collection-listproduct" id="collection-body">
            <div class="wrapper-filter">
                <div class="wrapper_layered_filter">
                    <div class="layered_filter_parent">
                        <div class="layered_filter_container">
                            <div class="layered_filter_title">
                                <div class="title_filter">
                                    Danh mục sản phẩm
                                </div>
                                <button class="close_filter">
                                    <svg viewbox="0 0 19 19" role="presentation">
                                        <path
                                            d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                                            fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="layered_filter_group layered_filter_mobileContent" id="layered_filter_mobile">
                                <div class="filter_group" aria-expanded="false">
                                    <div class="group-menu filter_group_block">
                                        <div class="filter_group-subtitle">
                                            <span>Danh mục sản phẩm</span>
                                        </div>
                                        <div class="filter_group-content layered-category">
                                            <div class="layered-content">
                                                <?php if (isset($main_nav) && is_array($main_nav) && count($main_nav)) { ?>
                                                    <ul class="tree-menu">
                                                        <?php foreach ($main_nav['data'] as $key => $val) { ?>

                                                            <li class="tree-menu-lv1 active has-child menu-collap">
                                                                <a class="active" href="javascript:void(0)" title="<?php echo $val['title'] ?>" target="_self">
                                                                    <span class=""><?php echo $val['title'] ?></span>
                                                                    <?php if (isset($val['children']) && !empty($val['children'])) { ?>
                                                                        <span class="icon-control"><i class="fa fa-minus"></i></span>
                                                                    <?php } ?>
                                                                </a>
                                                                <?php if (isset($val['children']) && is_array($val['children']) && count($val['children'])) { ?>
                                                                    <ul class="tree-menu-sub">
                                                                        <?php foreach ($val['children'] as $keyChild => $valChild) { ?>
                                                                            <li>
                                                                                <span></span>
                                                                                <a href="<?php echo $valChild['canonical'] ?>" title="<?php echo $valChild['title'] ?>">
                                                                                    <?php echo $valChild['title'] ?>
                                                                                </a>
                                                                            </li>
                                                                        <?php } ?>
                                                                    </ul>
                                                                <?php } ?>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overlay-filter"></div>
            </div>
            <div class="wrapper-collection-header banner-header">
                <div class="d-flex flex-wrap">
                    <div class="collection-banner col-lg-12 col-12 pl-0 pr-0">
                        <img src="<?php echo $detailCatalogue['image'] ?>" alt="Products" />
                    </div>
                    <div class="collection-heading col-lg-12 col-12">
                        <h1>Tất cả sản phẩm</h1>
                    </div>
                </div>
            </div>

            <div class="wrapper-collection-hrvpmo hrvpmo-grids">
                <div class="container">
                    <div class="hrv-pmo-coupon" data-hrvpmo-layout="grids"></div>
                    <div class="hrv-pmo-discount" data-hrvpmo-layout="grids"></div>
                </div>
            </div>

            <div class="collection-content">
                <div class="collection-heading">
                    <div class="collection-heading__content">
                        <div class="line-collection-content">
                            <div class="container">
                                <div class="dFlex-row">
                                    <div class="heading-box">
                                        <div class="filter-box filter-sidebar">
                                            <p class="title-filter">
                                                <span>Dạnh mục sản phẩm</span>
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xmlns:svgjs="http://svgjs.com/svgjs"
                                                    width="512"
                                                    height="512"
                                                    x="0"
                                                    y="0"
                                                    viewbox="0 0 512 512"
                                                    style="enable-background: new 0 0 512 512;"
                                                    xml:space="preserve"
                                                    class="">
                                                    <g>
                                                        <path
                                                            d="m16 133.612h260.513c7.186 29.034 33.45 50.627 64.673 50.627s57.487-21.593 64.673-50.627h90.141c8.836 0 16-7.164 16-16s-7.164-16-16-16h-90.142c-7.185-29.034-33.449-50.628-64.673-50.628s-57.488 21.594-64.673 50.628h-260.512c-8.836 0-16 7.164-16 16s7.164 16 16 16zm325.186-50.628c19.094 0 34.628 15.534 34.628 34.627 0 19.094-15.534 34.628-34.628 34.628s-34.628-15.534-34.628-34.628c0-19.093 15.534-34.627 34.628-34.627zm-325.186 189.016h90.142c7.186 29.034 33.449 50.627 64.673 50.627s57.487-21.593 64.673-50.627h260.512c8.836 0 16-7.164 16-16s-7.164-16-16-16h-260.513c-7.186-29.034-33.449-50.628-64.673-50.628s-57.487 21.594-64.673 50.628h-90.141c-8.836 0-16 7.164-16 16s7.163 16 16 16zm154.814-50.628c19.094 0 34.628 15.534 34.628 34.628 0 19.093-15.534 34.627-34.628 34.627s-34.628-15.534-34.628-34.627c0-19.094 15.534-34.628 34.628-34.628zm325.186 157.016h-90.142c-7.186-29.034-33.449-50.628-64.673-50.628s-57.487 21.594-64.673 50.628h-260.512c-8.836 0-16 7.164-16 16s7.164 16 16 16h260.513c7.186 29.034 33.449 50.628 64.673 50.628s57.487-21.594 64.673-50.628h90.141c8.836 0 16-7.164 16-16s-7.163-16-16-16zm-154.814 50.628c-19.094 0-34.628-15.534-34.628-34.628s15.534-34.628 34.628-34.628 34.628 15.534 34.628 34.628-15.534 34.628-34.628 34.628z"
                                                            fill="#000000"
                                                            data-original="#000000"
                                                            class=""></path>
                                                    </g>
                                                </svg>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="collection-filter-tags">
                                <div class="heading-box">
                                    <div class="filter-box noBorder">
                                        <span class="title-count">
                                            <b>
                                                <?php echo count($productList) ?>
                                            </b>
                                            sản phẩm
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (isset($productList) && is_array($productList) && count($productList)) { ?>
                    <div class="container container-pd-parent">
                        <div class="collection-wraper">
                            <div class="wraplist-collection">
                                <div class="row listProduct-row listProduct-filter">
                                    <?php foreach ($productList as $key => $val) { ?>
                                        <?php $album = json_decode($val['album']) ?>
                                        <div class="col-lg-6 col-md-6 col-6 product-loop">
                                            <div class="product-inner" id="collection_loop_1">
                                                <div class="proloop-image">
                                                    <div class="product--image">
                                                        <div class="lazy-img first-image">
                                                            <picture>
                                                                <source
                                                                    data-srcset="<?php echo $album[0] ?>" />
                                                                <img
                                                                    class="lazyload img-loop"
                                                                    data-src="<?php echo  $album[0] ?>"
                                                                    alt="<?php echo  $val['title'] ?>" />
                                                            </picture>
                                                        </div>
                                                        <div class="lazy-img second-image hovered-img d-none d-lg-block">
                                                            <picture>
                                                                <source
                                                                    media="(min-width: 481px) and (max-width:767px)"
                                                                    data-srcset="<?php echo  $album[1] ?>" />

                                                                <img
                                                                    class="lazyload img-loop"
                                                                    data-src="<?php echo  $album[1] ?>"
                                                                    alt="<?php echo  $val['title'] ?>" />
                                                            </picture>
                                                        </div>
                                                    </div>

                                                    <a
                                                        href="<?php echo  $val['canonical'] ?>"
                                                        class="proloop-link quickview-product"
                                                        title="<?php echo  $val['title'] ?>"></a>
                                                </div>
                                                <div class="proloop-detail">
                                                    <p class="proloop--vendor"><a title="Show vendor" href=""><?php echo !empty($general['homepage_brand']) ? $general['homepage_brand'] : ''; ?></a></p>
                                                    <h3>
                                                        <a href="<?php echo  $val['canonical'] ?>" class="quickview-product">
                                                            <?php echo  $val['title'] ?>
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
                                <div class="collection-loadmore text-center"></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <input type="text" class="d-none" id="coll-handle" value="(collectionid:product>0)" />
</div>
<script>
    $('.filter-box.filter-sidebar').click(function() {
        $('body').addClass('open-filter');
    });
    $('.overlay-filter, .close_filter').click(function() {
        $('body').removeClass('open-filter');
    });
    $(document).on('click', '.tree-menu .tree-menu-lv1', function() {
        $this = $(this).find('.tree-menu-sub');
        $('.tree-menu .has-child .tree-menu-sub').not($this).slideUp('fast');
        $(this).find('.tree-menu-sub').slideToggle('fast');
        $(this).toggleClass('menu-collapsed');
        $(this).toggleClass('menu-uncollapsed');
        var $this1 = $(this);
        $('.tree-menu .has-child').not($this1).removeClass('menu-uncollapsed');
    });
</script>
<script>
    var productImg_size = 5;
    var has360 = false,
        hasVideo = false;

    function StickerAndPrice(obj, target) {
        var domLoop = $(target);
        var viewed_frame = [0, 0, 0, 0, 0];
        //Kiểm tra icon
        var viewed_frame_size = prmt_icon.frame.tag.length;
        //Sticker Frame
        for (var i = 0; i < viewed_frame_size; i++) {
            if (prmt_icon.frame.tag[i] != "null") {
                if (obj.tags.includes(prmt_icon.frame.tag[i])) {
                    viewed_frame[i] = 1;
                }
            }
        }
        $.each(viewed_frame, function(j, k) {
            if (k == 1) {
                domLoop.find(".proloop-image").append('<div class="sticker_frame"><a href="' + obj.url + '"><img class="lazyload" src="' + prmt_icon.frame.icon[j] + '" alt="sticker frame"/></a></div>');
                return false;
            }
        });
    }
    var ProductScript = {
        init: function() {
            var that = this;
            that.renderViewedProduct();
            that.expandableDescProduct();
            that.showModalSizeProduct();
            that.faqsProduct();
            that.fancyboxProduct();
        },
        renderViewedProduct: function() {
            if (jQuery(".productDetail-recently-viewed").length > 0) {
                var d = new Date();
                var n = d.getTime();
                var last_viewed_pro_date = localStorage.getItem("products_viewed_date");
                if (last_viewed_pro_date < n) {
                    localStorage.setItem("products_viewed_date", n + 30 * 86400000);
                    localStorage.removeItem("products_viewed");
                }
                var product_handle = "bot-ve-sinh-tre-hoa-vung-kin-hyacare-intimate";
                var last_viewed_pro = localStorage.getItem("products_viewed");
                var last_viewed_pro_new = "";
                if (last_viewed_pro == null) {
                    last_viewed_pro_new = product_handle;
                } else {
                    var list_array = last_viewed_pro.split("##"); //[]
                    if (!list_array.includes(product_handle)) {
                        last_viewed_pro_new = product_handle + "##" + last_viewed_pro;
                    } else {
                        last_viewed_pro_new = list_array.join("##");
                    }
                }

                var last_viewd_pro_array = last_viewed_pro_new.split("##");
                var handle_error;

                var limitpro = last_viewd_pro_array.length;
                if (last_viewd_pro_array.length > 8) limitpro = 8;
                var recentview_promises = [];
                var countValid = 0;
                for (var i = 0; i < limitpro; i++) {
                    if (countValid >= 8) return false;
                    if (typeof last_viewd_pro_array[i] == "string") {
                        countValid++;
                        var promise = new Promise(function(resolve, reject) {
                            $.ajax({
                                url: "/products/" + last_viewd_pro_array[i] + "?view=viewed",
                                success: function(product) {
                                    product = product.trim();
                                    resolve(product, countValid);
                                },
                                error: function(err) {
                                    resolve("", countValid);
                                },
                            });
                        });
                        recentview_promises.push(promise);
                    }
                }

                Promise.all(recentview_promises).then(function(values, countValid) {
                    var viewed_items = [];
                    $.each(values, function(i, v) {
                        if (v != "") {
                            v = v.replace("viewed-loop-", "viewed-loop-" + (i + 1));
                            $("#listViewed").append(v);
                            viewed_items.push(viewed);
                            countValid++;
                        } else {
                            viewed_items.push(null);
                        }
                    });
                    $.each(viewed_items, function(i, v) {
                        if (v != null) {
                            StickerAndPrice(v, "#viewed-loop-" + (i + 1));
                        }
                    });
                    HRT.Product.sliderProductRelated("#listViewed");
                });

                var filtered = last_viewd_pro_array.filter(function(el) {
                    return el != "";
                });
                localStorage.setItem("products_viewed", filtered.join("##"));
            }
        },
        expandableDescProduct: function() {
            var expandable_content_height = $(".expandable-toggle .description-productdetail").height();
            if (expandable_content_height > 220) {
                $(".expandable-toggle .description-productdetail").css({
                    height: "220px",
                    overflow: "hidden",
                });
            } else {
                $(".expandable-content_toggle").addClass("d-none");
            }
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
        },
        showModalSizeProduct: function() {
            $(".btn-size-guide").on("click", function(e) {
                e.preventDefault();
                $("#modal-sizeguide").modal("show");
            });
        },
        faqsProduct: function() {
            $(".js-btn-faq").click(function() {
                $(this).hide();
                $(".faq-item").removeClass("d-none");
            });
            $(".product-question .header-faqs").on("click", function() {
                if (!$(this).hasClass("opened")) {
                    jQuery(".product-question .header-faqs").removeClass("opened").parent().find(".content-faqs").stop().slideUp("medium");
                    jQuery(this).toggleClass("opened").parent().find(".content-faqs").stop().slideToggle("medium");
                } else {
                    jQuery(this).toggleClass("opened").parent().find(".content-faqs").stop().slideToggle("medium");
                }
            });
        },
        fancyboxProduct: function() {
            $('.product-gallery__item[data-fancybox="gallery"]').fancybox({
                protect: true,
                hash: false,
                buttons: ["slideShow", "zoom", "thumbs", "close"],
                animationEffect: "zoom",
                infobar: false,
            });
        },
    };
    $(document).ready(function() {
        if (pro_template == "style_01") {
            if (productImg_size > 1 || (productImg_size >= 1 && hasVideo) || (productImg_size == 0 && hasVideo) || (productImg_size >= 1 && has360) || (hasVideo && has360)) {
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
            }
        } else if (pro_template == "style_02") {
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
                //touchDrag: false,
                //mouseDrag: false
            });
        } else if (pro_template == "style_03") {
            if (productImg_size > 1 || (productImg_size >= 1 && hasVideo) || (productImg_size == 0 && hasVideo) || (productImg_size >= 1 && has360) || (hasVideo && has360)) {
                var slickSlider = $("#productSlick-slider");
                var thumbnailSlider = $("#productSlick-thumb");
                slickSlider.slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    fade: false,
                    infinite: false,
                    speed: 1000,
                    draggable: false,
                    swipe: false,
                    asNavFor: "#productSlick-thumb",
                    dots: false,
                    prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"></button>',
                    nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"></button>',
                });
                thumbnailSlider.slick({
                    slidesToShow: 6,
                    slidesToScroll: 1,
                    asNavFor: "#productSlick-slider",
                    dots: false,
                    arrows: false,
                    vertical: true,
                    verticalSwiping: true,
                    infinite: false,
                    focusOnSelect: true,
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 6,
                                slidesToScroll: 6,
                            },
                        },
                        {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 4,
                                vertical: false,
                            },
                        },
                    ],
                });
                $(document).on("click", "#productSlick-thumb .product-thumb__item", function(e) {
                    e.preventDefault();
                    $("#productSlick-thumb .product-thumb").removeClass("slick-current");
                    $(this).parent().addClass("slick-current");
                });
            }
        } else {
            if (productImg_size > 1 || (productImg_size >= 1 && hasVideo) || (productImg_size == 0 && hasVideo) || (productImg_size >= 1 && has360) || (hasVideo && has360)) {
                var slider = $("#productCarousel-slider");
                var thumbnailSlider = $("#productCarousel-thumb");
                var duration = 500;
                slider.owlCarousel({
                    items: 1,
                    nav: true,
                    dots: true,
                    loop: false,
                    smartSpeed: 1000,
                    //		touchDrag: false,
                    //		mouseDrag: false
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
            }
        }
    });
</script>