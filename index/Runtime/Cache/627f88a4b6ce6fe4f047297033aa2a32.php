<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" type="text/css" href="/assets/css/common.css">
    <script type="text/javascript" src="/assets/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/assets/js/html5shiv.js"></script>
    <script type="text/javascript" src="/assets/js/scrollview.v1.js"></script>
    <script type="text/javascript" src="/assets/js/autoslide.v1.js"></script>
    <script type="text/javascript" src ="/assets/js/gotop.js"></script>
    <script type="text/javascript" src="/assets/js/common.js"></script>
    <script type="text/javascript" src="/assets/js/validator.v1.js"></script>
    <script type="text/javascript" src="/assets/js/validator.config.v1.js"></script>
</head>
<body>
<div class="top">
<div class="main clearfix">
    <div class="logo">
        <a href="/"><img src="/assets/images/logo.png"></a>
    </div>
    <div class="top-right">
            <ul>
                <?php if($user_info): ?><li class="a-login" style="color:#fff">
                    欢迎您，<?php echo ($user_info["name"]); ?>
                    </li>
                    <li class="a-login">
                    <a href="/public/logout">退出</a>
                    </li>
                <?php else: ?>
                    <li class="a-login">
                    <a href="/public/register">注册</a>
                    </li>
                    <li class="a-login">
                    <a href="/public/login">登录</a>
                    </li><?php endif; ?>
            </ul>
    </div>
</div>
</div>
    <div class="main">
        <div class="login">
        	<h2>登陆</h2>
            <form id="login-form" method="POST" action="/public/checkLogin">
                <table width="100%" class="login-tab">
                    <colgroup>
                        <col width="36%">
                        <col>
                    </colgroup>
                    <tr> 
                        <th>用户名：</th>
                        <td><input type="text" class="input-box" name="userName" id="userName" data-rule="用户名: required;username2">
                            <span class="no-tips"><i class="no-icon"></i></span>
                        </td>
                    </tr>
                    <tr>
                        <th>密码：</th>
                        <td><input type="password" class="input-box" name="password" data-rule="密码: required;password;"></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><input type="submit" value="登陆" class="submit-button"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <script>
        $('#login-form').validator();
    </script>             
</body>
</html>