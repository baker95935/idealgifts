<?php
class FileController extends Controller{
    public function file_upload(){
        error_reporting(E_ALL ^ E_NOTICE);
        $upload_one_pic = $this->load('upload_one_pic', FALSE);
        echo $upload_one_pic->file_upload('file');
    }
}
