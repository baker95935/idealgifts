<?php

class AdvertisementController extends Controller{
    public $img = array('banner'=>1,'other_page_banner'=>2,'right_top2'=>3,'left_bottom1'=>4,'left_bottom2'=>5,'middle'=>6);
    
    public function get_banner_img(){
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('ad_img'),'*',"ad_id = {$this->img['banner']} and is_show = 1");
        return $db->get_array($result);
    }
    public function get_right_top1_img(){
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('ad_img'),'*',"ad_id = {$this->img['right_top1']}");
        return $db->get_one_object($result);
    }
    public function get_right_top2_img(){
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('ad_img'),'*',"ad_id = {$this->img['right_top2']}");
        return $db->get_one_object($result);
    }
    public function get_left_bottom1_img(){
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('ad_img'),'*',"ad_id = {$this->img['left_bottom1']}");
        return $db->get_one_object($result);
    }
    public function get_left_bottom2_img(){
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('ad_img'),'*',"ad_id = {$this->img['left_bottom2']}");
        return $db->get_one_object($result);
    }
    public function get_middle_img(){
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('ad_img'),'*',"ad_id = {$this->img['middle']}");
        return $db->get_one_object($result);
    }

        public function get_other_page_banner_img(){
        $model = $this->getModel();
        $db = $this->getDb();
        $result = $db->select($model->table('ad_img'),'*',"ad_id = {$this->img['other_page_banner']} and is_show =1");
        return $db->get_array($result);
    }
}
