<?php

/**
 * Description of UserController
 * @author jiacong-l
 * @datetime 2016-3-28  17:23:46
 * @version 1.0
 */
class AdminController extends Controller{
    
    public function index(){
    	
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
}
