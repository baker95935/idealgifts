<?php

class ShopController extends CommonController{
    
    public function index(){
        $this->setValue("shop", $this->get_shop_info());
        $this->display();
    }
    
    public function get_shop_info(){
        $model = $this->getModel();
        $db = $model->getDb();
        $result = $db->select($model->table('shop'), '*', "");
        $data = null;
        while ($rs = $db->fetch_assoc($result)) {
            $data['id'] = $rs['id'];
            $data['shop_name'] = $rs['shop_name'];
            $data['title'] = $rs['title'];
            $data['sub_title'] = stripslashes($rs['sub_title']);
            $data['is_show'] = $rs['is_show'];
            $data['introduction'] = stripslashes($rs['introduction']);
        }
        return $data;
    }
    
    public function edit(){
        $this->setValue("shop", $this->get_shop_info());
        $this->display();
    }
    
    public function save_shop_info(){
        $id = $_POST['id'];
        $shop_name = $_POST['shop_name'];
        $title = $_POST['title'];
        $sub_title =  addslashes($_POST['sub_title']);
        $is_show = $_POST['is_show'];
        $introduction= addslashes($_POST['introdution']);

        $model = $this->getModel();
        $db = $this->getDb();
        if($db->update($model->table('shop'),"shop_name='$shop_name',title='$title',sub_title='$sub_title',is_show=$is_show,introduction='$introduction'","id=$id")){
            echo 'ok';
        }else{
            echo '系统维护中，请稍后再试';
        }
    }
}
