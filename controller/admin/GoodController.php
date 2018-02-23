<?php



require_once 'controller/admin/CategoryController.php';

require_once 'controller/admin/GalleryController.php';

require_once 'controller/admin/AuthController.php';

class GoodController extends CommonController {



    public function index() {
        $data=array();
        $data['good_name']=$_REQUEST['good_name'];
   		!empty($data['good_name']) && $this->setValue('good_name', $data['good_name']);
        
        
    	$auth = new AuthController();

        if (isset($_REQUEST['page'])) {

            $page = $_REQUEST['page'];

        } else {
            $page = 1;

        }
 
 
        $this->get_category_list('category');

        $this->get_all_goods($page,$data);

       $this->display();

    }



    public function add() {
    	$auth = new AuthController();

        $this->get_category_list('category');

        parent::add();

    }



    public function edit() {

        $id = $_REQUEST['id'];

        $controller = new GalleryController();

        $thumb = $controller->get_thumb($id);

        while ($rs = $this->getDb()->fetch_assoc($thumb)) {

            $img[] = $rs['img_path'];
            $imgid[] =$rs['gallery_id'];

        }

        if (isset($img)) {
            $this->setValue("thumbs", $img);
        }
        if (isset($imgid)) {
        	$this->setValue("imgid", $imgid);
        }

        $this->setValue('id', $id);

        $this->get_category_list('category');

        $this->setValue('data', $this->get_good_by_id($id));

        $this->display();

    }



    public function insert_or_update() {

        $model = $this->getModel();

        $db = $model->getDb();

        $_POST['createtime'] = date('Y-m-d H:i:s');

        $_POST['good_small_img'] = $_POST['img1_path'] == '' ? ($_POST['img2_path'] == '' ? ($_POST['img3_path'] == '' ? ($_POST['img4_path'] == '' ? $_POST['img5_path'] : $_POST['img4_path']) : $_POST['img3_path']) : $_POST['img2_path']) : $_POST['img1_path'];

        $img = array($_POST['img1_path'], $_POST['img2_path'], $_POST['img3_path'], $_POST['img4_path'], $_POST['img5_path']);

        $column = 'category_id,good_code,good_name,is_show,good_desc,good_small_img,good_order,is_hot,is_new,is_best,pdf_path,createtime,good_weight,packing,material,size,discount_price,sale_price,shipping_info,logo,plate,MOQ,type,is_promotion';





        $controller = new GalleryController();



        if (isset($_POST['good_id'])) {

            $good_id = $_POST['good_id'];

            $controller->delete_by_good_id($good_id);

            if ($db->update_by_post_param($model->table('good'), $column, $_POST, "good_id = $good_id")) {

                foreach ($img as $val) {

                    if ($val != '')

                        $controller->insert($good_id, $val);

                }

                echo 'ok';

            } else

                echo '操作失败，请联系相关技术人员';

        } else {

            

            if ($db->insert_by_post_param($model->table('good'), $column, $_POST)) {

                $insert_good_id = $db->insert_id();

                foreach ($img as $val) {

                    if ($val != '')

                        $controller->insert($insert_good_id, $val);

                }

                echo 'ok';

            } else

                echo '操作失败，请联系相关技术人员';

        }

    }



    public function update() {

        $controller = new GalleryController();

        $controller->delete_by_good_id($_POST['$id']);

    }



    private function get_category_list($name) {

        $categoryController = new CategoryController();

        $this->setValue("category", $categoryController->get_category_list());

    }



    private function get_all_goods($page,$data) {

        $model = $this->getModel();

        $db = $model->getDb();
 
        $start = ($page - 1) * Application::$_config['page']['page_size'];
        
        $sql = "select good_id,good_name,good_small_img,is_show from {$model->table('good')} ";
        
        if(!empty($data))
        {
        	!empty($data['good_name']) && $sql.=" where good_name like '%".$data['good_name']."%'";
         
        }
		 
		$sql.="order by good_id desc limit $start," . Application::$_config['page']['page_size'];
 

 
        $result = $db->query($sql);

        $i = 0;

        while ($rs = $db->fetch_assoc($result)) {

            $data[$i]['good_id'] = $rs['good_id'];

            $data[$i]['good_name'] = $rs['good_name'];

            $data[$i]['good_small_img'] = "<img class='goodimg' src='{$rs['good_small_img']}'>";

            $data[$i]['is_show'] = $rs['is_show'] ? "<img src='public/images/yes.gif'>" : "<img src='public/images/no.gif'>";
            
            $data[$i]['sale_price'] = $rs['sale_price'];

            $data[$i]['op'] = '<a href="?p=admin&c=Good&a=edit&id=' . $rs['good_id'] . '">编辑</a>&nbsp;&nbsp;<a class="'.'delete" data_id="'.$rs["good_id"].'" href="javascript:void(0);">删除</a>';

            $i++;

        }
        //获取总数
        $count=$this->get_goods_count($data);
        //获取分页数
        $pageCount=ceil($count/Application::$_config['page']['page_size']);

        $page = new Page($count, Application::$_config['page']['page_size']);

        $this->setValue('data', $data);
        
        $this->setValue('pageCount', $pageCount);

        $this->setValue('page', $page->showpage());

    }



    private function get_goods_count($data=array()) {

        $model = $this->getModel();

        $db = $this->getDb();
        
        $condition='';
        !empty($data['good_name']) && $condition=" good_name like '%".$data['good_name']."%'";

        return $db->get_count($model->table('good'), 'good_id', $condition);

    }



    private function get_good_by_id($id) {

        $model = $this->getModel();

        $db = $this->getDb();

        $result = $db->select($model->table('good'), '*', "good_id = $id");

        return $db->get_one_object($result);

    }



    public function delete() {

        $good_id = $_POST['good_id'];

        $model = $this->getModel();

        $db = $this->getDb();

        if($db->delete($model->table('good'),"good_id = {$good_id}") && $db->delete($model->table('gallery'),"good_id = {$good_id}") ){

            echo 'ok';

        }else{

            echo 'error';

        }

    }
    
    //产品缩略图删除
    public function deleteImg() 
    {
    
    	$img_id = $_POST['img_id'];
    
    	$model = $this->getModel();
    
    	$db = $this->getDb();
    
    	if($db->delete($model->table('gallery'),"gallery_id = {$img_id}") ){
    
    		echo 'ok';
    
    	}else{
    
    		echo 'error';
    
    	}
    
    }



}

