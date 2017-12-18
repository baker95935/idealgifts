<?php /* Smarty version 2.6.19, created on 2016-06-08 14:23:14
         compiled from home/public/banner.html */ ?>
<div id="myCarousel" class="carousel slide" >
    <!-- 轮播（Carousel）指标 -->
    <ol class="carousel-indicators">
        <?php unset($this->_sections['ban']);
$this->_sections['ban']['name'] = 'ban';
$this->_sections['ban']['loop'] = is_array($_loop=$this->_tpl_vars['banner']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ban']['show'] = true;
$this->_sections['ban']['max'] = $this->_sections['ban']['loop'];
$this->_sections['ban']['step'] = 1;
$this->_sections['ban']['start'] = $this->_sections['ban']['step'] > 0 ? 0 : $this->_sections['ban']['loop']-1;
if ($this->_sections['ban']['show']) {
    $this->_sections['ban']['total'] = $this->_sections['ban']['loop'];
    if ($this->_sections['ban']['total'] == 0)
        $this->_sections['ban']['show'] = false;
} else
    $this->_sections['ban']['total'] = 0;
if ($this->_sections['ban']['show']):

            for ($this->_sections['ban']['index'] = $this->_sections['ban']['start'], $this->_sections['ban']['iteration'] = 1;
                 $this->_sections['ban']['iteration'] <= $this->_sections['ban']['total'];
                 $this->_sections['ban']['index'] += $this->_sections['ban']['step'], $this->_sections['ban']['iteration']++):
$this->_sections['ban']['rownum'] = $this->_sections['ban']['iteration'];
$this->_sections['ban']['index_prev'] = $this->_sections['ban']['index'] - $this->_sections['ban']['step'];
$this->_sections['ban']['index_next'] = $this->_sections['ban']['index'] + $this->_sections['ban']['step'];
$this->_sections['ban']['first']      = ($this->_sections['ban']['iteration'] == 1);
$this->_sections['ban']['last']       = ($this->_sections['ban']['iteration'] == $this->_sections['ban']['total']);
?>

          <?php if ($this->_sections['ban']['index'] == 0): ?>
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <?php else: ?>
           <li data-target="#myCarousel" data-slide-to="<?php echo $this->_sections['ban']['index']; ?>
"></li>
           <?php endif; ?>
        <?php endfor; endif; ?>
    </ol>   
    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner" style="width: 1200px;margin: 0 auto;">
        <?php $_from = $this->_tpl_vars['banner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
        <div class="item">
            <img src="<?php echo $this->_tpl_vars['val']['img_path']; ?>
" width="1200">
        </div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
</div> 