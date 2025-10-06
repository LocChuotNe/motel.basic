<?php 
$model = new App\Models\AutoloadModel();
$article = $model->_get_where([
    'select' => 'tb1.id, tb2.title, tb1.image, tb2.canonical',
    'where' => [
        'tb1.deleted_at' => 0,
        'tb1.publish' => 1,
        'tb1.catalogueid' => 39,
    ],
    'table' => 'article as tb1',
    'join' => [
        [
            'article_translate as tb2','tb2.module = "article" AND tb2.objectid = tb1.id AND tb2.language = \''.$language.'\'', 'inner'
        ]
    ],
    'limit' => 5,
    'group_by' => 'tb1.id',
    'order_by' => 'tb1.created_at desc'
], true);
 ?>
<div id="content" class="blog-wrapper blog-archive page-wrapper">
    <header class="archive-page-header">
        <div class="row">
            <div class="large-12 text-center col">
                <h1 class="page-title is-large uppercase">
                    <span><?php echo($detailCatalogue['title'])  ?></span>
                </h1>
            </div>
        </div>
    </header>

    <div class="row row-large">
        <?php if(isset($articleList ) && is_array($articleList) && count($articleList)) {?>

        <div class="large-9 col">
            <div class="row large-columns-1 medium-columns- small-columns-1 has-shadow row-box-shadow-1">
                <?php foreach($articleList as $key => $val) {?>
                <div class="col post-item">
                    <div class="col-inner">
                        <a href="<?php echo $val['canonical'] ?>" class="plain">
                            <div class="box box-vertical box-text-bottom box-blog-post has-hover">
                                <div class="box-image" style="width: 40%;">
                                    <div class="image-cover" style="padding-top: 56%;">
                                        <img
                                            width="399"
                                            height="400"
                                            src="<?php echo $val['image'] ?>"
                                            class="attachment-medium size-medium wp-post-image"
                                            alt=""
                                            decoding="async"
                                            loading="lazy"
                                        />
                                    </div>
                                </div>
                                <div class="box-text text-left">
                                    <div class="box-text-inner blog-post-inner">
                                        <h5 class="post-title is-large"><?php echo $val['title'] ?></h5>
                                        <div class="is-divider"></div>
                                        <p class="from_the_blog_excerpt">
                                            <?php echo base64_decode($val['description']) ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="badge absolute top post-date badge-square">
                                    <div class="badge-inner">
                                        <span class="post-date-day"><?php echo date('d', strtotime($val['created_at'])) ?></span><br />
                                        <span class="post-date-month is-xsmall">Th<?php echo intval(date('m', strtotime($val['created_at']))) ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php  }else{ ?>
        <div class="large-9 col">
            <section class="no-results not-found">
                <header class="page-title">
                    <h1 class="page-title">Nothing Found</h1>
                </header>

                <div class="page-content">
                    <p>It seems we can’t find what you’re looking for. Perhaps searching can help.</p>
                    <form method="get" class="searchform" action="/tim-kiem" role="search">
                        <div class="flex-row relative">
                            <div class="flex-col flex-grow">
                                <input type="text" class="search-field mb-0" name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>" placeholder="Tìm kiếm…" autocomplete="off" />
                            </div>
                            <div class="flex-col">
                                <button type="submit" class="ux-search-submit submit-button secondary button icon mb-0" aria-label="Submit">
                                    <i class="icon-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="live-search-results text-left z-top"><div class="autocomplete-suggestions" style="position: absolute; display: none; max-height: 300px; z-index: 9999;"></div></div>
                    </form>
                </div>
            </section>
        </div>
        <?php } ?>
        <?php if(isset($article ) && is_array($article) && count($article)) {?>
        <div class="post-sidebar large-3 col">
            <div id="secondary" class="widget-area" role="complementary">
                <aside id="flatsome_recent_posts-2" class="widget flatsome_recent_posts">
                    <span class="widget-title"><span>Tin Mới</span></span>
                    <div class="is-divider small"></div>
                    <ul>
                        <?php foreach($article as $key => $val) {?>
                        <li class="recent-blog-posts-li">
                            <div class="flex-row recent-blog-posts align-top pt-half pb-half">
                                <div class="flex-col mr-half">
                                    <div class="badge post-date badge-square">
                                        <div class="badge-inner bg-fill" style="background: url(<?php echo $val['image'] ?>); border: 0;"></div>
                                    </div>
                                </div>
                                <div class="flex-col flex-grow">
                                    <a href="<?php echo $val['image'] ?>" title="<?php echo $val['title'] ?>"><?php echo $val['title'] ?></a>
                                    <span class="post_comments op-7 block is-xsmall"><a href="<?php echo $val['image'] ?>#respond"></a></span>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                        
                    </ul>
                </aside>
            </div>
        </div>
        <?php } ?>
    </div>
</div>