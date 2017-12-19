<?php

/**
 * Description of IndexController
 * @author jiacong-l
 * @datetime 2016-3-17  23:34:23
 * @version 1.0
 */
require_once 'controller/admin/AuthController.php';

class IndexController extends Controller {

    public function index() {
    	
    	$auth = new AuthController();
    	
        $this->display();
    }
     
    
    public function welcome(){
    	$auth = new AuthController();
     
    	$this->setValue("user", $_SESSION['username']);
    	
        $this->display();
    }
}
