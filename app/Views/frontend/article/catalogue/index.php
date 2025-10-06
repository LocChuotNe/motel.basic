<?php $main_nav = get_menu(array('keyword' => 'main-menu', 'language' => $language, 'output' => 'array')); ?>
<div class="layout-blogs">
    <div class="breadcrumb-shop">
        <div class="container">
            <div class="breadcrumb-list">
                <ol class="breadcrumb breadcrumb-arrows" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a href="../index.htm" target="_self" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1" />
                    </li>

                    <li class="active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <span itemprop="item" content="<?php echo $detailCatalogue['canonical'] ?>"><strong itemprop="name"><?php echo $detailCatalogue['title'] ?></strong></span>
                        <meta itemprop="position" content="2" />
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="wrapper-contentBlogs">
        <div class="container pd-top">
            <div class="row banner-blog">
                <img src="<?php echo $detailCatalogue['image'] ?>" />
            </div>
            <div class="row dFlex-row">
                <div class="col-lg-9 col-md-12 col-12 boxBlog-left">
                    <div class="listBlogs-content">
                        <div class="heading-page">
                            <h1><?php echo $detailCatalogue['title'] ?></h1>
                        </div>
                        <?php if (isset($articleList) && is_array($articleList) && count($articleList)) { ?>
                            <div class="list-article-content blog-posts row">
                                <!-- Begin: Nội dung blog -->
                                <?php foreach ($articleList as $key => $val) { ?>
                                    <article class="article-loop col-md-6 col-6">
                                        <div class="article-inner">
                                            <div class="article-image">
                                                <a href="<?php echo $val['canonical'] ?>" class="blog-post-thumbnail" title="<?php echo $val['title'] ?>" rel="nofollow">
                                                    <img
                                                        class="lazyloaded"
                                                        data-src="<?php echo $val['image'] ?>"
                                                        src="<?php echo $val['image'] ?>"
                                                        alt="<?php echo $val['title'] ?>" />
                                                </a>
                                            </div>
                                            <div class="article-detail">
                                                <div class="article-title">
                                                    <h3 class="post-title">
                                                        <a href="<?php echo $val['canonical'] ?>" title="<?php echo $val['title'] ?>"><?php echo $val['title'] ?></a>
                                                    </h3>
                                                </div>

                                                <div class="entry-content"><?php echo base64_decode($val['description']) ?></div>

                                                <div class="article-post-meta">
                                                    <span class="date">
                                                        <time pubdate="" datetime="<?php echo date('Y-m-d', strtotime($val['created_at'])); ?>"><?php echo date('d', strtotime($val['created_at'])) . ' Tháng ' . (int)date('m', strtotime($val['created_at'])) . ', ' . date('Y', strtotime($val['created_at'])); ?></time>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <div id="pagination" class="pagination mb30">
                            <?php echo (isset($pagination)) ? $pagination : ''; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-12 boxBlog-right">
                    <aside class="sidebar-blogs blogs-aside--sticky">
                        <!-- Bai viet moi nhat -->
                        <div class="group-sidebox">
                            <div class="sidebox-title">
                                <h3 class="htitle">Bài viêt mới nhất</h3>
                            </div>
                            <?php if (isset($articleList) && is_array($articleList) && count($articleList)) { ?>
                                <div class="sidebox-content sidebox-content-togged">
                                    <div class="list-blogs-latest">
                                        <?php foreach ($articleList as $key => $val) { ?>
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