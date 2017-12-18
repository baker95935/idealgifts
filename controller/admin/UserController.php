<?php

/**
 * Description of UserController
 * @author jiacong-l
 * @datetime 2016-3-28  17:23:46
 * @version 1.0
 */
class UserController extends Controller{
    
    public function index(){
        $this->display('userList');
    }
}
