<?php

/**
 * Description of UserController
 * @author jiacong-l
 * @datetime 2016-3-28  17:23:46
 * @version 1.0
 */
class AdminController extends Controller{
    
    public function index(){
    	$model = $this->getModel();

        $db = $this->getDb();

        $result = $db->findall($model->table('admin'));

        $data = null;

        while ($rs = $db->fetch_assoc($result)) {

            $data[] = $rs;

        }

        $this->setValue('data', $data);
        
        $this->display('adminList');
    }
    
    public function roleList(){
        $this->display('roleList');
    }
    
    
    public function edit() {
    	
      	$id = $_REQUEST['id'] ? $_REQUEST['id'] : NULL;

        if ($id == NULL) {

            echo '参数传递错误，请稍后再试';

            return;

        }

        $this->setValue('data', $this->get_admin($id));
        $this->display();

    }


	 private function get_admin($id = 0) {

        $model = $this->getModel();

        $db = $this->getDb();

        $result = $db->select($model->table('admin'), '*', "id = $id");

        return $db->get_array($result);

    }

    public function add() {

        $this->display();

    }
    
    
    public function insert_or_update(){

        $model = $this->getModel();

        $db = $model->getDb();

        $_POST['admin_login_time'] = time();

        $_POST['admin_name'] = $_POST['admin_name'];

        $_POST['admin_pwd'] = $_POST['admin_pwd'];

        $column = "item_id,type,is_show,start_time,end_time,create_time,order";

        if ($db->insert_by_post_param($model->table('admin'), $column, $_POST)) {

            echo 'ok';

        }else{

            echo '操作失败，请联系相关技术人员';

        }

    }
}
