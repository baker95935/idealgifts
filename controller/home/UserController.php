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

 	
	public function test()
	{
		$mail = $this->load('mailer', FALSE);
		$targetEmail='zhaoxueming@zhaoyuncapital.com';
		$res=$mail->sendEmail($targetEmail);
		var_dump($res);exit;

	}
	
	public function addresslist()
	{
		$auth = new AuthController();
		$this->setValue("user", $_SESSION['username']);
        
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('user_address'), '*', "username = '".$_SESSION['username']."' limit 0,5");
  		$data = null;
     
    	while ($rs = $db->fetch_assoc($result)) {
    	
    		$data[] = $rs;
    	
    	}
        $this->setValue("data", $data);
		$this->display();
	}
	
	public function addressadd()
	{
		$auth = new AuthController();
		$this->setValue("user", $_SESSION['username']);
 
		$this->display();
	}
	
	public function changeemail()
	{
		$auth = new AuthController();
		$this->setValue('user',$this->get_user($_SESSION['username']));
		
		$this->display();
	}

	public function modifyemail()
	{
		$auth=new AuthController();
		
		$username=$_SESSION['username'];
		
		$email=$_POST['email'];
 
		if(!empty($email) && !empty($username)) {
			
			//发个邮件
			$mail = $this->load('mailer', FALSE);
			$mail->sendEmail($email,$username);
			
			//更改邮件地址
			$model = $this->getModel();
			$model->getDb()->update('mvc_user', "email='".$email."'", "username='".$username."'");
			echo 'ok';
			exit;
		}
		echo 'error,please retry';
		
	}
	
 

    public function register() {
        $this->get_advertisement();
        $this->display();
    }

	public function index()
	{
		$auth = new AuthController();
		$this->setValue("user", $_SESSION['username']);
		$this->display();
	}
	
	public function changepwd()
	{
		$auth = new AuthController();
		$this->setValue("user", $_SESSION['username']);
		$this->display();
	}
	
	public function modify()
	{
		$auth = new AuthController();
		$password_old = md5($_REQUEST['password_old']);
        $password  = md5($_REQUEST['password']);
        
        $username=$_SESSION['username'];
        $model = $this->getModel();
        $result = $model->getDb()->select('mvc_user','*',"username='".$username."'");
 
        $user = $model->getDb()->fetch_assoc();
 
        if($user['password'] == $password_old){

	       
	        $model->getDb()->update('mvc_user', "password='".$password."'", 'id='.$user['id']);
	        session_start();
	        $_SESSION['username']=$username;
	        $_SESSION['password']=$password;
	        
	        echo 'ok';
        }else{
        	echo 'failed,please retry!';
        }
	}
	
	public function logout()
	{
		session_start();
    	$_SESSION['username']='';
    	$_SESSION['password']='';
    	echo "<script>window.location.href='?p=home&c=user&a=login';</script>";
    	exit;
	}
	
	public function login()
	{
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
	        $_SESSION['type']='home';
 
	        $time=time();
	         
	        $model->getDb()->update('mvc_user', 'utime='.$time, 'id='.$user['id']);
	        echo 'ok';
        }else{
        	echo 'failed,please retry!';
        }
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
    	
        
        //校验下用户名的唯一
        $res=$this->get_user($_POST['username']);
        if($res!=0) {
        	echo 'username is not only one!please retry';
        	exit;
        }
        
        //发邮件
        $mail = $this->load('mailer', FALSE);
        if(!empty($_POST['email']) && !empty($_POST['username'])) {
        	$mail->sendEmail($_POST['email'],$_POST['username']);
        }
        
    	if ($db->insert_by_post_param($model->table('user'), $column, $_POST)) {
    	
    		echo 'ok';
    	
    	}else{
    	
    		echo 'failed,please retry!';
    	
    	}

    }
    
    private function get_user($username='') {
    
    	$res=0;
    	
    	$model = $this->getModel();
    
    	$db = $this->getDb();
    
    	$result = $db->select($model->table('user'), '*', "username ='".$username."'");
     
    	$res=$db->get_array($result);
    	
    	return $res;
    
    }
    
    
    
}
