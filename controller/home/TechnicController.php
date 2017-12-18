<?php

require_once 'controller/home/AdvertisementController.php';
class TechnicController extends Controller  {
    
    public function index() {
        $this->get_advertisement();
        $this->display();
    }
    
     private function get_advertisement() {
        $controller = new AdvertisementController();
        $this->setValue('banner', $controller->get_other_page_banner_img());
    }
}
