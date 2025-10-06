<?php

namespace App\Controllers\Backend\Slide;

use App\Controllers\BaseController;


class Slide extends BaseController
{
	protected $data;
	public function __construct()
	{
		$this->data = [];
		$this->data['module'] = 'slide';
	}
	public function index($page = 1)
	{
		helper(['mypagination']);
		$session = session();
		$flag = $this->authentication->check_permission([
			'routes' => 'backend/slide/slide/index'
		]);
		if ($flag == false) {
			$session->setFlashdata('message-danger', 'Bạn không có quyền truy cập vào chức năng này!');
			return redirect()->to(BASE_URL . 'backend/dashboard/dashboard/index');
		}
		$page = (int)$page;
		$perpage = ($this->request->getGet('perpage')) ? $this->request->getGet('perpage') : 20;
		$where = $this->condition_where();
		$keyword = $this->condition_keyword();
		$config['total_rows'] = $this->AutoloadModel->_get_where([
			'select'   => 'tb1.id',
			'table'    => 'slide_catalogue as tb1',
			'join' => [
				[
					'slide_catalogue_translate as tb2',
					'tb1.id = tb2.objectid AND tb2.language = \'' . $this->currentLanguage() . '\' ',
					'inner'
				],
			],
			'keyword'  => $keyword,
			'where'    => $where,
			'group_by' => 'tb1.id',
			'count'    => TRUE
		]);
		if ($config['total_rows'] > 0) {
			$config = pagination_config_bt(['url' => 'backend/slide/slide/index', 'perpage' => $perpage], $config);
			$this->pagination->initialize($config);
			$this->data['pagination'] = $this->pagination->create_links();
			$totalPage = ceil($config['total_rows'] / $config['per_page']);
			$page = ($page <= 0) ? 1 : $page;
			$page = ($page > $totalPage) ? $totalPage : $page;
			$page = $page - 1;
			$languageDetact = $this->detect_language();
			$this->data['slideList'] = $this->AutoloadModel->_get_where([
				'select' => 'tb1.id,tb1.keyword, tb2.title,  tb1.userid_created, tb1.publish, tb1.userid_updated, tb1.created_at, tb1.updated_at,' . ((isset($languageDetact['select'])) ? $languageDetact['select'] : ''),
				'table'    => 'slide_catalogue as tb1',
				'join' => [
					[
						'slide_catalogue_translate as tb2',
						'tb1.id = tb2.objectid AND tb2.language = \'' . $this->currentLanguage() . '\' ',
						'inner'
					],
				],
				'where'    => $where,
				'keyword'  => $keyword,
				'limit'    => $config['per_page'],
				'start'    => $page * $config['per_page'],
				'order_by' => 'tb1.id desc',
				'group_by' => 'tb1.id'
			], TRUE);
		}
		$this->data['template'] = 'backend/slide/slide/index';
		return view('backend/dashboard/layout/home', $this->data);
	}
	public function create()
	{
		$session = session();
		$flag = $this->authentication->check_permission([
			'routes' => 'backend/slide/slide/create'
		]);
		if ($flag == false) {
			$session->setFlashdata('message-danger', 'Bạn không có quyền truy cập vào chức năng này!');
			return redirect()->to(BASE_URL . 'backend/dashboard/dashboard/index');
		}
		if ($this->request->getMethod() == 'post') {
			$validate = $this->validation();
			if ($this->validate($validate['validate'], $validate['errorValidate'])) {
				$store_catalogue = $this->store_catalogue(['method' => 'create']);
				$insertCatId = $this->AutoloadModel->_insert([
					'table' => 'slide_catalogue',
					'data'  => $store_catalogue,
				]);
				if ($insertCatId > 0) {
					$insertLangCat =  $this->AutoloadModel->_insert([
						'table' => 'slide_catalogue_translate',
						'data'  => [
							'title' => $this->request->getPost('title_catalogue'),
							'description' => $this->request->getPost('description_catalogue'),
							'objectid' => $insertCatId,
							'language' => $this->currentLanguage()
						],
					]);

					$storeLang = $this->storeLanguage('create', $insertCatId);
					$insert_batch_lang = $this->AutoloadModel->_create_batch([
						'table' => 'slide_translate',
						'data'  => $storeLang,
					]);

					$session->setFlashdata('message-success', 'Tạo bản ghi thành công! Hãy tạo danh mục tiếp theo.');
					return redirect()->to(BASE_URL . 'backend/slide/slide/index');
				}
			} else {
				$this->data['validate'] = $this->validator->listErrors();
			}
		}
		$this->data['method'] = 'create';
		$this->data['template'] = 'backend/slide/slide/create';
		return view('backend/dashboard/layout/home', $this->data);
	}
	public function update($id = 0)
	{
		$id = (int)$id;
		$session = session();
		$flag = $this->authentication->check_permission([
			'routes' => 'backend/slide/slide/update'
		]);
		if ($flag == false) {
			$session->setFlashdata('message-danger', 'Bạn không có quyền truy cập vào chức năng này!');
			return redirect()->to(BASE_URL . 'backend/dashboard/dashboard/index');
		}
		$this->data['slide_catalogue'] = $this->AutoloadModel->_get_where([
			'select' => 'tb1.id,tb1.keyword, tb2.title, tb2.description',
			'table'    => 'slide_catalogue as tb1',
			'join' => [
				[
					'slide_catalogue_translate as tb2',
					'tb1.id = tb2.objectid AND tb2.language = \'' . $this->currentLanguage() . '\' ',
					'inner'
				],
			],
			'where'    => [
				'tb1.deleted_at' => 0,
				'tb1.id' => $id
			],
		]);
		$session = session();
		if (!isset($this->data['slide_catalogue']) || is_array($this->data['slide_catalogue']) == false || count($this->data['slide_catalogue']) == 0) {
			$session->setFlashdata('message-danger', 'Slide không tồn tại');
			return redirect()->to(BASE_URL . 'backend/slide/slide/index');
		}

		$this->data['slide'] = $this->AutoloadModel->_get_where([
			'select' => 'id, image,  title, canonical, alt, description, content',
			'table'    => 'slide_translate',
			'where'    => [
				'catalogueid' => $id
			],
			'group_by' => 'id'
		], true);
		if ($this->request->getMethod() == 'post') {
			$validate = $this->validation();
			if ($this->validate($validate['validate'], $validate['errorValidate'])) {
				$store_catalogue = $this->store_catalogue(['method' => 'update']);
				$updateCatId = $this->AutoloadModel->_update([
					'table' => 'slide_catalogue',
					'data'  => $store_catalogue,
					'where' => [
						'id' => $id
					]
				]);
				if ($updateCatId > 0) {
					$updateLangCat =  $this->AutoloadModel->_update([
						'table' => 'slide_catalogue_translate',
						'data'  => [
							'title' => $this->request->getPost('title_catalogue'),
							'description' => $this->request->getPost('description_catalogue'),
						],
						'where' => [
							'objectid' => $id,
							'language' => $this->currentLanguage()
						]
					]);

					$this->AutoloadModel->_delete([
						'table' => 'slide_translate',
						'where'  => [
							'catalogueid' => $id,
							'language' => $this->currentLanguage()
						],
					]);

					$storeLang = $this->storeLanguage('update', $id);
					$insert_batch_lang = $this->AutoloadModel->_create_batch([
						'table' => 'slide_translate',
						'data'  => $storeLang,
					]);

					$session->setFlashdata('message-success', 'Cập nhật bản ghi thành công! Hãy tạo danh mục tiếp theo.');
					return redirect()->to(BASE_URL . 'backend/slide/slide/index');
				}
			} else {
				$this->data['validate'] = $this->validator->listErrors();
			}
		}
		$this->data['method'] = 'update';
		$this->data['template'] = 'backend/slide/slide/update';
		return view('backend/dashboard/layout/home', $this->data);
	}

	private function detect_language()
	{
		$languageList = $this->AutoloadModel->_get_where([
			'select' => 'id, canonical',
			'table' => 'language',
			'where' => ['publish' => 1, 'deleted_at' => 0, 'canonical !=' => $this->currentLanguage()]
		], TRUE);

		$select = '';
		$i = 3;
		if (isset($languageList) && is_array($languageList) && count($languageList)) {
			foreach ($languageList as $key => $val) {
				$select = $select . '(SELECT COUNT(objectid) FROM slide_catalogue_translate WHERE slide_catalogue_translate.objectid = tb1.id AND slide_catalogue_translate.language = "' . $val['canonical'] . '") as ' . $val['canonical'] . '_detect, ';
				$i++;
			}
		}

		return [
			'select' => $select,
		];
	}
	private function validation()
	{
		$validate = [
			'title_catalogue'   => 'required',
			'keyword_catalogue' => 'required',
		];
		$errorValidate = [
			'title_catalogue' => [
				'required' => 'Bạn phải nhập vào tên cho nhóm Slide'
			],
			'keyword_catalogue' => [
				'required' => 'Bạn phải nhập vào từ khóa cho nhóm Slide'
			]
		];
		return [
			'validate'      => $validate,
			'errorValidate' => $errorValidate,
		];
	}
	private function condition_where()
	{
		$where = [];
		$deleted_at = $this->request->getGet('deleted_at');
		$publish = $this->request->getGet('publish');
		if (isset($deleted_at)) {
			$where['tb1.deleted_at'] = $deleted_at;
		} else {
			$where['tb1.deleted_at'] = 0;
		}
		return $where;
	}
	private function condition_keyword($keyword = ''): string
	{
		if (!empty($this->request->getGet('keyword'))) {
			$keyword = $this->request->getGet('keyword');
			$keyword = '(tb2.title LIKE \'%' . $keyword . '%\' OR tb1.keyword LIKE \'%' . $keyword . '%\' )';
		}
		return $keyword;
	}

	private function store_catalogue($param = [])
	{
		helper(['text']);
		$store = [
			'keyword' => slug($this->request->getPost('keyword_catalogue')),
			'publish' => $this->request->getPost('publish'),
			'deleted_at' => 0,
		];
		if ($param['method'] == 'create' && isset($param['method'])) {
			$store['created_at'] = $this->currentTime;
			$store['userid_created'] = $this->auth['id'];
		} else {
			$store['updated_at'] = $this->currentTime;
			$store['userid_updated'] = $this->auth['id'];
		}
		return $store;
	}

	private function storeLanguage($method = "",  $catalogueid = 0)
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
					'language' => $this->currentLanguage(),
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

	public function execute(int $insertid = 0, array $param = [])
	{
		$data = $this->request->getPost('data');
		$data = array_values($data);
		foreach ($data as $key => $val) {
			$data[$key]['catalogueid'] = $insertid;
			$data[$key]['created_at'] = $this->currentTime;
			$data[$key]['userid_created'] = $this->auth['id'];
			$data[$key]['updated_at'] = $this->currentTime;
			$data[$key]['userid_updated'] = $this->auth['id'];
			$data[$key]['language'] = $this->currentLanguage();
			if (isset($param) && is_array($param) && count($param)) {

				$data[$key]['objectid'] = $param[$key];
			}
		}
		return $data;
	}
}
