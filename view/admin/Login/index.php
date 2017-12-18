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
        <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="public/admin/css/login.css" rel="stylesheet" type="text/css" />
        <script src="public/js/jquery-2.0.0.js"></script>
        <script src="public/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <form id="form1" runat="server" action="__CONTROLLER__/checkLogin" method="post" role="form">
            <div class="Main">
                <ul>
                    <li class="top"></li>
                    <li class="top2"></li>
                    <li class="topA"></li>
                    <li class="topB"><span><img src="public/admin/images/loginlogo.png" alt="" style="width: 140px;margin-left: 70px;" /></span></li>
                    <li class="topC"></li>
                    <li class="topD">
                        <ul class="login">
                            <li>
                                <div class="input-group " >
                                    <span class=" input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" id="username" name="username"  class="form-control" placeholder="请输入用户名">
                                </div>
                            </li>

                            <li>
                                <div class="input-group">
                                    <span class=" input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></span>
                                    <input type="password" id="user_pwd" name="user_pwd" class="form-control" placeholder="请输入密码(6-15位字母或数字）">
                                </div>
                            </li>

                            <li>
                                <div class="form-group" style="height: 30px;line-height: 30px;" >
                                    <label for="vercode" class="col-sm-3 control-label" style="font-size: 14px;padding: 0px;text-align: right;">验证码</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="vercode" 
                                               placeholder="">
                                    </div>
                                    <div class="col-sm-4" style="text-align: left;padding: 0px;">
                                        <img  src="<?php echo SERVER . '?p=admin&c=Login&a=creatCaptcha' ?>" onclick="this.src = '<?php echo SERVER . '?p=admin&c=Login&a=creatCaptcha&' ?>' + Math.random();"> 
                                    </div>
                                </div>

                            </li>

                        </ul>
                    </li>
                    <li class="topE"></li>
                    <li class="middle_A"></li>
                    <li class="middle_B"></li>
                    <li class="middle_C"><span class="btn"><input name="" type="image" src="/public/admin/images/btnlogin.gif" /></span></li>
                    <li class="middle_D"></li>
                    <li class="bottom_A"></li>
                    <li class="bottom_B">后台管理系统</li>
                </ul>
            </div>
        </form>      
    </body>
</html>
