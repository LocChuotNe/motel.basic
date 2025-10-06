<?php
helper('mydatafrontend');
// $widget['data'] = widget_frontend();

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
	<title><?php echo isset($meta_title) ? htmlspecialchars($meta_title) : ''; ?></title>
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

	<script type="text/javascript">
		var BASE_URL = '<?php echo BASE_URL; ?>';
		var SUFFIX = '<?php echo HTSUFFIX; ?>';
	</script>
	<?php echo $general['analytic_google_analytic'] ?>
	<?php echo $general['facebook_facebook_pixel'] ?>
	<?php echo view('frontend/homepage/common/head') ?>
	<style>
		:root {
			--color-primary: <?php echo $general['homepage_color'] ?> !important;
		}
	</style>
</head>

<body class="mainBody-theme template-product" itemscope="" itemtype="http://schema.org/Website">
	<div class="mainBody-theme-container mainBody-modalshow layoutProduct_scroll">
		<?php echo view('frontend/homepage/common/schema') ?>
		<?php echo view('frontend/homepage/common/header') ?>
		<?php echo view((isset($template)) ? $template : '') ?>
		<?php echo view('frontend/homepage/common/footer') ?>
		<div id="sitenav-overlay" class="sitenav-overlay"></div>
		<?php echo view('frontend/homepage/common/script') ?>
	</div>
	<?php echo view('frontend/homepage/common/widget') ?>
</body>

</html>