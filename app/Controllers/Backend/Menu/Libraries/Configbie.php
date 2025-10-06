<?php

namespace App\Controllers\Backend\Menu\Libraries;

use App\Controllers\BaseController;

class ConfigBie
{

	function __construct($params = NULL)
	{
		$this->params = $params;
	}
	public function menu($language = 'vi')
	{
		if ($language == 'vi') {
			$data['article'] =  array(
				'title' => 'Bài viết',
				'translate' => true
			);
			$data['article_catalogue'] =  array(
				'title' => 'Chuyên mục bài viết',
				'translate' => true
			);
			$data['product'] =  array(
				'title' => 'Sản phẩm',
				'translate' => true
			);
			$data['product_catalogue'] =  array(
				'title' => 'Chuyên mục sản phẩm',
				'translate' => true
			);
			$data['media'] =  array(
				'title' => 'Media',
				'translate' => true
			);
			$data['media_catalogue'] =  array(
				'title' => 'Chuyên mục media',
				'translate' => true
			);
		}
		if ($language == 'en') {
			$data['article'] =  array(
				'title' => 'Blog',
				'translate' => true
			);
			$data['article_catalogue'] =  array(
				'title' => 'Blog Catalogue',
				'translate' => true
			);
			$data['product'] =  array(
				'title' => 'Products',
				'translate' => true
			);
			$data['product_catalogue'] =  array(
				'title' => 'Products Catalogue',
				'translate' => true
			);
			$data['media'] =  array(
				'title' => 'Media',
				'translate' => true
			);
			$data['media_catalogue'] =  array(
				'title' => 'Media Catalogue',
				'translate' => true
			);
		}
		if ($language == 'cn') {
			$data['article'] = array(
				'title' => '博客', // Blog
				'translate' => true
			);
			$data['article_catalogue'] = array(
				'title' => '博客目录', // Blog Catalogue
				'translate' => true
			);
			$data['product'] = array(
				'title' => '产品', // Products
				'translate' => true
			);
			$data['product_catalogue'] = array(
				'title' => '产品目录', // Products Catalogue
				'translate' => true
			);
			$data['media'] = array(
				'title' => '媒体', // Media
				'translate' => true
			);
			$data['media_catalogue'] = array(
				'title' => '媒体目录', // Media Catalogue
				'translate' => true
			);
		}
		return $data;
	}
}
