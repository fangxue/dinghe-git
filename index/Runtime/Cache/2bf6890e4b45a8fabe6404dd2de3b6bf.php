<?php if (!defined('THINK_PATH')) exit();?></left>
<block name="main">
<link rel="stylesheet" href="/public/index/css/error.css">
<div class="container-error" style="margin: 97px auto 0px;">
	<div class="errorLabel"></div>
	<div class="contentHeader"></div>
	<div class="contentMiddle clear">
		<div class="rightContent">
			<div class="mark-header"></div>
			<h1>出错了...</h1>
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
                    var wait = document.getElementById('wait'),href = document.getElementById('href').getAttribute('href');
                    if(href != 'no'){
                        var interval = setInterval(function(){
                            location.href = href;
                        }, 1000);
                    }
                    return false;
                }());
				</script>
		 	<div class="mark-footer"></div>
		</div>
	</div>
	<div class="contentFooter"></div>
</div>