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
	<h1 class="page-header">风控体系</h1>

	<div id="editor_content">
		<a class="btn btn-primary" href="javascript:void(0);" id="editor">编辑内容</a>
	</div>

	<div id="contentp" style="margin-top:15px;width:80%;line-height:30px;"><?php echo ($list["content"]); ?></div>
	<div id="contentscript" style="margin-top:15px;width:80%;display:none">
	<script id="container" name="content" style="min-height:200px;" type="text/plain"></script>
	</div>
<hr>
	<form class="form-horizontal" role="form"  id="image_form" enctype="multipart/form-data"  method="POST" style="margin-top:10px">
		<div class="form-group">
			<div class="col-sm-4" id="editor_img">
				<input type="button" class="btn btn-primary" value="更改封面" id="upload_image">
	      		<input type="file" name="Filedata" id="Filedata" value="" class="file" style="display:none;">
			</div>
		</div>
		<?php if($list.img): ?><div class="form-group">
			<div class="col-sm-4">
				<img id="show_image"  required="" class="img-thumbnail" src="http://<?php echo ($WebHost); echo ($list["img"]); ?>" >
			</div>
		</div><?php endif; ?>
	</form>

	

</div>
</body>
</html>

<script type="text/javascript">
var WebHost = "<?php echo ($WebHost); ?>";
var ue = UE.getEditor('container');
$(function(){
	$("#editor_content").on("click" , "#editor" , function(){
		content = $("#contentp").html();
		var data = "<a class='btn btn-primary' href='javascript:void(0);' id='sure'>确定</a>";
		$("#contentscript").css("display","block");
		$("#contentp").css("display","none");
		$("#editor_content").html(data);
		UE.getEditor('container').setContent(content, true);
	})
	$("#editor_content").on("click" , "#sure" , function(){
		var data = "<a class='btn btn-primary' href='javascript:void(0);' id='editor'>编辑</a>";
		var content = UE.getEditor('container').getContent();
		$.ajax({
				type: 'post',
				url: '/Fengkong/add',
				data: {'content': content},
				dataType: 'json',
				success: function(msg) {
					$("#contentscript").css("display","none");
					$("#contentp").css("display","block");
					UE.getEditor('container').execCommand('cleardoc')
					$("#contentp").html(msg.str)
					$("#editor_content").html(data)

				}
		});
	});

	$("#Filedata").change(function(){
		$("#image_form").submit();
	});

	$("#upload_image").click(function(){

		$("#Filedata").click();

	});

	$("#image_form").validate({
		submitHandler: function(form)  {
			$("#image_form").ajaxSubmit({
				type:'POST',
				url:"/Fengkong/uploadImage",
				dataType: "json",
				success:function(res){
					$("#show_image").attr("src","http://"+WebHost+res.str)
				}

			});
		}
	});
});
</script>