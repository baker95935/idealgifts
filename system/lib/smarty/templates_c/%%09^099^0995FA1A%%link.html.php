<?php /* Smarty version 2.6.19, created on 2016-06-12 13:23:37
         compiled from home/Contact/link.html */ ?>
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
        <script type='text/javascript' src='public/js/home_new.js' ></script>
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
<!--            <div class="pull-left width-238">
                <div class="side_category">
                    <div class="cate_title">Information</div>
                    <dl class="cate_menu">
                        <dd><a href="?p=home&c=contact&a=index&no">About us</a></dd>      
                        <dd><a href="?p=home&c=contact&a=link&no">contact us</a></dd>  
                    </dl>
                </div>
            </div>-->
            <div  style="color:black;padding: 10px 20px;word-break: break-all;">
                <h1 class="text-center" style="font-size: 20px;margin-bottom: 20px;"><strong><?php echo $this->_tpl_vars['shop_info']['title']; ?>
</strong></h1>
                <div style="font-size: 16px;"><?php echo $this->_tpl_vars['shop_info']['introduction']; ?>
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