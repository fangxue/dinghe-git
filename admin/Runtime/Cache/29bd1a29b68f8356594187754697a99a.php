<?php if (!defined('THINK_PATH')) exit();?></left>
<block name="main">
<link rel="stylesheet" href="/public/admin/css/error.css">
<div class="container-error" style="margin: 97px auto 0px;">
	<div class="contentHeader"></div>
	<!-- start: contentMiddle -->
	<div class="contentMiddle clear">
		<!-- start: leftContent -->
		<!-- <div class="leftContent">
			<div class="smiley"></div>
		</div> -->
		<!-- end: leftContent -->
		<!-- start: contentMiddle -->
		<div class="rightContent">
			<div class="mark-header"></div>
			<h1>成功了...</h1>
			<form class="form-signin" action="__URL__/checkLogin" method="post" >
				<h2 class="form-signin-heading">
				<?php if(isset($message)): ?><p class="success"><?php echo($message); ?></p>
				<?php else: ?>
				<p class="error"><?php echo($error); ?></p><?php endif; ?>
				</h2>
				
				
				<p class="detail"></p>
				<p class="jump">
				<a id="href" href="<?php echo($jumpUrl); ?>"></a>
				<script type="text/javascript">
				(function(){
				var wait = document.getElementById('wait'),href = document.getElementById('href').href;
				var interval = setInterval(function(){
					location.href = href;
				}, 1000);
				})(); 
				</script>
		 	</form>
		 	<div class="mark-footer"></div>
		</div>
		<!-- end: contentMiddle -->
	</div>
	<!-- end: contentMiddle -->
	<div class="contentFooter"></div>
	<!-- start: footerMenu -->
	<!-- <div class="footerMenu">
		<ul>
			<li><a href="#">Home</a></li><li>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</li>
			<li><a href="#">About</a></li><li>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</li>
			<li><a href="#">Products</a></li><li>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</li>
			<li><a href="#">Contact</a></li><li>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</li>
			<li><a href="#">Support</a></li>
		</ul>
	</div> -->
	<!-- end: footerMenu -->
</div>