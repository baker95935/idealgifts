<?php

/**
 * Description of UserController
 * @author jiacong-l
 * @datetime 2016-3-28  17:23:46
 * @version 1.0
 */
class AuthController extends Controller{
    
 	public function __construct()
    {
    	session_start();
    	if(!$_SESSION['username'] || !$_SESSION['password'] )
    	{
    		//$this->redirect('/admin/login/login/');
    		header("Location: ?p=admin&c=login&a=index");
    	}
    }
    
 
}
