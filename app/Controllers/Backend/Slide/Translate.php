<?php

namespace App\Controllers\Backend\Slide;

use App\Controllers\BaseController;

class Translate extends BaseController
{
	protected $data;
	public function __construct()
	{
		$this->data = [];
		$this->data['module'] = 'slide';
	}

	public function translate($id = 0,  $language = 'vi')
	{
		$session = session();
		$flag = $this->authentication->check_permission([
			'routes' => 'backend/slide/translate/translate'
		]);
		if ($flag == false) {
			$session->setFlashdata('message-danger', 'Bạn không có quyền truy cập vào chức năng này!');
			return redirect()->to(BASE_URL . 'backend/dashboard/dashboard/index');
		}
		$this->data[$this->data['module'] . '_catalogue'] = $this->AutoloadModel->_get_where([
			'select' => 'tb1.id,tb1.keyword, tb2.title, tb2.description',
			'table'    => $this->data['module'] . '_catalogue as tb1',
			'join' => [
				[
					$this->data['module'] . '_catalogue_translate as tb2',
					'tb1.id = tb2.objectid AND tb2.language = \'' . $this->currentLanguage() . '\' ',
					'inner'
				],
			],
			'where'    => [
				'tb1.deleted_at' => 0,
				'tb1.id' => $id
			],
		]);

		if (!isset($this->data[$this->data['module'] . '_catalogue']) || is_array($this->data[$this->data['module'] . '_catalogue']) == false || count($this->data[$this->data['module'] . '_catalogue']) == 0) {
			$session->setFlashdata('message-danger', 'Slide không tồn tại');
			return redirect()->to(BASE_URL . 'backend/slide/slide/index');
		}
		$this->data[$this->data['module']] = $this->AutoloadModel->_get_where([
			'select' => 'id, image,  title, canonical, alt, description, content',
			'table'    => 'slide_translate',
			'where'    => [
				'catalogueid' => $id,
				'language' => $this->currentLanguage()
			],
		], true);

		$this->data[$this->data['module'] . '_catalogue_translate'] = $this->AutoloadModel->_get_where([
			'select' => 'tb1.id,tb1.keyword, tb2.title, tb2.description',
			'table'    => $this->data['module'] . '_catalogue as tb1',
			'join' => [
				[
					$this->data['module'] . '_catalogue_translate as tb2',
					'tb1.id = tb2.objectid AND tb2.language = \'' . $language . '\' ',
					'inner'
				],
			],
			'where'    => [
				'tb1.deleted_at' => 0,
				'tb1.id' => $id
			],
		]);

		$this->data[$this->data['module'] . '_translate'] = $this->AutoloadModel->_get_where([
			'select' => 'id, image,  title, canonical, alt, description, content, catalogueid',
			'table'    => 'slide_translate',
			'where'    => [
				'catalogueid' => $id,
				'language' => $language
			],
		], true);

		if ($this->request->getMethod() == 'post') {
			if (!isset($this->data[$this->data['module'] . '_catalogue_translate']) || !is_array($this->data[$this->data['module'] . '_catalogue_translate']) || count($this->data[$this->data['module'] . '_catalogue_translate']) == 0) {
				$insertLangCat =  $this->AutoloadModel->_insert([
					'table' => 'slide_catalogue_translate',
					'data'  => [
						'title' => $this->request->getPost('title_catalogue'),
						'description' => $this->request->getPost('description_catalogue'),
						'objectid' => $id,
						'language' => $language
					],
				]);
			} else {
				$updateLangCat =  $this->AutoloadModel->_update([
					'table' => 'slide_catalogue_translate',
					'data'  => [
						'title' => $this->request->getPost('title_catalogue'),
						'description' => $this->request->getPost('description_catalogue'),
					],
					'where' => [
						'objectid' => $id,
						'language' => $language
					]
				]);
			}

			$this->AutoloadModel->_delete([
				'table' => 'slide_translate',
				'where'  => [
					'catalogueid' => $id,
					'language' => $language,
				],
			]);

			$storeLang = $this->storeLanguage('create', $id, $language);
			$insert_batch_lang = $this->AutoloadModel->_create_batch([
				'table' => 'slide_translate',
				'data'  => $storeLang,
			]);

			$session->setFlashdata('message-success', 'Tạo bản dịch thành công! Hãy tạo danh mục tiếp theo.');
			return redirect()->to(BASE_URL . 'backend/slide/slide/index');
		}

		$this->data['template'] = 'backend/translate/translate/translateSlide';
		return view('backend/dashboard/layout/home', $this->data);
	}

	private function store($param = [])
	{
		helper(['text']);

		$album = $this->request->getPost('album');
		$store = [];
		if (isset($album) && is_array($album) && count($album)) {
			$count = 0;
			foreach ($album as $key => $value) {
				$store[$count] = [
					'image' => $value,
					'catalogueid' => $param['catalogueid'],
					'language' => $param['language']
				];
				if ($param['method'] == 'create' && isset($param['method'])) {
					$store[$count]['created_at'] = $this->currentTime;
					$store[$count]['userid_created'] = $this->auth['id'];
				} else {
					$store[$count]['updated_at'] = $this->currentTime;
					$store[$count]['userid_updated'] = $this->auth['id'];
				}
				$count++;
			}
		}
		return $store;
	}

	private function storeLanguage($method = "",  $catalogueid = 0, $language)
	{
		$album = $this->request->getPost('album');
		if (isset($album) && is_array($album) && count($album)) {
			foreach ($album as $key => $value) {
				$alt = $this->request->getPost('alt')[$key];
				$title = $this->request->getPost('title')[$key];
				$canonical = $this->request->getPost('canonical')[$key];
				$description = $this->request->getPost('description')[$key];
				$content = $this->request->getPost('content')[$key];
				$store[$key] = [
					'catalogueid' => $catalogueid,
					'image' => $value,
					'alt' => $alt,
					'language' => $language,
					'title' => $title,
					'canonical' => $canonical,
					'description' => $description,
					'content' => $content,
				];
				if ($method == 'create' && isset($method)) {
					$store[$key]['created_at'] = $this->currentTime;
					$store[$key]['userid_created'] = $this->auth['id'];
				} else {
					$store[$key]['updated_at'] = $this->currentTime;
					$store[$key]['userid_updated'] = $this->auth['id'];
				}
			}
		}

		return $store;
	}
}
