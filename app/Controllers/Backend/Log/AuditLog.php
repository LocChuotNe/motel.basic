<?php

    namespace App\Controllers\Backend\Log;
    use App\Controllers\BaseController;
use kcfinder\session;

    class AuditLog extends BaseController
{
    protected $data;

    public function __construct()
    {
        $this->data = [];
        $this->data['module'] = 'audit_logs';
    }

    public function index($page = 1)
    {
        $session = session();
        $flag = $this->authentication->check_permission([
            'routes' => 'backend/log/index'
        ]);
        if($flag == true){
            $session->setFlashdata('message-danger','Bạn không có quyền truy cập chức năng này!');
            return redirect()->to(BASE_URL.'backend/dashboard/dashboard/index');
        }
        helper(['mypagination']);
        $page = (int)$page;
        $perpage = ($this->request->getGet('perpage')) ? $this->request->getGet('perpage') : 20;
        $perpage = ($perpage > 0) ? $perpage : 20;
        $this->data['pagination'] = '';
        $config['total_rows'] = $this->AutoloadModel->_get_where([
            'select'    => 'id',
            'table'     => $this->data['module'].' as tb1',
            'join'      => [
                ['user as tb2','tb1.user_id  = tb2.id','inner'],
            ],
            'count' => TRUE
        ], true);
        if($config['total_rows'] > 0){
        $config = pagination_config_bt(['url' => 'backend/log/auditlog/index','perpage' => $perpage], $config, $page);
        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->create_links($config);
        $totalPage = ceil($config['total_rows']/$config['per_page']);
        $page = ($page <= 0)?1:$page;
        $page = ($page > $totalPage)?$totalPage:$page;
        $page = $page -1;
        $this->data['logList'] = $this->AutoloadModel->_get_where([
            'select' => 'tb1.id,
                tb2.fullname, 
                tb1.event_type,
                tb1.description,
                tb1.ip_address,
                tb1.user_agent,
                tb1.created_at',
            'table' => $this->data['module'].' as tb1',
            'join'      => [
                ['user as tb2','tb1.user_id  = tb2.id','inner'],
            ],
            'limit' => $config['per_page'],
            'start' => $page * $config['per_page'],
            'order_by' => 'tb1.id desc',
            'group_by' => 'tb1.id'
        ], true);
    }
        $this->data['template'] = 'backend/log/index';
		return view('backend/dashboard/layout/home', $this->data);
    }
}