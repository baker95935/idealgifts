<?php /* Smarty version 2.6.19, created on 2016-06-07 15:59:19
         compiled from admin/Advertisement/ad_img_edit.html */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">      
        <link rel="stylesheet" type="text/css" href="public/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="public/admin/css/share.css"/>
        <script type="text/javascript" src="public/js/jquery-2.0.0.js"></script>
        <script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="public/layer/layer.js"></script>       
        <script type="text/javascript" src="public/admin/js/share.js"></script>
        <script type="text/javascript" src="public/plupload-2.1.2/js/plupload.full.min.js"></script>
        <script type="text/javascript" src="public/admin/js/ad_img_update.js"></script>
    </head>
    <body>
        <div class="mainContent-box ">
            <form class="form-horizontal width-800" role="form" onsubmit="return false;">


                <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">id</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id"  name="id"
                               value="<?php echo $this->_tpl_vars['data']['id']; ?>
" disabled="disabled">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="img_path" class="col-sm-2 control-label">图片</label>
                    <div class="col-sm-10">
                        <img src="<?php echo $this->_tpl_vars['data']['img_path']; ?>
" name="img_path" id="img_path" style="width: 300px;"/>
                        <input class="btn btn-default" value="更改" id="update"/>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="img_order" class="col-sm-2 control-label">排序（0-50）</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="img_order" name="img_order"
                               value="0">
                    </div>
                </div>
                          
                <div class="form-group">
                    <label for="is_show" class="col-sm-2 control-label">是否显示</label>
                    <div class="col-sm-10">
                        <label class="checkbox-inline">
                            <input type="radio" name="is_show" id="yes" 
                                   value="1" checked> 是
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" name="is_show" id="no" 
                                   value="0"> 否
                        </label>
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="href" class="col-sm-2 control-label">跳转页面</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="href" name="href"
                               value="<?php echo $this->_tpl_vars['data']['href']; ?>
">
                    </div>
                </div>
                              
                <div class="form-group">
                    <div class="col-sm-offset-9 col-sm-3">
                        <input type="hidden" name="server" value="<?php echo SERVER; ?>" />
                        <button  class="btn btn-primary pull-right" id="go_back">返回</button>
                        <button  class="btn btn-success pull-right " id="save_ad_img">提交</button>                       
                    </div>
                </div>
            </form>
        </div>
    </body>

</html>