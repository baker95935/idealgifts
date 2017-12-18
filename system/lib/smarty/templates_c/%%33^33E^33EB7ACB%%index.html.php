<?php /* Smarty version 2.6.19, created on 2016-05-06 00:30:34
         compiled from home/Shop/index.html */ ?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="public/css/global.css" />
        <script type='text/javascript' src='public/js/jquery-2.0.0.js' ></script>
    </head>
    <body>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "home/public/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <div id="main" class="wide">
            <div id="location">Your position: <a href="/?p=home&c=index&a=index">Home</a> &gt; company introduction</div>
            <h1 class="txt-center"><?php echo $this->_tpl_vars['shop_info']['title']; ?>
</h1>
            <div><?php echo $this->_tpl_vars['shop_info']['introduction']; ?>
</div>
            <div class="blank20"></div>
        </div>
        <div class="blank25"></div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "home/public/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>       
    </body>
</html>