<?php

/**
 * Description of UserController
 * @author jiacong-l
 * @datetime 2016-3-28  17:23:46
 * @version 1.0
 */
require_once 'controller/admin/AuthController.php';
class AdminController extends Controller{
    
    public function index(){
 
    	$auth = new AuthController();
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
    	
      	$id = $_REQUEST['admin_id'] ? $_REQUEST['admin_id'] : NULL;

        if ($id == NULL) {

            echo 'failed,please retry!';

            return;

        }
 
        $this->setValue('data', $this->get_admin($id));
        $this->display();

    }


	 private function get_admin($id = 0) {

        $model = $this->getModel();

        $db = $this->getDb();

        $result = $db->select($model->table('admin'), '*', "admin_id = $id");

        return $db->get_array($result);

    }

    public function add() {
    	
    	$auth = new AuthController();
 
        $this->display();

    }
    
    
    public function insert_or_update(){

        $model = $this->getModel();

        $db = $model->getDb();

        $_POST['admin_login_time'] = time();

        $_POST['admin_name'] = $_POST['admin_name'];

        $_POST['admin_pwd'] = md5($_POST['admin_pwd']);
        
        $_POST['admin_id'] = $_POST['admin_id'];
        

        $column = "admin_name,admin_pwd,admin_login_time";

        if(!empty($_POST['admin_id'])) {
        	
        	if ($db->update_by_post_param($model->table('admin'), $column, $_POST, "admin_id = ".$_POST['admin_id'])) {
        		echo 'ok';
        	} else {
        		echo 'failed,please retry!';
        	}
        	
        } else {
        	if ($db->insert_by_post_param($model->table('admin'), $column, $_POST)) {
        	
        		echo 'ok';
        	
        	}else{
        	
        		echo 'failed,please retry!';
        	
        	}
        }
        

        
      

    }
}
