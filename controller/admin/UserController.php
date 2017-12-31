<?php

/**
 * Description of UserController
 * @author jiacong-l
 * @datetime 2016-3-28  17:23:46
 * @version 1.0
 */
 require_once 'controller/admin/AuthController.php';
class UserController extends Controller{
    
    public function index(){
        
    	$auth = new AuthController();
    	$model = $this->getModel();
    	 
    	$db = $this->getDb();
    	
    	$result = $db->findall($model->table('user'));
    	
    	$data = null;
     
    	while ($rs = $db->fetch_assoc($result)) {
    	
    		$data[] = $rs;
    	
    	}
    	
    	$this->setValue('data', $data);
    	 
 
        $this->display();
    }
    
    
     public function edit() {
    	
      	$id = $_REQUEST['id'] ? $_REQUEST['id'] : NULL;

        if ($id == NULL) {

            echo 'failed,please retry!';

            return;

        }
 
        $this->setValue('data', $this->get_user($id));
        $this->display();

    }


	 private function get_user($id = 0) {

        $model = $this->getModel();

        $db = $this->getDb();

        $result = $db->select($model->table('user'), '*', "id = $id");

        return $db->get_array($result);

    }

    public function add() {
    	
    	$auth = new AuthController();
 
        $this->display();

    }
    
    
    public function insert_or_update(){

        $model = $this->getModel();

        $db = $model->getDb();

        $_POST['utime'] = time();

        $_POST['username'] = $_POST['username'];

        $_POST['password'] = md5($_POST['password']);
        
        $_POST['id'] = $_POST['id'];
        $_POST['email'] = $_POST['email'];
        $_POST['status'] = $_POST['status'];
        

        $column = "username,password,utime,email,status,ctime";

        if(!empty($_POST['id'])) {
        	
        	if ($db->update_by_post_param($model->table('user'), $column, $_POST, "id = ".$_POST['id'])) {
        		echo 'ok';
        	} else {
        		echo 'failed,please retry!';
        	}
        	
        } else {
        	$_POST['ctime'] = time();
        	if ($db->insert_by_post_param($model->table('user'), $column, $_POST)) {
        	
        		echo 'ok';
        	
        	}else{
        	
        		echo 'failed,please retry!';
        	
        	}
        }
        

    }
    
    
    
    public function delete() {

        $model = $this->getModel();

        $db = $this->getDb();

         $id = $_REQUEST['id'] ? $_REQUEST['id'] : NULL;

        if ($id == NULL) {

            echo 'failed,please retry!';

            return;

        }

 

		$result=$db->delete($model->table('user'), 'id='.$id);
	
   
        if ($result){

            echo 'ok';

       } else {

            echo 'error';

       }

    }
     
}
