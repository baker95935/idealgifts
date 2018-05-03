<?php
require_once 'controller/admin/CategoryController.php';require_once 'controller/admin/AuthController.php';

class PromotionController extends CommonController {

    public function index() {    	    	$auth = new AuthController();
        $data = $this->get_promotion();
        $this->setValue('data', $data);
        parent::index();
    }

    private function get_promotion() {
        $model = $this->getModel();
        $db = $this->getDb();
        $sql1 = 'select t1.*,t2.category_name from ' . $model->table('promotion') . ' t1 left join ' . $model->table('category') . 
                ' t2 on t1.item_id = t2.category_id order by t1.id';
    
        $result = $db->query($sql1);    
        $category = $db->get_array($result);
        return $category;
    }

    public function edit() {
        $this->display();
    }

    public function add() {
        $this->get_category_list('category');
        $this->display();
    }

    private function get_category_list($name) {
        $categoryController = new CategoryController();
        $this->setValue("category", $categoryController->get_category_list());
    }
    
    
    public function insert_or_update(){
        $model = $this->getModel();
        $db = $model->getDb();
        $_POST['create_time'] = date('Y-m-d H:i:s');
        $_POST['item_id'] = $_POST['category_id'];
        $_POST['type'] = 0;
        $column = "item_id,type,is_show,start_time,end_time,create_time,order";
        if ($db->insert_by_post_param($model->table('promotion'), $column, $_POST)) {
            echo 'ok';
        }else{
            echo '操作失败，请联系相关技术人员';
        }
    }
}
