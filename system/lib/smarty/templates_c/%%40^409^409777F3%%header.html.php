<?php /* Smarty version 2.6.19, created on 2017-12-04 14:14:51
         compiled from home/public/header.html */ ?>
<div style="background: url(public/images/background.png)">

<div id="header" style="margin: 0 auto;width:1200px;padding: 20px;">  

    <img src="public/images/logo1.jpg" width="120px">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="public/images/banner/banner.gif" >

    <div class="head_info fr">

        <p>Tel: 0086-758-5975-008</p>

        <p>Fax: 0086-758-2777-099</p>

        <p>E-mail: info@idealgiftscn.com</p>

    </div>

</div>

</div>

<div class="NavBgColor" id="nav_outer clearfix" style="border-bottom: 1px solid #ccc;">

    <div  class="wide-1200" id="nav">	

<!--        <div class="nav_menu">

            <div class="nav_title CategoryBgColor"><a href="">All Categories<b></b></a></div>

            <div class="nav_categories" style="display: none; height: 490px;">

                <ul>

                    <?php $_from = $this->_tpl_vars['first_category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat1']):
?>

                    <li data="[]">

                        <h2>

                            <?php echo $this->_tpl_vars['cat1']; ?>


                        </h2>

                    </li>

                    <?php endforeach; endif; unset($_from); ?>

                </ul>

            </div>

        </div>-->

        <ul class="nav_item">

            <li class="NavBorderColor2">

                <a href="?p=home&c=index&a=index" class="NavBorderColor1 NavHoverBgColor">Home</a>

            </li>

            <li class="NavBorderColor2">

                <a href="?p=home&c=category&a=index" class="NavBorderColor1 NavHoverBgColor">Products</a>

            </li>



            <li class="NavBorderColor2">

                <a href="?p=home&c=promotion&a=index" class="NavBorderColor1 NavHoverBgColor">Promotion</a>

            </li>

            <li class="NavBorderColor2">

                <a href="?p=home&c=technic&a=index" class="NavBorderColor1 NavHoverBgColor">Technic</a>

            </li>

            <li class="NavBorderColor2">

                <a href="?p=home&c=contact&a=link" class="NavBorderColor1 NavHoverBgColor">About us</a>

            </li>

            <li class="NavBorderColor2">

                <a href="?p=home&c=contact&a=index" class="NavBorderColor1 NavHoverBgColor">Contact</a>

            </li>

        </ul>

        <form action="?p=home&c=good&a=search_goods" method="get" style="float: right;margin-right: -50px; margin-top: 3px;border: 0px;">

            <table>

                <tr><td><input type="text" name="good_name" style="height: 36px;line-height: 36px;width: 260px;font-size: 16px;padding-left: 10px;" placeholder="search products"></td>                

                    <td><input type="submit" style="background: url(public/images/search.png);width: 36px;height: 36px;display: inline-block;border: 0px;" value=""></td>

                <input type="hidden" name="p" value="home"> 

                <input type="hidden" name="c" value="good">  

                <input type="hidden" name="a" value="search_goods">  

                </tr>

            </table>

        </form>

    </div>



</div>
