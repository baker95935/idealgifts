<?php
require_once 'controller/home/CategoryController.php';

class ForeController extends Controller{
    
    protected function get_all_category(){
        $controller = new CategoryController();
        return $controller->get_all_category();
    }
    
    protected function get_category_img(){
        $controller = new CategoryController();
        return $controller->get_category_img();
    }
}
