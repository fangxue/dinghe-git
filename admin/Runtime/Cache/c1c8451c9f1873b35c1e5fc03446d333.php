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
    <script src="/public/admin/js/jquery-1.9.1.min.js"></script>
    <script src="/public/admin/js/jquery.validate.js"></script>
    <script src="/public/admin/js/jquery-form.js"></script>
    <script src="/public/admin/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="/public/admin/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/public/admin/js/ueditor/ueditor.config.js"></script> 
    <script charset="utf-8"  src="/public/admin/js/ueditor/ueditor.all.min.js"></script> 
    <script charset="utf-8"  src="/public/admin/js/ueditor/lang/zh-cn/zh-cn.js"></script> 
   
    <title>鼎赫后台</title>

    <link href="/public/admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="/public/admin/css/main.css" rel="stylesheet">
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
          <a class="navbar-brand" href="/admin.php">鼎赫后台</a>
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
              <a href="/admin.php/PartnerLogo/index">合作伙伴</a>
            </li>
            <li <?php if(($current == 'commerce')): ?>class="active"<?php endif; ?>>
              <a href="/admin.php/Commerce/index">商业保理</a>
            </li>
            <li <?php if(($current == 'property')): ?>class="active"<?php endif; ?>>
              <a href="/admin.php/Property/index">资产管理</a>
            </li>
            <li <?php if(($current == 'treasure')): ?>class="active"<?php endif; ?>>
              <a href="/admin.php/Treasure/index">财富中心</a>
            </li>
            <li <?php if(($current == 'program')): ?>class="active"<?php endif; ?>>
              <a href="/admin.php/Program/index">解决方案</a>
            </li>
            <li <?php if(($current == 'product')): ?>class="active"<?php endif; ?>>
              <a href="/admin.php/Product/index">产品中心</a>
            </li>
            <li <?php if(($current == 'fengkong')): ?>class="active"<?php endif; ?>>
              <a href="/admin.php/Fengkong/index">风控体系</a>
            </li>
            <li <?php if(($current == 'news')): ?>class="active"<?php endif; ?>>
              <a href="/admin.php/News/index">新闻动态</a>
            </li>
            <li <?php if(($current == 'financial')): ?>class="active"<?php endif; ?>>
              <a href="/admin.php/Financial/index">金融课堂</a>
            </li>
            <li <?php if(($current == 'download')): ?>class="active"<?php endif; ?>>
              <a href="/admin.php/Download/index">下载中心</a>
            </li>
             <li <?php if(($current == 'dinghe')): ?>class="active"<?php endif; ?>>
              <a href="/admin.php/Dinghe/index">走进鼎赫</a>
            </li>
            <li <?php if(($current == 'user')): ?>class="active"<?php endif; ?>>
              <a href="/admin.php/public/user">用户管理（后台）</a>
            </li>
            <li <?php if(($current == 'register')): ?>class="active"<?php endif; ?>>
              <a href="/admin.php/public/register">注册用户（前台）</a>
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
	<h1 class="page-header">下载中心-<?php if($list['id']): ?>编辑表格<?php else: ?>增加表格<?php endif; ?></h1>
	<a class="btn btn-primary" href="/admin.php/Download/index">返回列表</a>

	<form class="form-horizontal" role="form"  id="myprofile" enctype="multipart/form-data"  method="POST" style="margin-top:10px">
		<div class="form-group">
			<label for="input-name" class="col-sm-1 control-label">名称</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="input-name" name="name" required="" value="<?php echo ($list["name"]); ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="input-name" class="col-sm-1 control-label">图标</label>
			<div class="col-sm-4">
				<table class="table" >
					<tr>
						<td><img src="/public/index/images/page5_02.png"></td>
						<td><img src="/public/index/images/page5_03.png"></td>
						<td><img src="/public/index/images/page5_04.png"></td>
						<td><img src="/public/index/images/page5_05.png"></td>
						<td><img src="/public/index/images/page5_06.png"></td>
						<td><img src="/public/index/images/page5_07.png"></td>
						<td><img src="/public/index/images/page5_08.png"></td>
					</tr>
					<tr>
						<td align="center"><input type="radio" id="img_radio" name="img_radio" required="required" value="page5_02.png" <?php if($list['img_radio'] == 'page5_02.png'): ?>checked<?php endif; ?>></td>
						<td align="center"><input type="radio" id="img_radio" name="img_radio" required="required" value="page5_03.png" <?php if($list['img_radio'] == 'page5_03.png'): ?>checked<?php endif; ?>></td>
						<td align="center"><input type="radio" id="img_radio" name="img_radio" required="required" value="page5_04.png" <?php if($list['img_radio'] == 'page5_04.png'): ?>checked<?php endif; ?>></td>
						<td align="center"><input type="radio" id="img_radio" name="img_radio" required="required" value="page5_05.png" <?php if($list['img_radio'] == 'page5_05.png'): ?>checked<?php endif; ?>></td>
						<td align="center"><input type="radio" id="img_radio" name="img_radio" required="required" value="page5_06.png" <?php if($list['img_radio'] == 'page5_06.png'): ?>checked<?php endif; ?>></td>
						<td align="center"><input type="radio" id="img_radio" name="img_radio" required="required" value="page5_07.png" <?php if($list['img_radio'] == 'page5_07.png'): ?>checked<?php endif; ?>></td>
						<td align="center"><input type="radio" id="img_radio" name="img_radio" required="required" value="page5_08.png" <?php if($list['img_radio'] == 'page5_08.png'): ?>checked<?php endif; ?>></td>
					</tr>
			</table>
			</div>
		</div>
		<div class="form-group">
			<label for="input-name" class="col-sm-1 control-label">上传表格</label>
			<div class="col-sm-4">
	      		<input type="file" name="Filedata" class="form-control" <?php if(!$list['table_link']): ?>required="required"<?php endif; ?>>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-1 col-sm-10">
			<td class="text">
				<input type="hidden" name="id" value="<?php echo ($list["id"]); ?>">
				<input type="submit" class="btn btn-primary" value="提交"> 
			</div>
		</div>
	</form>
</div>   
 
</div>
</body>
</html>