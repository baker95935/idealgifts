<?php /* Smarty version 2.6.19, created on 2016-06-12 13:16:17
         compiled from home/Category/index.html */ ?>
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
             <div style="float:left;margin-top: 50px;">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "home/public/category.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
             </div>
            <div class="width-950 pull-right" style="height: 100%;">
                <h1 style="letter-spacing: 2px;font-weight: 600;height: 40px;line-height: 40px;text-align: center;border-bottom: 1px solid #000;margin: 10px 20px;color:#000;font-size: 20px;">PRODUCTS</h1>
                <dl id="product" class="width-950 clearfix">
                    <dt class="hidden">Product</dt>
                    <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                    <?php echo $this->_tpl_vars['val']; ?>

                    <?php endforeach; endif; unset($_from); ?>                  
                </dl>
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