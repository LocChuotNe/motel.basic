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
                'product_translate as tb2', 'tb2.module = \'product_catalogue\' AND tb2.objectid = tb1.id AND tb2.language = \''.currentLanguage().'\'', 'inner'
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
                    'product_translate as tb2', 'tb2.module = \'product_catalogue\' AND tb2.objectid = tb1.id AND tb2.language = \''.currentLanguage().'\'', 'inner'
                ]
            ],
            'order_by' => 'tb1.order desc'
        ), TRUE);
    }
?>
<?php $main_nav = get_menu(array('keyword' => 'main-menu','language' => $language, 'output' => 'array')); ?>
<?php $menu_product = get_menu(array('keyword' => 'menu-product','language' => $language, 'output' => 'array')); ?>
<div id="offcanvas" class="uk-offcanvas offcanvas">
    <div class="uk-offcanvas-bar">
        <form class="uk-search" action="/tim-kiem" data-uk-search="{}">
            <input class="uk-search-field" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>" type="search" name="keyword" placeholder="Tìm kiếm...">
        </form>
        <?php if(isset($menu_product['data']) && is_array($menu_product['data']) && count($menu_product['data'])) { ?>
            <ul class="l1 uk-nav uk-nav-offcanvas uk-nav uk-nav-parent-icon" data-uk-nav="">
                <li>
                    <a href="gio-hang" title="Giỏ hàng" class="l1">Giỏ hàng</a>
                </li>
                <?php foreach($menu_product['data'] as $key => $val) {?>
                    <li class="l1 uk-parent uk-position-relative">
                        <a href="#" title="" class="dropicon"></a>
                        <a href="<?php echo $val['canonical'] ?>" title="<?php echo $val['title'] ?>" class="l1"><?php echo $val['title'] ?></a>
                        <?php if(isset($val['children']) && is_array($val['children']) && count($val['children'])) {?>
                            <ul class="l2 uk-nav-sub">
                                <?php foreach($val['children'] as $keyChild => $valChild) {?>
                                    <li class="l2">
                                        <a href="<?php echo $valChild['canonical'] ?>" title="<?php echo $valChild['title'] ?>" class="l2"><?php echo $valChild['title'] ?></a>
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
