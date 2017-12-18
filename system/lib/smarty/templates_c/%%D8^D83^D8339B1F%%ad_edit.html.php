<?php /* Smarty version 2.6.19, created on 2016-05-18 12:19:28
         compiled from admin/Advertisement/ad_edit.html */ ?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">      
        <link rel="stylesheet" type="text/css" href="public/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="public/admin/css/share.css"/>
        <script type="text/javascript" src="public/js/jquery-2.0.0.js"></script>
        <script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="mainContent-box ">
            <?php if ($this->_tpl_vars['type'] == 1): ?>
            <table class="table table-hover table-border">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>图片</th>
                        <th>是否显示</th>
                        <th>href</th>
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
                        <td><?php echo $this->_tpl_vars['val']['img_path']; ?>
</td>   
                        <td><?php if ($this->_tpl_vars['val']['is_show'] == 0): ?><img src="public/images/no.gif" /><?php else: ?><img src="public/images/yes.gif"/><?php endif; ?></td>
                        <td><?php echo $this->_tpl_vars['val']['href']; ?>
</td>   
                        <td><a href="?p=admin&c=Advertisement&a=ad_img_edit&id=<?php echo $this->_tpl_vars['val']['id']; ?>
">编辑</a></td>                       
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>

                </tbody>
            </table>
            <?php endif; ?>
        </div>
        <div style="height: 100px;"></div>
    </body>
</html>