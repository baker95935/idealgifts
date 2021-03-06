<?php /* Smarty version 2.6.19, created on 2016-04-26 22:35:56
         compiled from admin/Login/index.html */ ?>
<!--/**
 * @filename login.php
 * @encoding UTF-8
 * @datetime 2016-3-17  15:06:39
 * @version 1.0
 */-->
<!DOCTYPE html>

<html>
    <head>
        <title>后台登录</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/admin/css/login.css" rel="stylesheet" type="text/css" />
        <link href="public/admin/css/style.css" rel="stylesheet" type="text/css" />
        <link href="public/admin/css/login.css" rel="stylesheet" type="text/css" />
        <script src="public/js/jquery-2.0.0.js"></script>
        <script src="public/js/verificationNumbers.js"></script>
        <script src="public/admin/js/particleGround.js"></script>
        <script src="public/layer/layer.js"></script>
        <script src="public/admin/js/login.js"></script>
    </head>
    <body>
        <dl class="admin_login">
            <dt>
            <strong>站点后台管理系统</strong>
            <em>Management System</em>
            </dt>
            <dd class="user_icon">
                <input type="text" placeholder="账号" class="login_txtbx" id="userName"/>
            </dd>
            <dd class="pwd_icon">
                <input type="password" placeholder="密码" class="login_txtbx" id="pwd"/>
            </dd>
            <dd class="val_icon">
                <div class="checkcode">
                    <input type="text" id="J_codetext" placeholder="验证码" maxlength="4" class="login_txtbx">
                    <canvas class="J_codeimg" id="myCanvas" onclick="createCode()">对不起，您的浏览器不支持canvas，请下载最新版浏览器!</canvas>
                </div>
            </dd>
            <dd>
                <input type="button" value="立即登陆" class="submit_btn"/>
            </dd>
            <dd>
                <p>© 2016-2017 idealgiftscn 版权所有</p>
            </dd>
        </dl>
    </body>
</html>