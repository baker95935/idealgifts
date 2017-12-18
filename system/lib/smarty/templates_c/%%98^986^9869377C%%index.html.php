<?php /* Smarty version 2.6.19, created on 2016-05-17 12:47:02
         compiled from admin/Shop/index.html */ ?>
<!DOCTYPE html>
<html>
    <head>
        <title>后台管理系统</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">      
        <link rel="stylesheet" type="text/css" href="public/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="public/admin/css/share.css" />
        <script type="text/javascript" src="public/js/jquery-2.0.0.js"></script>
        <script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="mainContent-top width-1000 clearfix"> 
            <a class="btn btn-default pull-right" href="?p=admin&c=Shop&a=edit">修改</a>
        </div>
        <div class="mainContent-box width-1000">           
            <form class="form-horizontal width-1000"  role="form" onsubmit="return false;">

                <div class="form-group">
                    <label for="shop_name" class="col-sm-2 control-label">商店名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="good_name"  name="shop_name"
                               value="<?php echo $this->_tpl_vars['shop']['shop_name']; ?>
" disabled="disabled">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">标题</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title"  name="title"
                               value="<?php echo $this->_tpl_vars['shop']['title']; ?>
" disabled="disabled">
                    </div>
                </div>

                <div class="form-group">
                    <label for="sub_title" class="col-sm-2 control-label">公司简介</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" id="sub_title"  name="sub_title" disabled="disabled"><?php echo $this->_tpl_vars['shop']['sub_title']; ?>
</textarea>      
                    </div>
                </div>

                <div class="form-group">
                    <label for="is_show" class="col-sm-2 control-label">是否显示</label>
                    <div class="col-sm-10">
                        <label class="checkbox-inline">
                            <input type="radio" name="is_show" id="is_show" value="1" disabled="disabled" <?php if ($this->_tpl_vars['shop']['is_show'] == 1): ?>checked<?php endif; ?>> 是
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" name="is_show" id="is_show" value="0" disabled="disabled" <?php if ($this->_tpl_vars['shop']['is_show'] == 0): ?>checked<?php endif; ?>> 否
                        </label>

                    </div>
                </div>
                <div class="form-group">
                    <label for="introduction" class="col-sm-2 control-label">公司详细</label>
                    <div class="col-sm-10">
                        <div id="introduction"><?php echo $this->_tpl_vars['shop']['introduction']; ?>
</div> 
                    </div>
                </div>
                

            </form>
        </div>
    </body>
</html>