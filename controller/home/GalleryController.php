<?php

class GalleryController extends Controller{
    
    public function get_thumb($id){
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('gallery'), 'gallery_id,img_path', "good_id = $id order by gallery_id asc");
        return $result;
    }
}
