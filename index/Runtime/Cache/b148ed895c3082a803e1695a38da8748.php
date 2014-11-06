<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo ($title); ?></title>
    <link rel="stylesheet" type="text/css" href="/public/index/css/common.css">
    <script type="text/javascript" src="/public/index/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/public/index/js/html5shiv.js"></script>
    <script type="text/javascript" src="/public/index/js/scrollview.v1.js"></script>
    <script type="text/javascript" src="/public/index/js/autoslide.v1.js"></script>
    <script type="text/javascript" src="/public/index/js/gotop.js"></script>
    <script type="text/javascript" src="/public/index/js/common.js"></script>
    <script type="text/javascript" src="/public/index/js/validator.v1.js"></script>
    <script type="text/javascript" src="/public/index/js/validator.config.v1.js"></script>
</head>
<body>
<div class="top">
<div class="main clearfix">
    <div class="logo">
        <a href="/"><img src="/public/index/images/logo.png"></a>
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
<div class="page4">
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
	<div class="jrkt">
    	<h2><a href="/news/lists"><img src="/public/index/images/page8_01.png"></a></h2>
    </div>
    <div class="news">
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><div class="news-list">
            <div class="news-con">
            	<div class="time"><?php echo (date('d.F Y',$info["create_time"])); ?></div>
                <dl class="clearfix">
                    <dt>
                        <a href="#"><img src="/public/Uploads<?php echo ($info["img"]); ?>"></a>
                    </dt>
                    <dd>
                    	<h2><a href="#"><?php echo ($info["title"]); ?></a></h2>
                        <div><?php echo (mb_substr($info["content"],0,200,'utf-8')); ?>
                            <?php if(mb_strlen($info['content'],'utf-8')> 200) echo '...';?>
                            </div>
                        <div class="a-more"><a href="/news/detail/id/<?php echo ($info["id"]); ?>" target="_blank" >more</a></div>
                    </dd>
                </dl>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
</body>
</html>