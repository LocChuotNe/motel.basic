<?php
  $model = new App\Models\AutoloadModel();
  $about = $model->_get_where([
    'select' => 'tb2.title, tb1.image, tb2.canonical, tb2.description, tb2.content',
    'where' => [
        'tb1.deleted_at' => 0,
        'tb1.publish' => 1,
        'tb1.id' => 1,
    ],
    'table' => 'article as tb1',
    'join' => [
        [
            'article_translate as tb2','tb2.module = "article" AND tb2.objectid = tb1.id AND tb2.language = \''.$language.'\'', 'inner'
        ]
    ],
], true);
?>
<?php if(isset($about) && is_array($about) && count($about)) {?>
    <?php $aboutus = $about[0] ? $about[0] : ''  ?>
    <section id="body">
      <div id="article-page" class="page-body">
        <section class="main-slide breadcrumb-rl mb20">
          <div class="breadcrumb">
            <div class="uk-container uk-container-center">
              <h1 class="main-title"><?php echo $aboutus['title'] ?></h1>
              <ul class="uk-breadcrumb">
                <li>
                  <a href="" title="">
                    <i class="fa fa-home"></i> Trang chủ </a>
                </li>
                <li>
                  <a href="<?php echo $aboutus['canonical'] ?>" title="<?php echo $aboutus['title'] ?>"><?php echo $aboutus['title'] ?></a>
                </li>
              </ul>
            </div>
          </div>
        </section>
        <div class="uk-container uk-container-center">
          <section class="art-detail detail-content">
            <div class="art-title uk-text-bold mb15">
              <span style="font-size:22px;text-transform:uppercase;"><?php echo $aboutus['title'] ?></span>
            </div>
            <section class="panel-body">
              <div class="description">
                <?php echo base64_decode($aboutus['description']) ?>
              </div>
              <article class="article">
                <?php echo base64_decode($aboutus['content']) ?>
              </article>
            </section>
            <script type="text/javascript">
              $(document).ready(function() {
                $('.detail-content a').each(function(index, element) {
                  $(element).attr('target', '_blank')
                });
              });
            </script>
            <footer class="panel-foot">
              <div class="share-box uk-flex uk-flex-middle">
                <div class="facebook">
                  <div class="fb-like" data-href="<?php echo $aboutus['canonical'] ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                </div>
                <div class="plus">
                  <div class="g-plusone" data-size="medium" data-href="<?php echo $aboutus['canonical'] ?>"></div>
                </div>
              </div>
              <div class="comment">
                <div class="fb-comments" data-href="<?php echo $aboutus['canonical'] ?>" data-width="100%" data-numposts="3"></div>
              </div>
            </footer>
          </section>
        </div>
      </div>
    </section>
<?php } ?>