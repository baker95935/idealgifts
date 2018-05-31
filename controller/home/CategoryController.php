<?php

require_once 'controller/home/ForeController.php';
require_once 'controller/home/GoodController.php';
require_once 'lib/page.php';
require_once 'controller/home/AdvertisementController.php';
require_once 'controller/home/AuthController.php';

class CategoryController extends ForeController {

    public function get_first_category($page = 0, $page_size = 0) {
        $model = $this->getModel();
        $db = $this->getDb();
        if (!empty($page)) {
            $start = ($page - 1) * $page_size;
            $result = $db->select($model->table('category'), 'category_id,category_name,cover_path', "category_pid = 0 limit $start,$page_size");
        } else {
            $result = $db->select($model->table('category'), 'category_id,category_name,cover_path', 'category_pid = 0');
        }
        return $result;
    }

    public function index() {

        session_start();
        $this->setValue("user", $_SESSION['username']);

        if (isset($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        } else {

            $page = 1;
        }
        if (isset($_REQUEST['id'])) {
            $category_id = $_REQUEST['id'];
        } else {
            $category_id = 0;
        }
        
//        $result = $this->get_first_category();
//        $i = 0;
//        while ($rs = $this->getDb()->fetch_assoc($result)) {
//
//            $cats[$i] = "<dd class='first'><a href='" . SERVER . "/?p=home&c=category&a=index&id={$rs["category_id"]}'>{$rs["category_name"]}</a></dd>";
//            $i++;
//        }
        $model = $this->getModel();
        $db = $model->getDb();
        $i = 0;
        $goodController = new GoodController();
        if ($category_id == 0) {
            $result = $goodController->get_all_goods_fenye($page, Application::$_config['page']['page_size']);
        }else{
            $result = $goodController->get_goods_by_cat($category_id, $page, Application::$_config['page']['page_size']);
        }
     
        
        while ($rs = $db->fetch_assoc($result)) {
            $data[$i] = '<dd class=active><a href="' . SERVER . '/?p=home&c=good&a=index&cat_id=' . $rs['category_id'] . '&id=' . $rs['good_id'] . '"><img src="' . $rs['good_small_img'] . '" style="height:186px;"><h1 class="mask"></h1><h1>' . $rs['good_name'];            
            $rs['sale_price']>0 && $data[$i].='--'.$rs['sale_price'].'$';            
            $data[$i].='</h1></a></dd>';
            $i++;
        }
         $page = new Page( $goodController->get_goods_count($category_id), Application::$_config['page']['page_size']);

//        } else {
//            $result = $this->get_all_category_by_page($page, Application::$_config['page']['page_size']);
//            while ($rs = $this->getDb()->fetch_assoc($result)) {
////                $data[$i] = '<a class="cover-box" href="' . SERVER . '/?p=home&c=Category&a=index&id=' . $rs['category_id'] . '"><img src="' . $rs['cover_path'] . '"></a>';
//                $data[$i] = '<dd><a href="' . SERVER . '/?p=home&c=Category&a=index&id=' . $rs['category_id'] . '"><img src="' . $rs['cover_path'] . '"><h1 class="mask"></h1><h1>' . $rs['category_name'] . '</h1></a></dd>';
//                $i++;
//            }
//            $page = new Page($this->get_all_category_count(), Application::$_config['page']['page_size']);
//        }
//        if (isset($cats))
//            $this->setValue('category', $cats);
        if (isset($data))
            $this->setValue('data', $data);

        $this->setValue('page', $page->showpage());
        $this->setValue('category', $this->get_all_category());
        $this->get_advertisement();
        $this->display();
    }
    
    
    //最新的产品列表
    public function new_good_list() {
    
    	session_start();
    	$this->setValue("user", $_SESSION['username']);
    
    	$model = $this->getModel();
    	$db = $model->getDb();
    	$i = 0;
    	
    	$goodController = new GoodController();
    	$result = $goodController->get_new_goods(12);
    	 
    	while ($rs = $db->fetch_assoc($result)) {
    			$data[$i] = '<dd class=active><a href="' . SERVER . '/?p=home&c=good&a=index&cat_id=' . $rs['category_id'] . '&id=' . $rs['good_id'] . '"><img src="' . $rs['good_small_img'] . '" style="height:186px;"><h1 class="mask"></h1><h1>' . $rs['good_name'];
    			$rs['sale_price']>0 && $data[$i].='--'.$rs['sale_price'].'$';
    			$data[$i].='</h1></a></dd>';
    			$i++;
    	}
    	 
 
    	if (isset($data))
    		$this->setValue('data', $data);
 
    	$this->setValue('category', $this->get_all_category());
    	$this->get_advertisement();
    	$this->display();
    }

    private function get_topone_category() {
        $model = $this->getModel();
        $db = $model->getDb();
        $sql = 'select category_id from ' . $model->table('category') . ' where is_show = 1 and is_delete = 0 limit 0,1';
        $result = $db->query($sql);
        $id = 0;
        while ($rs = $db->fetch_assoc($result)) {
            $id = $rs['category_id'];
        }
        return $id;
    }

    private function get_first_category_count() {
        $model = $this->getModel();
        $db = $this->getDb();
        return $db->get_count($model->table('category'), 'category_id', "category_pid = 0");
    }

    private function get_all_category_count() {
        $model = $this->getModel();
        $db = $this->getDb();
        return $db->get_count($model->table('category'), 'category_id', "is_show = 1 and is_delete = 0");
    }

    public function get_all_category($page = 0, $page_size = 0) {
        $model = $this->getModel();
        $db = $model->getDb();
        $sql = 'select category_id,category_name,cover_path,concat(category_path,"-",category_id) as path,sort_order,is_tuijian  from ' . $model->table('category') . ' where is_show = 1 and is_delete = 0  order by path';
        $result = $db->query($sql);
        $i = 0;
        $a = null;
        $num_rows = mysql_num_rows($result);
        while ($rs = $db->fetch_assoc($result)) {
            $count = substr_count($rs['path'], '-');
            $data[$i]['category_id'] = $rs['category_id'];
            $data[$i]['category_name'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', 2 * ($count - 1)) . $rs['category_name'];
            $data[$i]['sort_order'] = $rs['sort_order'];
             $data[$i]['is_tuijian'] = $rs['is_tuijian'];
            $data[$i]['cover_path'] = $rs['cover_path'];
            if ($count == 1) {
                if ($a != null)
                    $first[] = $a;
                $a = array();
                array_push($a, $data[$i]);
            }else {
                array_push($a, $data[$i]);
            }
            if ($i == $num_rows - 1)
                $first[] = $a;
            $i++;
        }

        
        //排序   
        if ($first) {
            for ($k = 0; $k < count($first); $k++) {
                for ($z = 0; $z < count($first[$k]); $z++) {
                    if ($z > 0) {
                        for ($y = $z + 1; $y < count($first[$k]); $y++) {
                            if ($first[$k][$z]['sort_order'] > $first[$k][$y]['sort_order']) {
                                $exchange = $first[$k][$z];
                                $first[$k][$z] = $first[$k][$y];
                                $first[$k][$y] = $exchange;
                            }
                        }
                    }
                }
            }


            for ($k = 0; $k < count($first); $k++) {
                for ($y = $k + 1; $y < count($first); $y++) {
                    if ($first[$k][0]['sort_order'] > $first[$y][0]['sort_order']) {
                        $exchange = $first[$k];
                        $first[$k] = $first[$y];
                        $first[$y] = $exchange;
                    }
                }
            }
        }
  
        return $first;
    }

    public function get_all_category_by_page($page = 0, $page_size = 0) {
        $model = $this->getModel();
        $db = $model->getDb();
        $start = ($page - 1) * $page_size;
        $sql = 'select category_id,category_name,cover_path,concat(category_path,"-",category_id) as path  from ' . $model->table('category') . ' where is_show = 1 and is_delete = 0 order by path limit ' . $start . ',' . $page_size;
        $result = $db->query($sql);
        return $result;
    }

    private function get_advertisement() {
        $controller = new AdvertisementController();
        $this->setValue('banner', $controller->get_other_page_banner_img());
    }

    public function get_category_img() {
        $result = $this->get_first_category();
        $i = 0;
        while ($rs = $this->getDb()->fetch_assoc($result)) {

            $cats[$i] = "<dd class='first'><a href='" . SERVER . "/?p=home&c=category&a=index&id={$rs["category_id"]}'>{$rs["category_name"]}</a></dd>";
            $i++;
        }
        return $cats;
    }

}
