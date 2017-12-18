<?php

require_once 'controller/home/AdvertisementController.php';
require_once 'lib/page.php';
class PromotionController extends Controller {

    public function index() {
        $this->setValue('data', $this->get_goods());
        $this->get_advertisement();
        $this->display();
    }

    private function get_goods() {
        $model = $this->getModel();
        $db = $this->getDb();
        if (isset($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        } else {

            $page = 1;
        }
        $page_size = Application::$_config['page']['page_size'];
         $start = ($page - 1) * $page_size;
//        $sql = 'select t1.* from mvc_good t1,mvc_promotion t2 where t1.category_id = t2.item_id and t2.type = 0  UNION  
//select t1.* from mvc_good t1,mvc_promotion t2 where t1.good_id = t2.item_id and t2.type=1';
        $sql = "select * from mvc_good where is_promotion = 1 limit $start,$page_size";
        $result = $db->query($sql);
        $result = ($db->get_array($result));
        $page_util = new Page($db->get_count("mvc_good","good_id","is_promotion = 1"),$page_size);
        $this->setValue('page', $page_util->showpage());
        
        return $result;
    }

    private function get_advertisement() {
        $controller = new AdvertisementController();
        $this->setValue('banner', $controller->get_other_page_banner_img());
    }

}
