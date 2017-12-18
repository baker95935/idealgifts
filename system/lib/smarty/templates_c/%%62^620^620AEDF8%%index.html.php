<?php /* Smarty version 2.6.19, created on 2016-07-04 01:13:09
         compiled from home/Promotion/index.html */ ?>
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
            <dl id="product">
                <dt style="margin-bottom: 10px;background: white;padding: 10px; border-bottom: 1px solid #666;font-size: 16px;">Product</dt>
                <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                <dd style="margin:10px 10px 50px;height: 280px;width: 280px;">
                    <div style="width:280px;height:280px;"><a href="?p=home&c=good&a=index&id=<?php echo $this->_tpl_vars['val']['good_id']; ?>
"><img src="<?php echo $this->_tpl_vars['val']['good_small_img']; ?>
"><h1 class="mask"></h1><h1><?php echo $this->_tpl_vars['val']['good_code']; ?>
</h1></a>
                    <div>  
                        <div style="with:200px;display:none;height:0px;">
                            <a style="border: 0px !important;" id="download" href="<?php echo $this->_tpl_vars['val']['pdf_path']; ?>
"><img src="public/images/document_pdf.png" style="width: 48px !important;height:48px !important;"></a>
                        </div>    
                    
                </dd>
                <?php endforeach; endif; unset($_from); ?>
            </dl>
        </div>
        <div class="paging"><?php echo $this->_tpl_vars['page']; ?>
</div>               
        <div class="blank25"></div>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "home/public/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>       
    </body>
</html>