<?php

/**
 * Description of HomeController
 * @author jiacong-l
 * @datetime 2016-3-17  9:28:55
 * @version 1.0
 */
require_once 'controller/home/ForeController.php';
require_once 'controller/home/CategoryController.php';
require_once 'controller/home/ContactController.php';
require_once 'controller/home/AdvertisementController.php';
require_once 'controller/home/AuthController.php';
 

class UserController extends ForeController {

 
    private function get_shop_info() {
        $controller = new ContactController();
        $this->setValue('shop_info', $controller->get_shop_info());
    }

    private function get_advertisement() {
        $controller = new AdvertisementController();
 
        $this->setValue('banner', $controller->get_banner_img());
    }

    public function register() {
        $this->get_advertisement();
        $this->get_shop_info();
        $this->setValue('category', $this->get_all_category());
 
        $this->display();
    }

	public function index()
	{
		$auth = new AuthController();
		echo 'ok';
	}
	
	public function login()
	{
		$this->get_advertisement();
        $this->get_shop_info();
        $this->setValue('category', $this->get_all_category());
		$this->display();
	}
	
	public function check()	
	{
		$username = $_REQUEST['username'];
        $password  = md5($_REQUEST['password']);
         
        $model = $this->getModel();
        $result = $model->getDb()->select('mvc_user','*',"username='".$username."'");
 
        $user = $model->getDb()->fetch_assoc();
   
        if($user['password'] == $password){
	        session_start();
	        $_SESSION['username']=$username;
	        $_SESSION['password']=$password;
	        //�����µ�¼ʱ��
	        $time=time();
	         
	        $model->getDb()->update('mvc_user', 'utime='.$time, 'id='.$user['id']);
	        echo 'ok';
        }else{
        	echo '�û������������';
        }
	}
 	
    public function creatCaptcha() {
        $captcha = $this->load('captcha', FALSE);
        $captcha->create();
    }
    
    
    public function insert(){

        $model = $this->getModel();

        $db = $model->getDb();

        $_POST['utime'] = time();

        $_POST['username'] = $_POST['username'];

        $_POST['password'] = md5($_POST['password']);
        $_POST['email'] = $_POST['email'];
        $_POST['status'] = 1;
        $_POST['ctime'] = time();
        

        $column = "username,password,utime,email,status,ctime";
    	
    	if ($db->insert_by_post_param($model->table('user'), $column, $_POST)) {
    	
    		echo 'ok';
    	
    	}else{
    	
    		echo 'failed,please retry!';
    	
    	}
       
        

    }
    
    
    
}
