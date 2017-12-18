<?php /* Smarty version 2.6.19, created on 2016-06-10 15:10:11
         compiled from admin/Category/add.html */ ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="public/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="public/admin/css/share.css" />
        <script type="text/javascript" src="public/js/jquery-2.0.0.js"></script>
        <script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="public/admin/js/share.js"></script>
        <script type="text/javascript" src="public/layer/layer.js"></script>
        <script type="text/javascript" src="public/plupload-2.1.2/js/plupload.full.min.js"></script>
        <script type="text/javascript" src="public/admin/js/category_add.js"></script>
    </head>
    <body>
         <div class="mainContent-box width-1000">
            <form class="form-horizontal" role="form" onsubmit="return false;">
                
                <div class="form-group">
                    <label for="category_pid" class="col-sm-2 control-label">上级分类</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="category_pid" id="category_pid">
                            <option value="0" selected>顶级分类</option>    
                           <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                           <?php echo $this->_tpl_vars['val']; ?>

                           <?php endforeach; endif; unset($_from); ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="category_name" class="col-sm-2 control-label">分类名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="category_name"  name="category_name"
                               placeholder="请输入分类名称">
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
                    <label for="is_tuijian" class="col-sm-2 control-label">是否推荐</label>
                    <div class="col-sm-10">
                        <label class="checkbox-inline">
                            <input type="radio" name="is_tuijian" id="yes_tuijian" 
                                   value="1" checked> 是
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" name="is_tuijian" id="no_tuijian" 
                                   value="0"> 否
                        </label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="sort_order" class="col-sm-2 control-label">排序（0-50）</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sort_order" name="sort_order"
                               value="0">
                    </div>
                </div>
                               
                <div class="form-group">
                    <label for="cover" class="col-sm-2 control-label">上传封面</label>
                    <div class="col-sm-10">
                        <img src="public/images/default_head.jpg" name="cover" id="cover" style="cursor: pointer;"/>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-offset-9 col-sm-3">
                        <input type="hidden" name="cover_path" value="public/images/default_head.jpg"/>
                        <input type="hidden" name="server" value="<?php echo SERVER; ?>" />
                         <input type="hidden" name="category_id" value="" />
                        <button  class="btn btn-primary pull-right" id="go_back">返回</button>
                        <button  class="btn btn-success pull-right " id="save_category">提交</button>                       
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>