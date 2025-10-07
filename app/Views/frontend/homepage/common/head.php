<?php
$css = [
    ASSET_FRONTEND . 'template/css/grid.css',
    ASSET_FRONTEND . 'template/css/style.css',
    ASSET_FRONTEND . 'template/css/booking.css',
    ASSET_FRONTEND . 'template/css/jquery.fancybox.css',
    ASSET_FRONTEND . 'style.css',
    ASSET_FRONTEND . 'plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css',
    ASSET_FRONTEND . 'plugins/toastr/toastr.css',
];
?>
<?php foreach ($css as $key => $val) {
    echo '<link href="' . $val . '" rel="stylesheet">';
} ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

<script src="<?php echo ASSET_FRONTEND . 'template/js/jquery.js'; ?>"></script>
<script src="<?php echo ASSET_FRONTEND . 'template/js/jquery-migrate-1.2.1.js'; ?>"></script>
<script src="<?php echo ASSET_FRONTEND . 'template/js/device.min.js'; ?>"></script>