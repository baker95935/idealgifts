<?php
require_once 'controller/admin/AuthController.php';
class GalleryController extends CommonController {

    public function insert($good_id, $img) {    	    	$auth = new AuthController();
        $model = $this->getModel();
        $db = $model->getDb();
        if ($db->insert($model->table('gallery'), 'good_id,img_path', "$good_id,'$img'"))
            return true;
        else
            return false;
    }

    public function get_thumb($id) {
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('gallery'), 'gallery_id,img_path', "good_id = $id order by gallery_id asc");
        return $result;
    }
    
    public function delete_by_good_id($id) {
        $model = $this->getModel();
        $db = $this->getDb();
        return $db->delete($model->table('gallery'),"good_id = $id");
    }

}
