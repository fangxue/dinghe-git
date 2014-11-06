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
<div class="page">
	<div class="page-banner-two">
		<div class="nav">
				<ul>
					<li>
						<a href="/" name="page1">首页</a>
					</li>
					<li>
						<a href="/commerce/index" name="page1">商业保理</a>
					</li>
					<li>
						<a href="/property/index" name="page1">资产管理</a>
					</li>
					<li>
						<a href="/treasure/index" name="page1">财富中心</a>
					</li>
					<li>
						<a href="/financing/index" name="page2">申请融资</a>
					</li>
					<li>
						<a href="/program/index" name="page3">解决方案</a>
					</li>
					<li>
						<a href="/product/index" name="page4">产品中心</a>
					</li>
					<li>
						<a href="/fengkong/index" name="page8">风控体系</a>
					</li>
					<li>
						<a href="/dinghe/index" name="page6">走进鼎赫</a>
					</li>
					<li>
						<a href="/news/index" name="page9">新闻动态</a>
					</li>
					<li>
						<a href="/financial/index" name="page7">金融课堂</a>
					</li>
					<li>
						<a href="/download/index" name="page5">下载中心</a>
					</li>
				</ul>
			</div>
    	<div class="main">
        	<div class="two-left">
            	<img src="/assets/images/two_01.png">
                <a href="#">在线申请</a>
                <a href="#">联系我们</a>
            </div>
            <div class="two-right"><img src="/assets/images/two_02.jpg"></div>
            <div class="two-bottom">
            	<ul>
                	<li>多种融资渠道供您选择</li>
                    <li>专业团队为您设计个性化最佳解决方案</li>
                    <li>整合多种资源，为您实现成本最优</li>
                    <li>一站式服务，快捷轻松</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>