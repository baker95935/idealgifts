<?php

/**
 * Description of HomeController
 * @author jiacong-l
 * @datetime 2016-3-17  9:28:55
 * @version 1.0
 */
require_once 'controller/home/ForeController.php';
require_once 'controller/home/CategoryController.php';
require_once 'controller/home/GoodController.php';
require_once 'controller/home/ContactController.php';
require_once 'controller/home/AdvertisementController.php';
require_once 'controller/home/AuthController.php';

class IndexController extends ForeController {

    private function get_first_category() {
        $category = new CategoryController();
        $result = $category->get_first_category();
        $i = 0;
        while ($rs = $this->getDb()->fetch_assoc($result)) {
            $data[$i] = "<a title='{$rs['category_name']}' class='' href='" . SERVER . "/?p=home&c=Category&a=index&id={$rs['category_id']}'>{$rs['category_name']}</a>";
            $i++;
        }
        $this->setValue('first_category', $data);
    }

    private function get_hot_goods() {
        $hots = new GoodController();
        $result = $hots->get_hot_goods();
        $i = 0;
        while ($rs = $this->getDb()->fetch_assoc($result)) {
            $data[$i] = '<dl class="pro_item clearfix">
                            <dt class="fl"><a title="Jeton Plastique Seul" href="' . SERVER . '/?p=home&c=Good&a=index&id=' . $rs["good_id"] . '" class="pic_box"><img alt="Jeton Plastique Seul" src="' . $rs['good_small_img'] . '"><span></span></a></dt>
                            <dd class="fl pro_info">
                                <div class="pro_name"><a title="Jeton Plastique Seul" href="javascript:void(0);">' . $rs['good_name'] . '</a></dd>';
            if (Application::$_config['common']['show_price'] == 1) {
                $data[$i] .='<dd class="pro_price"><em class="currency_data PriceColor">$</em><span  class="price_data PriceColor">$rs["sale_price"]</span>
                            </dd>';
            }
            $data[$i].='</dl>';
            $i++;
        }
        $this->setValue('hots', $data);
    }

    public function get_best_goods() {
        $hots = new GoodController();
        $result = $hots->get_best_goods();
        $i = 0;
        while ($rs = $this->getDb()->fetch_assoc($result)) {
            $data[$i] = '<dl class="pro_item fl first">
                        <dt>
                        <a title="Porte-cles MIROIR Porte-cles MIROIR" href="' . SERVER . '/?p=home&c=Good&a=index&id=' . $rs["good_id"] . '" class="pic_box"><img alt="Porte-cles MIROIR Porte-cles MIROIR" src="' . $rs['good_small_img'] . '"><span></span></a>
                        <em class="icon_seckill DiscountBgColor">Sale</em>
                        </dt>
                        <dd class="pro_name"><a title="APorte-cles MIROIR Porte-cles MIROIR" href="javascript:void(0);">' . $rs['good_name'] . '</a></dd>';
            if (Application::$_config['common']['show_price'] == 1) {
                $data[$i] .='<dd class="pro_price">
                                <em class="currency_data PriceColor">$</em><span keyid="991" class="price_data PriceColor">$rs["sale_price"]</span>
                            </dd>';
            }
            $data[$i].='</dl>';
            $i++;
        }
        $this->setValue('bests', $data);
    }

    public function get_new_goods() {
        $hots = new GoodController();
        $result = $hots->get_new_goods();
        $i = 0;
        while ($rs = $this->getDb()->fetch_assoc($result)) {
            $data[$i] = '<dl class="pro_item fl first">
                        <dt>
                        <a title="Porte-cles MIROIR Porte-cles MIROIR" href="' . SERVER . '/?p=home&c=Good&a=index&id=' . $rs["good_id"] . '" class="pic_box"><img alt="Porte-cles MIROIR Porte-cles MIROIR" src="' . $rs['good_small_img'] . '"><span></span></a>
                        <em class="icon_seckill DiscountBgColor">Sale</em>
                        </dt>
                        <dd class="pro_name"><a title="APorte-cles MIROIR Porte-cles MIROIR" href="javascript:void(0);">' . $rs['good_name'] . '</a></dd>';
            if (Application::$_config['common']['show_price'] == 1) {
                $data[$i] .='<dd class="pro_price">
                                <em class="currency_data PriceColor">$</em><span keyid="991"  class="price_data PriceColor">$rs["sale_price"]</span>
                            </dd>';
            }
            $data[$i].='</dl>';
            $i++;
        }
        $this->setValue('news', $data);
    }

    private function get_shop_info() {
        $controller = new ContactController();
        $this->setValue('shop_info', $controller->get_shop_info());
    }

    private function get_advertisement() {
        $controller = new AdvertisementController();
        $this->setValue('banner', $controller->get_banner_img());
    }

    public function index() {
        session_start();
        $this->setValue("user", $_SESSION['username']);

        $this->get_advertisement();
        $this->get_shop_info();
        $this->setValue('category', $this->get_all_category());
//        $this->setValue('data', $this->get_category_img());
//        $this->setValue('Keychain', $this->get_good_top3(1));
//        $this->setValue('PIN', $this->get_good_top3(2));
//        $this->setValue('Laryard', $this->get_good_top3(3));
        $this->display();
    }

    private function get_good_top3($id = -1){
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('category'),'*',"category_path like '%$id%' or category_id = $id");
        $cat_ids = '';
        while ($rs = $db->fetch_assoc($result)){
            $ids[] = $rs['category_id'];
        }
        if(isset($ids)){
          $cat_ids = implode(',', $ids);
        }
        
        $result = $db->select($model->table('good'),'*',"category_id in ($cat_ids) order by good_order desc limit 0,3");
        return $db->get_array($result);
    }
    
}
