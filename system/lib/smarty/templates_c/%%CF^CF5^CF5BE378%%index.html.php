<?php /* Smarty version 2.6.19, created on 2017-12-14 16:56:38
         compiled from admin/Index/index.html */ ?>
<!--/**
 * @filename index.php
 * @encoding UTF-8
 * @datetime 2016-3-17  23:35:21
 * @version 1.0
 */-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>后台管理系统</title>
        <link rel="stylesheet" type="text/css" href="public/admin/css/style.css" />
        <!--[if lt IE 9]>
        <script src="public/js/html5.js"></script>
        <![endif]-->
        <script src="public/js/jquery-2.0.0.js"></script>
        <script type="text/javascript" src="public/js/tendina.min.js"></script>
        <script type="text/javascript" src="public/js/common.js"></script>
<!--        <script type="text/javascript" src="public/admin/js/contabs.js"></script>      -->
    </head>
    <body>
        <!--顶部开始-->
        <header>
            <h1><img src="public/admin/images/admin_logo.png"/></h1>
            <ul class="rt_nav">
                <li><a href="http://www.idealgiftscn.com" target="_blank" class="website_icon">站点首页</a></li>
<!--                <li><a href="#" class="admin_icon">DeathGhost</a></li>
                <li><a href="#" class="set_icon">账号设置</a></li>
                <li><a href="login.php" class="quit_icon">安全退出</a></li>-->
            </ul>
        </header>
        <!--顶部结束-->
        <!--左侧菜单-->
        <aside class="lt_aside_nav " >
            <h2><a href="index.php">起始页</a></h2>
            <ul id="menu">


                <!--会员管理-->
             <li>
                    <a style="cursor:pointer" class="firsta mtitle"><i></i>会员管理</a>
                    <ul class="item">
                        <li><a class="active J_menuItem" href="?p=admin&c=User&a=index"  target="mainContent">用户信息表</a></li>
                    </ul>
                </li>

        
                <li>
                    <a style="cursor:pointer" class="firsta mtitle"><i></i>后台权限管理</a>
                    <ul class="item">
                        <li><a class="J_menuItem" href="?p=admin&c=Admin&a=index" target="mainContent">管理员列表</a></li>
                        <li><a class="J_menuItem" href="?p=admin&c=Admin&a=roleList" target="mainContent">角色列表</a></li>
                        <li><a class="J_menuItem" href="javascript:void(0);" url="newhtml.html">操作列表</a></li>
                    </ul>
                </li>     
                 <!--商品管理-->
                <li>
                    <a style="cursor:pointer" class="firsta mtitle"><i></i>商品管理</a>
                    <ul class="item">
                        <li><a class="J_menuItem"  href="?p=admin&c=Category&a=index" target="mainContent">商品分类</a></li>
                        <li><a class="J_menuItem"  href="?p=admin&c=Good&a=index" target="mainContent">商品列表</a></li>
                    </ul>
                </li>  
                <!--系统设置-->
                <li>
                    <a style="cursor:pointer" class="firsta mtitle"><i></i>系统设置</a>
                    <ul class="item">
                        <li><a class="J_menuItem"  href="?p=admin&c=Shop&a=index" target="mainContent">店铺设置</a></li>
                     <li><a class="J_menuItem"  href="?p=admin&c=System&a=index" target="mainContent">系统设置</a></li>-->
                    </ul>
                </li> 
                <!--广告管理-->
                <li>
                    <a style="cursor:pointer" class="firsta mtitle"><i></i>营销管理</a>
                    <ul class="item">
                        <li><a class="J_menuItem"  href="?p=admin&c=Advertisement&a=index" target="mainContent">广告管理</a></li>
                        <li><a class="J_menuItem"  href="?p=admin&c=Promotion&a=index" target="mainContent">促销管理</a></li>
                    </ul>
                </li> 
                
                <li>
                    <p class="btm_infor">© 作者 版权所有</p>
                </li>
            </ul>
        </aside>
        <!--右侧主要内容-->
        <div class="rt_wrap ">
              <iframe class="J_iframe" name="mainContent"  width="100%" height="100%"  frameborder="0" src="?p=admin&c=Index&a=welcome" ></iframe>              
        </div>
    </body>
</html>