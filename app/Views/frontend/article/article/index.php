<?php $main_nav = get_menu(array('keyword' => 'main-menu', 'language' => $language, 'output' => 'array')); ?>
<div class="layout-article" id="article">
    <div class="breadcrumb-shop">
        <div class="container">
            <div class="breadcrumb-list blog-breadcrumb ">
                <ol class="breadcrumb breadcrumb-arrows" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a href="../../index.htm" target="_self" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1">
                    </li>
                    <?php if (isset($breadcrumb) && is_array($breadcrumb) && count($breadcrumb)) { ?>
                        <?php foreach ($breadcrumb as $key => $val) { ?>
                            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                                <a href="<?php echo $val['canonical'] ?>" itemprop="item">
                                    <span itemprop="name"><?php echo $val['title'] ?></span>
                                </a>
                                <meta itemprop="position" content="<?php echo $key + 2 ?>">
                            </li>
                        <?php } ?>
                    <?php } ?>
                    <li class="active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <span itemprop="item" content="https://www.yolover.com.vn/blogs/cham-soc-vung-eva/quan-he-nhieu-co-bi-tham-co-be-khong"><strong itemprop="name"><?php echo $object['title'] ?></strong></span>
                        <meta itemprop="position" content="3">
                    </li>

                </ol>
            </div>
        </div>
        <div class="wrapper-contentArticle">
            <div class="container pd-top">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-12 boxAricle-left">
                        <div class="inforArticle-content">
                            <div class="boxArticle-detail">
                                <div class="heading-article">
                                    <h1><?php echo $object['title'] ?></h1>
                                    <div class="article-post-meta">
                                        <!--<span class="author">bởi: nguyettransg@gmail.com</span>-->
                                        <span class="date">
                                            <time pubdate="" datetime="<?php echo date('d', strtotime($object['created_at'])) . ' Tháng ' . (int)date('m', strtotime($object['created_at'])) . ', ' . date('Y', strtotime($object['created_at'])); ?>"><?php echo date('d', strtotime($object['created_at'])) . ' Tháng ' . (int)date('m', strtotime($object['created_at'])) . ', ' . date('Y', strtotime($object['created_at'])); ?></time>
                                        </span>

                                    </div>
                                </div>
                                <div class="article-content">
                                    <div class="box-article-heading clearfix">


                                        <div class="background-img">
                                            <img src="<?php echo $object['image'] ?>" alt="<?php echo $object['title'] ?>">
                                        </div>
                                    </div>
                                    <div class="box-article-detail article-body article-table-contents typeList-style">
                                        <?php echo $object['content'] ?>
                                    </div>

                                    <div class="box-article-navigation post-navigation articleToolbar ">
                                        <div class="flex-row-articleToolbar">
                                            <div class="articleToolbar-title col-lg-8 col-md-12 col-12">
                                                <p>Đang xem:<span> <?php echo $object['title'] ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="article-related">
                                <h3 class="title-blog-related">
                                    <span>
                                        Bài viết liên quan </span>
                                </h3>
                                <?php if (isset($articleRelate) && is_array($articleRelate) && count($articleRelate)) { ?>
                                    <div class="content-blogs-related">
                                        <div class="list-blogs-related list-article-content owl-carousel owlCarousel-style owlCarousel-dfex owl-loaded">
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all; width: 2670px;">
                                                    <?php foreach ($articleRelate as $key => $val) { ?>
                                                        <div class="owl-item active" style="width: 415px; margin-right: 30px;">
                                                            <article class="article-loop">
                                                                <div class="article-inner">
                                                                    <div class="article-image">
                                                                        <a href="<?php echo $val['canonical'] ?>" class="blog-post-thumbnail" title="<?php echo $object['title'] ?>" rel="nofollow">
                                                                            <img class="lazyload" data-src="<?php echo $val['image'] ?>" alt="<?php echo $object['title'] ?>">
                                                                        </a>
                                                                    </div>
                                                                    <div class="article-detail">
                                                                        <div class="article-title">
                                                                            <h3 class="post-title">
                                                                                <a href="<?php echo $val['canonical'] ?>" title="<?php echo $object['title'] ?>"><?php echo $object['title'] ?></a>
                                                                            </h3>
                                                                        </div>

                                                                        <div class="entry-content"><?php echo base64_decode($val['description']) ?></div>

                                                                        <div class="article-post-meta">
                                                                            <span class="date">
                                                                                <time pubdate="" datetime="<?php echo date('d', strtotime($object['created_at'])) . ' Tháng ' . (int)date('m', strtotime($object['created_at'])) . ', ' . date('Y', strtotime($object['created_at'])); ?>"><?php echo date('d', strtotime($object['created_at'])) . ' Tháng ' . (int)date('m', strtotime($object['created_at'])) . ', ' . date('Y', strtotime($object['created_at'])); ?></time>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                                            <div class="owl-dots disabled"></div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-12 boxAricle-right">
                        <aside class="sidebar-blogs blogs-aside--sticky">
                            <!-- Bai viet moi nhat -->
                            <div class="group-sidebox">
                                <div class="sidebox-title ">
                                    <h3 class="htitle">Bài viêt mới nhất</h3>
                                </div>
                                <?php if (isset($articleNew) && is_array($articleNew) && count($articleNew)) { ?>
                                    <div class="sidebox-content sidebox-content-togged">
                                        <div class="list-blogs-latest">
                                            <?php foreach ($articleNew as $key => $val) { ?>
                                                <div class="item-article clearfix">
                                                    <div class="post-image">
                                                        <a href="<?php echo $val['canonical'] ?>">
                                                            <img
                                                                class="lazyloaded"
                                                                data-src="<?php echo $val['image'] ?>"
                                                                src="<?php echo $val['image'] ?>"
                                                                alt="<?php echo $val['title'] ?>" />
                                                        </a>
                                                    </div>
                                                    <div class="post-content">
                                                        <h3><a href="<?php echo $val['canonical'] ?>"><?php echo $val['title'] ?></a></h3>
                                                        <p class="post-meta">
                                                            <span class="cate"><?php echo $detailCatalogue['title'] ?></span>
                                                            <span class="date">- <?php echo date('d', strtotime($val['created_at'])) . ' Tháng ' . (int)date('m', strtotime($val['created_at'])) . ', ' . date('Y', strtotime($val['created_at'])); ?></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <!-- Menu bai viet -->

                            <div class="group-sidebox">
                                <div class="sidebox-title ">
                                    <h3 class="htitle">Danh mục bài viết</h3>
                                </div>
                                <?php if (isset($main_nav) && is_array($main_nav) && count($main_nav)) { ?>
                                    <div class="sidebox-content sidebox-content-togged">
                                        <ul class="menuList-links">
                                            <?php foreach ($main_nav['data'] as $key => $val) { ?>

                                                <li class="has-submenu level0 ">
                                                    <a href="<?php echo $val['canonical'] ?>" title="<?php echo $val['title'] ?>"><?php echo $val['title'] ?><?php if (isset($val['children']) && !empty($val['children'])) { ?> <span class="icon-plus-submenu plus-nClick1"></span> <?php } ?></a>
                                                    <?php if (isset($val['children']) && is_array($val['children']) && count($val['children'])) { ?>
                                                        <ul class="submenu-links">
                                                            <?php foreach ($val['children'] as $keyChild => $valChild) { ?>
                                                                <li><a href="<?php echo $valChild['canonical'] ?>" title="<?php echo $valChild['title'] ?>"><?php echo $valChild['title'] ?></a></li>
                                                            <?php } ?>
                                                        </ul>
                                                    <?php } ?>
                                                </li>
                                            <?php } ?>

                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>

                        </aside>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function() {
        $('.list-blogs-related.owl-carousel').owlCarousel({
            items: 3,
            nav: true,
            dots: false,
            loop: false,
            margin: 30,
            smartSpeed: 1200,
            autoplayTimeout: 1500,
            responsive: {
                0: {
                    items: 2,
                    margin: 0,
                    stagePadding: 30
                },
                768: {
                    items: 3,
                    margin: 15
                },
                992: {
                    items: 3,
                    margin: 15
                },
                1200: {
                    items: 3,
                    touchDrag: $('.list-blogs-related.owl-carousel').length > 3 ? true : false,
                    mouseDrag: $('.list-blogs-related.owl-carousel').length > 3 ? true : false
                }
            }
        });
    });
</script>