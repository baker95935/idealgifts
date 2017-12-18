<?php

class AdvertisementController extends CommonController {

    public function index() {
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->findall($model->table('advertisement'));
        $data = null;
        while ($rs = $db->fetch_assoc($result)) {
            $data[] = $rs;
        }
        $this->setValue('data', $data);
        $this->display();
    }

    public function ad_edit() {
        $id = $_REQUEST['id'] ? $_REQUEST['id'] : NULL;
        if ($id == NULL) {
            echo '参数传递错误，请稍后再试';
            return;
        }
        $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : NULL;
        if ($type == NULL) {
            echo '参数传递错误，请稍后再试';
            return;
        }


        if ($type == 0) {
            header("Location: ?p=admin&c=Advertisement&a=ad_img_edit&id=$id&type=0");
        }
        $this->setValue('type', $type);
        $this->setValue('data', $this->get_ad_img($id));
        $this->display();
    }

    private function get_ad_img($id = 0) {
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('ad_img'), '*', "ad_id = $id order by img_order");
        return $db->get_array($result);
    }

    public function ad_img_edit() {
        $id = $_REQUEST['id'] ? $_REQUEST['id'] : NULL;
        if ($id == NULL) {
            echo '参数传递错误，请稍后再试';
            return;
        }
        $condition = "id = $id";
        if(isset($_REQUEST['type'])){
            $condition = "ad_id = $id";
        }
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('ad_img'), '*', $condition);
        $this->setValue('data', $db->get_one_object($result));
        $this->display();
    }

    public function ad_img_update() {
        $id = $_REQUEST['id'];
        $img_path = $_REQUEST['img_path'];
        $img_order = $_REQUEST['img_order'];
        $is_show = $_REQUEST['is_show'];
        $href = $_REQUEST['href'];

        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->update($model->table('ad_img'),"img_path='$img_path',img_order='$img_order',is_show=$is_show,href='$href'","id=$id");
        if($result)
            echo 'ok';
        else
            echo '系统维护中，请稍后再试';
        
    }

}
