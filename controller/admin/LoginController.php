<?php

/**
 * Description of LoginController
 * @author jiacong-l
 * @datetime 2016-3-17  11:09:04
 * @version 1.0
 */
class LoginController extends Controller {

    public function index() {
        $this->display();
    }

    public function creatCaptcha() {
        $captcha = $this->load('captcha', FALSE);
        $captcha->create();
    }

    public function login(){
        $admin_name = $_REQUEST['admin_name'];
        $admin_pwd  = md5($_REQUEST['admin_pwd']);
         
        $model = $this->getModel();
        $result = $model->getDb()->select('mvc_admin','*',"admin_name='".$admin_name."'");
 
        $admin = $model->getDb()->fetch_assoc();
   
        if($admin['admin_pwd'] == $admin_pwd){
	        session_start();
	        $_SESSION['username']=$admin_name;
	        $_SESSION['password']=$admin_pwd;
	        //更新下登录时间
	        $time=time();
	        $ip=$_SERVER['remote_addr'];
	        $model->getDb()->update('mvc_admin', 'admin_last_time='.$time.' and admin_last_ip='.$ip, 'admin_id='.$admin['admin_id']);
	        echo 'ok';
        }else{
        	echo '用户名或密码错误';
        }
       
    }
    
    public function logout()
    {
    	session_start();
    	$_SESSION['username']='';
    	$_SESSION['password']='';
    	echo "<script>window.location.href='?p=admin&c=login&a=index';</script>";
    	exit;
    }
}
