<?php
    helper('form');
    $baseController = new App\Controllers\BaseController();
    $language = $baseController->currentLanguage();
    $languageList = get_list_language(['currentLanguage' => $language]);
?>
<div class="row wrapper border-bottom white-bg page-heading">
   <div class="col-lg-8">
      <h2>Quản lý Nhật ký người dùng</h2>
      <ol class="breadcrumb" style="margin-bottom:10px;">
         <li>
            <a href="<?php echo base_url('backend/dashboard/dashboard/index') ?>"><?php echo translate('cms_lang.post.post_home', $language) ?></a>
         </li>
         <li class="active"><strong>Quản lý Nhật ký người dùng</strong></li>
      </ol>
   </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Quản lý Nhật ký người dùng </h5>
                </div>
                <div class="ibox-content">
                    <div class="wrap-table">
                        <div class="width-table">
                            <table class="table table-striped table-bordered nd_accordion table-hover dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Tên người dùng</th>
                                        <th>Hành động</th>
                                        <th>Hành động chi tiết</th>
                                        <th>Địa chỉ IP</th>
                                        <th>Trình duyệt ứng dụng</th>
                                        <th>Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($logList as $key => $val) {?>
                                    <tr>
                                        <td><?php echo $val['fullname'] ?></td>
                                        <td><?php echo $val['event_type'] ?></td>
                                        <td><?php echo $val['description'] ?></td>
                                        <td><?php echo $val['ip_address'] ?></td>
                                        <td><?php echo $val['user_agent'] ?></td>
                                        <td><?php echo $val['created_at'] ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="pagination">
                        <?php echo (isset($pagination)) ? $pagination : ''; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
