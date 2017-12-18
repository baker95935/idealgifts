<?php

/**
 * Description of UserController
 * @author jiacong-l
 * @datetime 2016-3-28  17:23:46
 * @version 1.0
 */
class AdminController extends Controller{
    
    public function index(){
        $this->display('adminList');
    }
    
    public function roleList(){
        $this->display('roleList');
    }
}
