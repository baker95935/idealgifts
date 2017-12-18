<?php /* Smarty version 2.6.19, created on 2016-06-25 10:30:09
         compiled from home/Good/search_goods.html */ ?>
<!DOCTYPE html>
<html>
    <head>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "home/public/top.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <link rel="stylesheet" type="text/css" href="public/css/category.css" />
        <link rel="stylesheet" type="text/css" href="public/css/page.css" />
        <link rel="stylesheet" type="text/css" href="public/css/good.css" />
        <script type='text/javascript' src='public/js/home_new.js' ></script>
        <script type='text/javascript' src='public/js/good.js' ></script>
        <link rel="stylesheet" type="text/css" href="public/css/search.css" />
    
    </head>
    <body>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "home/public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "home/public/banner.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div class="wide-1200 clearfix" style="margin-top: 20px;">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "home/public/category.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <div class="width-950 pull-right">

                <table id="search" class="table table-striped table-hover">
                    <caption>search&nbsp;&nbsp;(total:<?php echo $this->_tpl_vars['count']; ?>
)</caption>
                    <thead>
                        <tr>
                            <th>image</th>
                            <th>goods_code</th>
                            <th>goods_name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $_from = $this->_tpl_vars['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                        <tr good_id="<?php echo $this->_tpl_vars['val']['good_id']; ?>
" >
                            <td><img src="<?php echo $this->_tpl_vars['val']['good_small_img']; ?>
" width="100"></td>
                            <td><?php echo $this->_tpl_vars['val']['good_code']; ?>
</td>
                            <td><?php echo $this->_tpl_vars['val']['good_name']; ?>
</td>
                        </tr>
                        <?php endforeach; endif; unset($_from); ?> 
                    </tbody>
                </table>
                  <div class="paging"><?php echo $this->_tpl_vars['page']; ?>
</div>
            </div>

        </div>
        <div class="blank25"></div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "home/public/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>       
    </body>
</html>