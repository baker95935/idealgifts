<?php

class ImageController extends Controller {

    public function __construct() {
        error_reporting(E_ALL ^ E_NOTICE);
        parent::__construct();
    }

    public function image_upload() {
        $upload_one_pic = $this->load('upload_one_pic', FALSE);
        $photo = $upload_one_pic->upLoad('file');
        $img350 = $upload_one_pic->smallImg($photo);
        $img50 = $upload_one_pic->smallImg($photo, 50, 50);
        echo $img350;
    }

    public function category_cover() {
        $upload_one_pic = $this->load('upload_one_pic', FALSE);
        $photo = $upload_one_pic->upLoad('file');
        echo $upload_one_pic->smallImg($photo);
    }

    public function ad_img_update() {
        $upload_one_pic = $this->load('upload_one_pic', FALSE);
        $photo = $upload_one_pic->upLoad('file');
        echo $upload_one_pic->annexFolder . "/" . $upload_one_pic->dir . '/' . $photo;;
    }

}
