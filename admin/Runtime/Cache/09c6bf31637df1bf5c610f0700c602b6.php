<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">
  <script src="/assets/js/jquery-1.8.2.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/artDialog.min.js"></script>
    <script src="/assets/js/common.js"></script>
    <script src="/assets/js/admin.js"></script>
    <title>鼎赫后台</title>

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="/assets/css/main.css" rel="stylesheet">
    <link href="/assets/css/blue.css" rel="stylesheet">
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">鼎赫后台</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <!-- <li class=""><a href=""></a></li> -->
          </ul>
          <div class="navbar-text pull-right mobile-pulldown">
            <?php echo ($current_user["name"]); ?>
            <a href="/User/changePassword" style="margin-left: 1.5em;">修改密码</a>
            <a href="/Public/logout" style="margin-left: 1.5em;">退出</a>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class=""><a href="/">合作伙伴</a></li>
            <li class=""><a href="/">商业保理</a></li>
            <li class=""><a href="/">资产管理</a></li>
            <li class=""><a href="/">财富中心</a></li>
            <li class=""><a href="/">申请融资</a></li>
            <li class=""><a href="/">解决方案</a></li>
            <li class=""><a href="/">产品中心</a></li>
            <li class=""><a href="/">风控体系</a></li>
            <li class=""><a href="/">新闻动态</a></li>
            <li class=""><a href="/">金融课堂</a></li>
            <li class=""><a href="/">下载中心</a></li>

          </ul>
        </div>