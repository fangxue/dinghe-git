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
            <a href="/admin.php/Public/logout" style="margin-left: 1.5em;">退出</a>
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
	<h1 class="page-header">产品中心</h1>
	<table class="table table-hover folder-list">
		<tbody>
			<tr>
				<th style="width:15%">名称</th>
				<th style="width:30%;text-align:center">简介</th>
				<th style="width:35%">操作</th>
			</tr>
			<tr>
				<td>热销理财</td>
				<td id="td1" style="text-align:center"><?php echo ($list[1]); ?></td>
				<td id="td_1">
					<a class="btn btn-default btn-xs" href="javascript:void(0);" data-id="1" id="editor">编辑</a>
				</td>
			</tr>
			<tr>
				<td>限时抢购</td>
				<td id="td2" style="text-align:center"><?php echo ($list[2]); ?></td>
				<td id="td_2">
					<a class="btn btn-default btn-xs" href="javascript:void(0);" data-id="2" id="editor">编辑</a>
				</td>
			</tr>
			<tr>
				<td>固定收益</td>
				<td id="td3" style="text-align:center"><?php echo ($list[3]); ?></td>
				<td id="td_3">
					<a class="btn btn-default btn-xs" href="javascript:void(0);" data-id="3" id="editor">编辑</a>
				</td>
			</tr>
		</tbody>
	</table>
	<table class="table table-hover folder-list" style="margin-top:10px">
		<tbody>
			<tr>
				<th style="width:15%">图标</th>
				<th style="width:30%;text-align:center">链接</th>
				<th style="width:35%">操作</th>
			</tr>
			<tr>
				<td><img src="http://<?php echo ($WebHost); ?>/assets/images/page4_02.png" width="80px"></td>
				<td id="td4" style="text-align:center"><?php echo ($list[4]); ?></td>
				<td id="td_4">
					<a class="btn btn-default btn-xs" href="javascript:void(0);" data-id="4" id="editor">编辑</a>
				</td>
			</tr>
			<tr>
				<td><img src="http://<?php echo ($WebHost); ?>/assets/images/page4_03.png" width="80px"></td>
				<td id="td5" style="text-align:center"><?php echo ($list[5]); ?></td>
				<td id="td_5">
					<a class="btn btn-default btn-xs" href="javascript:void(0);" data-id="5" id="editor">编辑</a>
				</td>
			</tr>
			<tr>
				<td><img src="http://<?php echo ($WebHost); ?>/assets/images/page4_04.png" width="80px"></td>
				<td id="td6" style="text-align:center"><?php echo ($list[6]); ?></td>
				<td id="td_6">
					<a class="btn btn-default btn-xs" href="javascript:void(0);" data-id="6" id="editor">编辑</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>   
</div>
</body>
</html>

<script type="text/javascript">
$(function(){
	$(".table").on("click" , "#editor" , function(){
		var id = $(this).data("id");
		var content = $("#td"+id).html();
		var data = "<input type='text' class='form-control' id='content_"+id+"' name='content_"+id+"' required value='"+content+"'>";
		var data2 = "<a class='btn btn-default btn-xs' href='javascript:void(0);' data-id='"+id+"' id='sure'>确定</a>";
		$("#td"+id).html(data)
		$("#td_"+id).html(data2)


	})

	$(".table").on("click" , "#sure" , function(){
		var id = $(this).data("id");
		var data2 = "<a class='btn btn-default btn-xs' href='javascript:void(0);' data-id='"+id+"' id='editor'>编辑</a>";
		var content = $("#content_"+id).val();
		$.ajax({
				type: 'post',
				url: '/admin.php/Product/add',
				data: {'id': id,'content':content},
				dataType: 'json',
				success: function(msg) {
					$("#td"+id).html(msg.str)
					$("#td_"+id).html(data2)
				}
		});

	})
});
</script>