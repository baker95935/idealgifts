<?php /* Smarty version 2.6.19, created on 2016-06-08 01:20:18
         compiled from admin/Category/index.html */ ?>
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
        <link rel="stylesheet" type="text/css" href="public/css/page.css"/>
        <link rel="stylesheet" type="text/css" href="public/admin/css/share.css"/>
        <script type="text/javascript" src="public/js/jquery-2.0.0.js"></script>
        <script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="public/layer/layer.js"></script>
        <script type="text/javascript" src="public/admin/js/category.js"></script>
    </head>
    <body> 
        <div class="mainContent-top clearfix"> 
            <a id="addBtn"  class="btn btn-default pull-right" href="<?php echo SERVER; ?>/?p=admin&c=Category&a=add" target="_self">新增</a>
        </div>
        <div class="mainContent-box">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>分类名称</th>
                        <th>是否显示</th>
                        <th>排序</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>                        
                        <?php $_from = $this->_tpl_vars['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
                         <tr>
                           <td><?php echo $this->_tpl_vars['value']['category_name']; ?>
</td>
                           <td><?php echo $this->_tpl_vars['value']['is_show']; ?>
</td>
                           <td><?php echo $this->_tpl_vars['value']['sort_order']; ?>
</td>
                           <td><?php echo $this->_tpl_vars['value']['operate']; ?>
</td>
                         </tr>
                        <?php endforeach; endif; unset($_from); ?>                  
                    <?php endforeach; endif; unset($_from); ?>

                </tbody>
            </table>
            <div class="paging"><?php echo $this->_tpl_vars['page']; ?>
</div>
        </div>

    </body>
</html>