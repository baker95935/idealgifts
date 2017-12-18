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
       $result = $model->getDb()->select('mvc_admin','*',"admin_name='$admin_name'");
        if($result){
            echo '用户名或密码错误';
        }else{
            $admin = $model->getDb()->fetch_assoc();
            if($admin['admin_pwd'] == $admin_pwd){
                echo 'ok';
            }else{
                echo '用户名或密码错误';
            }
        }
    }
}
