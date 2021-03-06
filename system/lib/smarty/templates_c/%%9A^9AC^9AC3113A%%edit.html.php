<?php /* Smarty version 2.6.19, created on 2016-05-17 12:47:07
         compiled from admin/Shop/edit.html */ ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>后台管理系统</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">      
        <link rel="stylesheet" type="text/css" href="public/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="public/admin/css/share.css" />
        <script type="text/javascript" src="public/js/jquery-2.0.0.js"></script>
        <script type="text/javascript" src="public/layer/layer.js"></script>
        <script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>
        <!-- 配置文件 -->
        <script type="text/javascript" src="public/ueditor/ueditor.config.js"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="public/ueditor/ueditor.all.js"></script>
        <script type="text/JavaScript" src="public/admin/js/shop_edit.js"></script>
        <script type="text/JavaScript" src="public/admin/js/share.js"></script>
    </head>
    <body>
        <div class="mainContent-box">
            <form class="form-horizontal width-1000"  role="form" onsubmit="return false;">

                <div class="form-group">
                    <label for="shop_name" class="col-sm-2 control-label">商店名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="good_name"  name="shop_name"
                               value="<?php echo $this->_tpl_vars['shop']['shop_name']; ?>
">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">标题</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title"  name="title"
                               value="<?php echo $this->_tpl_vars['shop']['title']; ?>
">
                    </div>
                </div>

                <div class="form-group">
                    <label for="sub_title" class="col-sm-2 control-label">公司简介</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" id="sub_title"  name="sub_title"><?php echo $this->_tpl_vars['shop']['sub_title']; ?>
</textarea>      
                    </div>
                </div>

                <div class="form-group">
                    <label for="is_show" class="col-sm-2 control-label">是否显示</label>
                    <div class="col-sm-10">
                        <label class="checkbox-inline">
                            <input type="radio" name="is_show" id="is_show" value="1" <?php if ($this->_tpl_vars['shop']['is_show'] == 1): ?>checked<?php endif; ?>> 是
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" name="is_show" id="is_show" value="0" <?php if ($this->_tpl_vars['shop']['is_show'] == 0): ?>checked<?php endif; ?>> 否
                        </label>

                    </div>
                </div>

                <div class="form-group">
                    <label for="introduction" class="col-sm-2 control-label">公司详细</label>
                    <div class="col-sm-10">
                        <script id="container" name="introduction" type="text/plain" style="width:600px;height:200px;">
                            <?php echo $this->_tpl_vars['shop']['introduction']; ?>

                        </script>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-9 col-sm-3">   
                        <input type="hidden" name="server" value="<?php echo SERVER; ?>" />
                        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['shop']['id']; ?>
" />
                        <button  class="btn btn-primary pull-right" id="go_back">返回</button>
                        <button  class="btn btn-success pull-right " id="save_shop_info">提交</button>                                           
                    </div>
                </div>

            </form>

        </div>
        <!--        实例化编辑器 -->
        <script type="text/javascript">
            
        </script>
    </body>
</html>