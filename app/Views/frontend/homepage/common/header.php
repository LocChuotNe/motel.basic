<?php
$currentDay = date('Y-m-d H:i:s');
$cart = \Config\Services::cart();
$cartTotal = $cart->contents();
$model = new App\Models\AutoloadModel();
$_ishome = isset($ishome) ? 'ishome' : '';
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
$languageList = $model->_get_where([
    'select' => 'id, title, canonical, image',
    'table' => 'language',
    'where' => [
        'deleted_at' => 0,
        'publish' => 1
    ],
    'order_by' => 'order desc, id desc'
], TRUE);
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
<header>
    <div class="brand">
        <h1 class="brand_name">
            <a href=""><span class="icon icon-md-reminder6"></span><em><?php echo !empty($general['homepage_company']) ? $general['homepage_company'] : ''; ?></em> Hotel</a>
        </h1>
    </div>
</header>
<script>
    $(document).ready(function() {
        if (window.location.pathname !== "/homepage") {
            $('.menu').addClass('bg-menu');
        }
    });

    function click_change_function(_this) {
        let lang = _this.attr('data-language');
        let canonical = _this.attr('data-canonical');
        setCookie('language', lang, 30)
        var formURL = 'ajax/frontend/dashboard/get_canonical';
        $.post(formURL, {
                lang: lang,
                canonical: canonical
            },
            function(data) {
                if (data.trim() == '') {
                    window.location.reload();
                } else {
                    window.location.href = data.trim();
                }
            });
    }

    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    $(document).ready(function() {
        var path = window.location.href;

        $('.menu-main li a').each(function() {
            if (this.href === path) {
                $(this).addClass('active');
            }
        });
    })
</script>