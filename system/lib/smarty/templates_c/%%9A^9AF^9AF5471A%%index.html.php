<?php /* Smarty version 2.6.19, created on 2016-06-12 13:44:16
         compiled from home/Index/index.html */ ?>
<!DOCTYPE html>
<html>
    <head>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "home/public/top.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <link rel="stylesheet" type="text/css" href="public/css/home_new.css" />
        <script src="public/js/home_new.js" type="text/javascript"></script>

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
        <?php if ($this->_tpl_vars['shop_info']['is_show'] == 1): ?>

        <div class="wide-1200" id="companyInfo">
            <a href="?p=home&c=contact&a=link">
                <img src="public/images/gift1.jpg" style="height: 200px;">
                <div class="encadrage">
                    <h1><?php echo $this->_tpl_vars['shop_info']['title']; ?>
</h1>
                    <h2><?php echo $this->_tpl_vars['shop_info']['sub_title']; ?>
</h2>
                </div>
            </a>
        </div>
        <?php endif; ?>
        <!--        <div class="wide-1200 clearfix" style="margin-top: 20px;">
                   <div class="pull-left width-238">
                        <div class="side_category">
                            <div class="cate_title">Related Categories</div>
                            <dl class="cate_menu">
                                <?php $_from = $this->_tpl_vars['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
                                <dd><a href="?p=home&c=category&a=index&id=<?php echo $this->_tpl_vars['cat']['category_id']; ?>
"><?php echo $this->_tpl_vars['cat']['category_name']; ?>
</a></dd>
                                <?php endforeach; endif; unset($_from); ?>                        
                            </dl>
                        </div>
                    </div>
                    <div class="width-950 pull-right">
                        <dl id="product" class="width-950 clearfix">
                            <dt class="hidden">Product</dt>
                            <?php $_from = $this->_tpl_vars['Keychain']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                            <dd><a href="?p=home&c=good&a=index&id=<?php echo $this->_tpl_vars['val']['good_id']; ?>
"><img src="<?php echo $this->_tpl_vars['val']['good_small_img']; ?>
"><h1 class="mask"></h1><h1><?php echo $this->_tpl_vars['val']['good_code']; ?>
</h1></a></dd>
                            <?php endforeach; endif; unset($_from); ?>
                            <dd class="clearfix split" ></dd>
                            <?php $_from = $this->_tpl_vars['PIN']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                            <dd><a href="?p=home&c=good&a=index&id=<?php echo $this->_tpl_vars['val']['good_id']; ?>
"><img src="<?php echo $this->_tpl_vars['val']['good_small_img']; ?>
"><h1 class="mask"></h1><h1><?php echo $this->_tpl_vars['val']['good_code']; ?>
</h1></a></dd>
                            <?php endforeach; endif; unset($_from); ?>
                            <dd class="clearfix split" ></dd>
                            <?php $_from = $this->_tpl_vars['Laryard']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                            <dd><a href="?p=home&c=good&a=index&id=<?php echo $this->_tpl_vars['val']['good_id']; ?>
"><img src="<?php echo $this->_tpl_vars['val']['good_small_img']; ?>
"><h1 class="mask"></h1><h1><?php echo $this->_tpl_vars['val']['good_code']; ?>
</h1></a></dd>
                            <?php endforeach; endif; unset($_from); ?>
        
        
                        </dl>
                    </div>
        
                </div>-->
        <div class="wide-1200 clearfix" style="margin-top: 20px;">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "home/public/category.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            <div class="width-950 pull-right">
                <dl id="product" class="width-950 clearfix">
                    <dt class="hidden">Product</dt>
                    <?php $_from = $this->_tpl_vars['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
                    <?php $_from = $this->_tpl_vars['cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
                    <?php if ($this->_tpl_vars['value']['is_tuijian'] == 1): ?>
                    <dd><a href="?p=home&c=Category&a=index&id=<?php echo $this->_tpl_vars['value']['category_id']; ?>
"><img src="<?php echo $this->_tpl_vars['value']['cover_path']; ?>
"><h1 class="mask"></h1><h1><?php echo $this->_tpl_vars['value']['category_name']; ?>
</h1></a></dd>
                    <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                    <?php endforeach; endif; unset($_from); ?> 
                </dl>
                <div class="paging"><?php echo $this->_tpl_vars['page']; ?>
</div>
            </div>

        </div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "home/public/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>  

    </body>
</html>