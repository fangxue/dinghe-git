<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">
    <script src="/assets/js/jquery-1.9.1.min.js"></script>
    <script src="/assets/js/jquery.validate.js"></script>
    <script src="/assets/js/jquery-form.js"></script>
    <script src="/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/assets/js/ueditor/ueditor.config.js"></script> 
    <script charset="utf-8"  src="/assets/js/ueditor/ueditor.all.min.js"></script> 
    <script charset="utf-8"  src="/assets/js/ueditor/lang/zh-cn/zh-cn.js"></script> 
   
    <title>鼎赫后台</title>

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="/assets/css/main.css" rel="stylesheet">
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
          <ul class="nav navbar-nav" id="navbar-nav" style="display:none;">
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
          <ul class="nav nav-sidebar" id="nav">
            <li <?php if(($current == 'partnerlogo')): ?>class="active"<?php endif; ?>>
              <a href="/PartnerLogo/index">合作伙伴</a>
            </li>
            <li <?php if(($current == 'commerce')): ?>class="active"<?php endif; ?>>
              <a href="/Commerce/index">商业保理</a>
            </li>
            <li <?php if(($current == 'property')): ?>class="active"<?php endif; ?>>
              <a href="/Property/index">资产管理</a>
            </li>
            <li <?php if(($current == 'treasure')): ?>class="active"<?php endif; ?>>
              <a href="/Treasure/index">财富中心</a>
            </li>
            <li <?php if(($current == 'program')): ?>class="active"<?php endif; ?>>
              <a href="/Program/index">解决方案</a>
            </li>
            <li <?php if(($current == 'product')): ?>class="active"<?php endif; ?>>
              <a href="/Product/index">产品中心</a>
            </li>
            <li <?php if(($current == 'fengkong')): ?>class="active"<?php endif; ?>>
              <a href="/Fengkong/index">风控体系</a>
            </li>
            <li <?php if(($current == 'news')): ?>class="active"<?php endif; ?>>
              <a href="/News/index">新闻动态</a>
            </li>
            <li <?php if(($current == 'financial')): ?>class="active"<?php endif; ?>>
              <a href="/Financial/index">金融课堂</a>
            </li>
            <li <?php if(($current == 'download')): ?>class="active"<?php endif; ?>>
              <a href="/Download/index">下载中心</a>
            </li>
             <li <?php if(($current == 'dinghe')): ?>class="active"<?php endif; ?>>
              <a href="/Dinghe/index">走进鼎赫</a>
            </li>
            <li <?php if(($current == 'user')): ?>class="active"<?php endif; ?>>
              <a href="/public/user">用户管理（后台）</a>
            </li>
            <li <?php if(($current == 'register')): ?>class="active"<?php endif; ?>>
              <a href="/public/register">注册用户（前台）</a>
            </li>
          </ul>
        </div>
<script type="text/javascript">
/*$(function(){

  var str = $("#nav").html();
  $("#navbar-nav").html(str);
})*/
</script>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1 class="page-header">新闻动态-<?php if($list['id']): ?>编辑文章<?php else: echo ($title); ?>-增加文章<?php endif; ?></h1>
	<a class="btn btn-primary" href="/News/index">返回分类列表</a>
	<a class="btn btn-primary" href="/News/articleManage/id/<?php echo ($classid); ?>">返回文章列表</a>

	<form class="form-horizontal" role="form"  id="myprofile" enctype="multipart/form-data"  method="POST" style="margin-top:10px">
		<div class="form-group">
			<label for="input-name" class="col-sm-1 control-label">标题</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="input-title" name="title" required="" value="<?php echo ($list["title"]); ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="input-name" class="col-sm-1 control-label">上传封面</label>
			<div class="col-sm-4">
				<input type="file" name="Filedata" class="form-control" <?php if(!$list['img']): ?>required="required"<?php endif; ?>>
			</div>
		</div>
		<?php if(isset($list['img'])): ?><div class="form-group">
				<label for="input-name" class="col-sm-1 control-label"></label>
				<div class="col-sm-4">
					<img id="show_image"  required="" class="img-thumbnail" src="http://<?php echo ($WebHost); echo ($list["img"]); ?>" >
				</div>
			</div><?php endif; ?>
		<div class="form-group">
			<label for="input-name" class="col-sm-1 control-label">内容</label>
			<div class="col-sm-10">
				<script id="container" name="content" type="text/plain" style="min-height:350px;width:100%;" ><?php echo ($list["content"]); ?></script>
				<script type="text/javascript">
					var ue = UE.getEditor('container');
					</script>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-1 col-sm-10">
			<td class="text">
				<input type="hidden"name="classid" value="<?php echo ($classid); ?>"/></td>
				<input type="hidden"name="id" value="<?php echo ($list["id"]); ?>"/></td>
				<input type="submit" class="btn btn-primary" value="提交"> 
			</div>
		</div>
	</form>
</div>   
 
</div>
</body>
</html>