<?php /* Smarty version 2.6.19, created on 2016-06-12 12:54:32
         compiled from home/public/category.html */ ?>
<div class="pull-left width-238">
    <div class="side_category">
        <dl class="cate_menu">
            <?php $_from = $this->_tpl_vars['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
            <?php $_from = $this->_tpl_vars['cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
            <dd><a id="category<?php echo $this->_tpl_vars['value']['category_id']; ?>
" href="?p=home&c=category&a=index&id=<?php echo $this->_tpl_vars['value']['category_id']; ?>
"><?php echo $this->_tpl_vars['value']['category_name']; ?>
</a></dd>
            <?php endforeach; endif; unset($_from); ?>
            <?php endforeach; endif; unset($_from); ?>                        
        </dl>
    </div>
</div>