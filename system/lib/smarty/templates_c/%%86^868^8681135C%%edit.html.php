<?php /* Smarty version 2.6.19, created on 2016-07-03 09:38:54
         compiled from admin/Good/edit.html */ ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="public/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="public/admin/css/share.css" />
        <link rel="stylesheet" type="text/css" href="public/admin/css/good_add.css" />
        <script type="text/javascript" src="public/js/jquery-2.0.0.js"></script>
        <script type="text/javascript" src="public/js/json2.js"></script>
        <script type="text/javascript" src="public/js/jsonUtil.js"></script>
        <script type="text/javascript" src="public/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="public/admin/js/share.js"></script>
        <script type="text/javascript" src="public/layer/layer.js"></script>
        <script type="text/javascript" src="public/plupload-2.1.2/js/plupload.full.min.js"></script>
        <script type="text/javascript" src="public/admin/js/good_add.js"></script>

    </head>
    <body>
        <div style="width:800px;margin-top: 20px;margin-bottom: 200px;">
            <form class="form-horizontal" role="form" onsubmit="return false;" id="update_good_form">
                <div class="form-group">
                    <label for="category_id" class="col-sm-2 control-label">上级分类</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="category_id" id="category_id">
                            <option value="0" selected>顶级分类</option>    
                            <?php $_from = $this->_tpl_vars['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
                            <?php echo $this->_tpl_vars['val']; ?>

                            <?php endforeach; endif; unset($_from); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="good_name" class="col-sm-2 control-label">商品名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="good_name"  name="good_name"
                               value="<?php echo $this->_tpl_vars['data']['good_name']; ?>
">
                    </div>
                </div>

                <div class="form-group">
                    <label for="good_code" class="col-sm-2 control-label">商品编号</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="good_code"  name="good_code"
                               value="<?php echo $this->_tpl_vars['data']['good_code']; ?>
">
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-2 control-label">是否促销</label>
                    <div class="col-sm-10">
                        <label class="checkbox-inline">
                            <input type="radio" id="is_promotion" name="is_promotion" value="1" <?php if ($this->_tpl_vars['data']['is_promotion'] == 1): ?>checked<?php endif; ?>> 是
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" id="is_promotion" name="is_promotion" value="0" <?php if ($this->_tpl_vars['data']['is_promotion'] == 0): ?>checked<?php endif; ?>> 否
                        </label>
                    </div>
                </div>
                
                <div class="form-group"  style="visibility: hidden;height: 0px;">
                    <label  class="col-sm-2 control-label">推荐</label>
                    <div class="col-sm-10">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1" name="is_hot" value="1"> 热卖
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox2" name="is_new" value="1"> 新品
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox3" name="is_best" value="1"> 最好
                        </label>
                    </div>
                </div>



                <div class="form-group">
                    <label for="is_show" class="col-sm-2 control-label">是否显示</label>
                    <div class="col-sm-10">
                        <label class="checkbox-inline">
                            <input type="radio" name="is_show" id="yes" 
                                   value="1" <?php if ($this->_tpl_vars['data']['is_show'] == 1): ?>checked<?php endif; ?>> 是
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" name="is_show" id="no" 
                                   value="0" <?php if ($this->_tpl_vars['data']['is_show'] == 0): ?>checked<?php endif; ?>> 否
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="good_order" class="col-sm-2 control-label">排序（0-50）</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="good_order" name="good_order"
                               value="<?php echo $this->_tpl_vars['data']['good_order']; ?>
">
                    </div>
                </div>

                <div class="form-group">
                    <label for="good_pic" class="col-sm-2 control-label">商品图片</label>
                    <div class="col-sm-10">
                        <img src="<?php if ($this->_tpl_vars['thumbs'][0] == ''): ?>public/images/default_head.jpg<?php else: ?><?php echo $this->_tpl_vars['thumbs'][0]; ?>
<?php endif; ?>" name="img1" id="img1" style="cursor: pointer;"/>
                        <img src="<?php if ($this->_tpl_vars['thumbs'][1] == ''): ?>public/images/default_head.jpg<?php else: ?><?php echo $this->_tpl_vars['thumbs'][1]; ?>
<?php endif; ?>" name="img2" id="img2" style="cursor: pointer;"/>
                        <img src="<?php if ($this->_tpl_vars['thumbs'][2] == ''): ?>public/images/default_head.jpg<?php else: ?><?php echo $this->_tpl_vars['thumbs'][2]; ?>
<?php endif; ?>" name="img3" id="img3" style="cursor: pointer;"/>
                        <img src="<?php if ($this->_tpl_vars['thumbs'][3] == ''): ?>public/images/default_head.jpg<?php else: ?><?php echo $this->_tpl_vars['thumbs'][3]; ?>
<?php endif; ?>" name="img4" id="img4" style="cursor: pointer;"/>
                        <img src="<?php if ($this->_tpl_vars['thumbs'][4] == ''): ?>public/images/default_head.jpg<?php else: ?><?php echo $this->_tpl_vars['thumbs'][4]; ?>
<?php endif; ?>" name="img5" id="img5" style="cursor: pointer;"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pdf" class="col-sm-2 control-label">商品说明书</label>
                    <div class="input-group col-sm-10 pl-15 pr-15">
                        <input type="text" class="form-control" id="pdf_path" name="pdf_path" 
                               value="<?php echo $this->_tpl_vars['data']['pdf_path']; ?>
">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="pdf" name="pdf">
                                选择
                            </button>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="good_weight" class="col-sm-2 control-label">商品净重</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="good_weight"  name="good_weight"
                               value="<?php echo $this->_tpl_vars['data']['good_weight']; ?>
">
                    </div>
                </div>

                <div class="form-group">
                    <label for="packing" class="col-sm-2 control-label">商品包装</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="packing"  name="packing"
                               value="<?php echo $this->_tpl_vars['data']['packing']; ?>
">
                    </div>
                </div>

                <div class="form-group">
                    <label for="material" class="col-sm-2 control-label">商品物料</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="material"  name="material"
                               value="<?php echo $this->_tpl_vars['data']['material']; ?>
">
                    </div>
                </div>


                <div class="form-group">
                    <label for="size" class="col-sm-2 control-label">商品规格</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="size"  name="size"
                               value="<?php echo $this->_tpl_vars['data']['size']; ?>
">
                    </div>
                </div>

                <div class="form-group">
                    <label for="sale_price" class="col-sm-2 control-label">商品售价</label>
                    <div class="input-group col-sm-10 pl-15 pr-15">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" >
                                $
                            </button>
                        </span>
                        <input type="text" class="form-control" id="sale_price" name="sale_price" 
                               value="<?php echo $this->_tpl_vars['data']['sale_price']; ?>
">
                    </div>
                </div>

                <div class="form-group">
                    <label for="discount_price" class="col-sm-2 control-label">商品折扣价</label>
                    <div class="input-group col-sm-10 pl-15 pr-15">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" >
                                $
                            </button>
                        </span>
                        <input type="text" class="form-control" id="discount_price" name="discount_price"
                               value="<?php echo $this->_tpl_vars['data']['discount_price']; ?>
">
                    </div>
                </div>

                                <div class="form-group">
                    <label for="type" class="col-sm-2 control-label">type</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" id="type" name="type" value="<?php echo $this->_tpl_vars['data']['type']; ?>
">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="logo" class="col-sm-2 control-label">logo</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" id="logo" name="logo"
                                value="<?php echo $this->_tpl_vars['data']['logo']; ?>
">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="plate" class="col-sm-2 control-label">plate</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" id="plate" name="plate"
                                value="<?php echo $this->_tpl_vars['data']['plate']; ?>
">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="MOQ" class="col-sm-2 control-label">MOQ</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" id="MOQ" name="MOQ"
                                value="<?php echo $this->_tpl_vars['data']['MOQ']; ?>
">
                    </div>
                </div>
                <div class="form-group">
                    <label for="good_desc" class="col-sm-2 control-label">商品描述</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" id="good_desc" name="good_desc"><?php echo $this->_tpl_vars['data']['good_desc']; ?>
</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="shipping_info" class="col-sm-2 control-label">配送信息</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" id="shipping_info" name="shipping_info"><?php echo $this->_tpl_vars['data']['shipping_info']; ?>
</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-9 col-sm-3">
                        <input type="hidden" name="img1_path"  value="<?php if ($this->_tpl_vars['thumbs'][0] != ''): ?><?php echo $this->_tpl_vars['thumbs'][0]; ?>
<?php endif; ?>"/>
                        <input type="hidden" name="img2_path"  value="<?php if ($this->_tpl_vars['thumbs'][0] != ''): ?><?php echo $this->_tpl_vars['thumbs'][1]; ?>
<?php endif; ?>"/>
                        <input type="hidden" name="img3_path"  value="<?php if ($this->_tpl_vars['thumbs'][0] != ''): ?><?php echo $this->_tpl_vars['thumbs'][2]; ?>
<?php endif; ?>"/>
                        <input type="hidden" name="img4_path"  value="<?php if ($this->_tpl_vars['thumbs'][0] != ''): ?><?php echo $this->_tpl_vars['thumbs'][3]; ?>
<?php endif; ?>"/>
                        <input type="hidden" name="img5_path"  value="<?php if ($this->_tpl_vars['thumbs'][0] != ''): ?><?php echo $this->_tpl_vars['thumbs'][4]; ?>
<?php endif; ?>"/>
                        <input type="hidden" name="server" value="<?php echo SERVER; ?>" />
                        <input type="hidden" name="good_id" value="<?php echo $this->_tpl_vars['id']; ?>
" />
                        <input type="hidden" name="createTime" value="<?php echo $this->_tpl_vars['data']['createtime']; ?>
" />
                        <button  class="btn btn-primary pull-right" id="go_back">返回</button>
                        <button  class="btn btn-success pull-right " id="update_good">提交</button>                       
                    </div>
                </div>
                <script>
                    $('select[name="category_id"]').val(<?php echo $this->_tpl_vars['data']['category_id']; ?>
);
                </script>
            </form>
        </div>
    </body>
</html>