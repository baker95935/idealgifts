<?php

require_once 'controller/home/AdvertisementController.php';

class ContactController extends Controller {

    public function link() {
        $this->setValue('shop_info', $this->get_shop_info());
        $this->get_advertisement();
        $this->display();
    }
    
    public function index(){
        $this->get_advertisement();
        $this->display();
    }

    public function get_shop_info() {
        $model = $this->getModel();
        $db = $model->getDb();
        $result = $db->select($model->table('shop'), '*', "");
        $data = null;
        while ($rs = $db->fetch_assoc($result)) {
            $data['id'] = $rs['id'];
            $data['shop_name'] = $rs['shop_name'];
            $data['title'] = $rs['title'];
            $data['sub_title'] = $rs['sub_title'];
            $data['is_show'] = $rs['is_show'];
            $data['introduction'] = stripslashes($rs['introduction']);
        }
        return $data;
    }

    private function get_advertisement() {
        $controller = new AdvertisementController();
        $this->setValue('banner', $controller->get_other_page_banner_img());
    }

}
