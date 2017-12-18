<?php

require_once 'controller/home/GalleryController.php';
require_once 'controller/home/AdvertisementController.php';
require_once 'controller/home/ForeController.php';

class GoodController extends ForeController {

    public function get_goods_by_cat($cat_id = 0, $page = 0, $page_size = 0) {
        $model = $this->getModel();
        $db = $this->getDb();
        if (empty($page))
            $result = $db->select($model->table('good'), 'category_id,good_id,good_name,good_small_img', "category_id = $cat_id");
        else {
            $start = ($page - 1) * $page_size;
            $result = $db->select($model->table('good'), 'category_id,good_id,good_name,good_small_img', "category_id = $cat_id limit $start,$page_size");
        }
        return $result;
    }

    public function get_all_goods_fenye($page = 0, $page_size = 0) {
        $model = $this->getModel();
        $db = $this->getDb();
        $start = ($page - 1) * $page_size;
        $result = $db->select($model->table('good'), 'category_id,good_id,good_name,good_small_img', "1=1 limit $start,$page_size");
        return $result;
    }

    public function get_good_by_id($good_id) {
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('good'), '*', "good_id = $good_id");
        $data = null;
        while ($rs = $db->fetch_assoc($result)) {
            $data = $rs;
        }
        return $data;
    }

    public function index() {
        $good_id = $_REQUEST['id'];
        if ($data = $this->get_good_by_id($good_id)) {
            $this->setValue('data', $data);
        }
        $thumb = $this->get_thumb($good_id);
        while ($rs = $this->getDb()->fetch_assoc($thumb)) {
            $img[] = '<li><img src="' . str_replace("350x350", "50x50", $rs['img_path']) . '"></li>';
        }
        if (isset($img)) {
            $this->setValue("thumbs", $img);
        }
        $this->get_advertisement();
        $this->setValue('category',$this->get_all_category());
        $this->display();
    }

    public function get_hot_goods() {
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('good'), 'good_id,good_name,good_small_img,sale_price', "is_hot = 1 order by good_id desc limit 0,4");
        return $result;
    }

    public function get_best_goods() {
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('good'), 'good_id,good_name,good_small_img,sale_price', "is_best = 1 order by good_id desc limit 0,8");
        return $result;
    }

    public function get_new_goods() {
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('good'), 'good_id,good_name,good_small_img,sale_price', "is_new = 1 order by good_id desc limit 0,8");
        return $result;
    }

    public function get_thumb($id) {
        $galleryController = new GalleryController();
        return $galleryController->get_thumb($id);
    }

    public function get_goods_count($id = 0) {
        $model = $this->getModel();
        $db = $this->getDb();
        if($id == 0){ 
            $result = $db->get_count($model->table('good'), 'good_id', "1=1");
        }else{
            $result = $db->get_count($model->table('good'), 'good_id', "category_id = $id");
        }
        return $result;
    }

    private function get_advertisement() {
        $controller = new AdvertisementController();
        $this->setValue('banner', $controller->get_other_page_banner_img());
    }

//    private function get_all_category() {
//        $controller = new CategoryController();
//        $this->setValue('category', $controller->get_all_category());
//    }
    
    public function search_goods(){

        $input = $_REQUEST["good_name"];
        if(isset($_REQUEST["page"])){
            $page = $_REQUEST["page"];
        }else{
            $page = 1;
        }
        
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('good'),'count(good_id) as count'," good_name like '%{$input}%' or good_code like '%{$input}%' ");
        while($rs = $db->fetch_assoc($result)){
            $count = $rs["count"];
        }
        $start = ($page-1) * Application::$_config['page']['page_size'];
        $result = $db->select($model->table('good'),'*'," good_name like '%{$input}%' or good_code like '%{$input}%' limit $start,".Application::$_config['page']['page_size']);
        
        
        $search_count = mysql_num_rows($result);
        $i = 0;
        while($rs = $db->fetch_assoc($result)){
            $search[$i]['good_name'] = $rs['good_name'];
            $search[$i]['good_id'] = $rs['good_id'];
            $search[$i]['good_code'] = $rs['good_code'];
            $search[$i]['good_small_img'] = $rs['good_small_img'];
            $i++;
        }

        $page = new Page( $count, Application::$_config['page']['page_size']);
        $this->setValue('page', $page->showpage());
        $this->setValue("search", $search);
        $this->setValue("count", $search_count);
        $this->get_advertisement();
        $this->setValue('category',$this->get_all_category());
        $this->display();
    }

}
