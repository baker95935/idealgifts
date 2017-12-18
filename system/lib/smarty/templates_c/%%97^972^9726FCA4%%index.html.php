<?php /* Smarty version 2.6.19, created on 2016-07-03 09:37:53
         compiled from home/Good/index.html */ ?>
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
                <div class="good_left fl" >
                    <div><img id="preview" src="<?php echo $this->_tpl_vars['data']['good_small_img']; ?>
" ></div>
                    <div id="thumb" class="mt-20">
                        <ul>
                            <?php $_from = $this->_tpl_vars['thumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                            <?php echo $this->_tpl_vars['val']; ?>

                            <?php endforeach; endif; unset($_from); ?>
                        </ul>
                    </div>
                </div>
                <div class="good_right fr">
                    <div id="goodName"><strong><?php echo $this->_tpl_vars['data']['good_code']; ?>
</strong></div>
                    <div id="describe"><?php echo $this->_tpl_vars['data']['good_desc']; ?>
</div>
                    <div class="caracts">
                        <?php if ($this->_tpl_vars['data']['good_weight'] != ''): ?>
                        <div class="row caract">
                            <div class="col-xs-1">
                                <img alt="" class="caracteristique" src="public/images/good_icon/moq.png">
                            </div>
                            <div class="col-xs-11">
                                <span class="gras">Weight</span> : <?php echo $this->_tpl_vars['data']['good_weight']; ?>
                                                </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($this->_tpl_vars['data']['packing'] != ''): ?>
                        <div class="row caract">
                            <div class="col-xs-1">
                                <img alt="" class="caracteristique" src="public/images/good_icon/delais.png">
                            </div>
                            <div class="col-xs-11">
                                <span class="gras">Packing</span> : <?php echo $this->_tpl_vars['data']['packing']; ?>
                                                </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($this->_tpl_vars['data']['material'] != ''): ?>
                        <div class="row caract">
                            <div class="col-xs-1">
                                <img alt="" class="caracteristique" src="public/images/good_icon/colisage.png">
                            </div>
                            <div class="col-xs-11">
                                <span class="gras">Material</span> : <?php echo $this->_tpl_vars['data']['material']; ?>
                                                </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($this->_tpl_vars['data']['size'] != ''): ?>
                        <div class="row caract">
                            <div class="col-xs-1">
                                <img alt="" class="caracteristique" src="public/images/good_icon/poids.png">
                            </div>
                            <div class="col-xs-11">
                                <span class="gras">Dimention</span> : <?php echo $this->_tpl_vars['data']['size']; ?>
                                                </div>
                        </div>
                        <?php endif; ?>

                        <?php if ($this->_tpl_vars['data']['shipping_info'] != ''): ?>
                        <div class="row caract">
                            <div class="col-xs-1">
                                <img alt="" class="caracteristique" src="public/images/good_icon/origine.png">
                            </div>
                            <div class="col-xs-11">
                                <span class="gras">Effect</span> : <?php echo $this->_tpl_vars['data']['shipping_info']; ?>
                                               </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['data']['type'] != ''): ?>
                        <div class="row caract">
                            <div class="col-xs-1">
                                <img alt="" class="caracteristique" src="public/images/good_icon/origine.png">
                            </div>
                            <div class="col-xs-11">
                                <span class="gras">Size</span> : <?php echo $this->_tpl_vars['data']['type']; ?>
                                               </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['data']['logo'] != ''): ?>
                        <div class="row caract">
                            <div class="col-xs-1">
                                <img alt="" class="caracteristique" src="public/images/good_icon/origine.png">
                            </div>
                            <div class="col-xs-11">
                                <span class="gras">Process</span> : <?php echo $this->_tpl_vars['data']['logo']; ?>
                                               </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['data']['plate'] != ''): ?>
                        <div class="row caract">
                            <div class="col-xs-1">
                                <img alt="" class="caracteristique" src="public/images/good_icon/origine.png">
                            </div>
                            <div class="col-xs-11">
                                <span class="gras">Plate</span> : <?php echo $this->_tpl_vars['data']['plate']; ?>
                                               </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['data']['MOQ'] != ''): ?>
                        <div class="row caract">
                            <div class="col-xs-1">
                                <img alt="" class="caracteristique" src="public/images/good_icon/origine.png">
                            </div>
                            <div class="col-xs-11">
                                <span class="gras">Attachment</span> : <?php echo $this->_tpl_vars['data']['MOQ']; ?>
                                               </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="mt-20 row">
                        <div class="col-sm-offset-7 col-sm-5" >
<!--                            <a id="download" href="<?php echo $this->_tpl_vars['data']['pdf_path']; ?>
"><img src="public/images/document_pdf.png" width="48"></a>-->
                            <a class="goback" href="javascript:void(0);" onclick="go_back();">go back</a>
                            &nbsp;&nbsp;
                            <a href="Mailto:william@idealgiftscn.com?subject=Products inquery&body=product is <?php echo $this->_tpl_vars['data']['good_code']; ?>
<hr>"><img src="public/images/email.jpg" width="48"></a>
                        </div>
                    </div>
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