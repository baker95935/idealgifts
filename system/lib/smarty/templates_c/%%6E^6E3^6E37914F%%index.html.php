<?php /* Smarty version 2.6.19, created on 2016-05-07 14:22:22
         compiled from admin/Advertisement/index.html */ ?>
<!DOCTYPE html>
<html>
    <head>
        <title>后台管理系统</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">      
        <link rel="stylesheet" type="text/css" href="public/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="public/admin/css/share.css"/>
        <script type="text/javascript" src="public/js/jquery-2.0.0.js"></script>
        <script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
         <div class="mainContent-top"> 
            <form class="form-inline" role="form">
                <div class="form-group">                  
                    <input  class="form-control" name="ad_name" id="good_name"/>
                    <button class="btn btn-default" >查询</button>
                </div>
            </form>
        </div>
        <div class="mainContent-box ">
            <table class="table table-hover table-border">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>广告名称</th>
                        <th>类型</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>      
                    <tr>
                        <td><?php echo $this->_tpl_vars['val']['id']; ?>
</td>                       
                        <td><?php echo $this->_tpl_vars['val']['ad_name']; ?>
</td>   
                        <td><?php if ($this->_tpl_vars['val']['type'] == 0): ?>单图<?php else: ?>多图<?php endif; ?></td>
                        <td><a href="?p=admin&c=Advertisement&a=ad_edit&id=<?php echo $this->_tpl_vars['val']['id']; ?>
&type=<?php echo $this->_tpl_vars['val']['type']; ?>
">编辑</a></td>                       
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>

                </tbody>
            </table>
        </div>
        <div style="height: 100px;"></div>
    </body>
</html>