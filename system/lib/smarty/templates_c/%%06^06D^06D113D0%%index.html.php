<?php /* Smarty version 2.6.19, created on 2017-11-12 02:03:36
         compiled from admin/Promotion/index.html */ ?>
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
        <link rel="stylesheet" type="text/css" href="public/admin/css/share.css"/>
         <link rel="stylesheet" type="text/css" href="public/css/page.css"/>
        <script type="text/javascript" src="public/js/jquery-2.0.0.js"></script>
        <script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body> 
        <div class="mainContent-top"> 
            <form class="form-inline" role="form">
                <div class="form-group">
                    <input  class="form-control" name="good_name" id="good_name"/>
                    <button class="btn btn-default" >查询</button>
                </div>
                <a id="addBtn"  class="btn btn-default pull-right" href="<?php echo SERVER; ?>/?p=admin&c=promotion&a=add" target="_self">新增</a>
            </form>
        </div>
        <div class="mainContent-box ">
            <table class="table table-hover table-border">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>分类</th>
                        <th>是否显示</th>  
                        <th>开始时间</th>
                        <th>结束时间</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>      
                    <tr>
                        <td><?php echo $this->_tpl_vars['cat']['id']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['cat']['category_name']; ?>
</td>
                        <td><?php if ($this->_tpl_vars['cat']['is_show'] == 0): ?><img src="public/images/no.gif"><?php else: ?><img src="public/images/yes.gif"><?php endif; ?></td>
                        <td><?php echo $this->_tpl_vars['cat']['start_time']; ?>
</td>
                        <td><?php echo $this->_tpl_vars['cat']['end_time']; ?>
</td>
                    </tr>

                    <?php endforeach; endif; unset($_from); ?>

                </tbody>
            </table>
        </div>
        <div class="paging"><?php echo $this->_tpl_vars['page']; ?>
</div>
        <div style="height: 100px;"></div>
    </body>
</html>