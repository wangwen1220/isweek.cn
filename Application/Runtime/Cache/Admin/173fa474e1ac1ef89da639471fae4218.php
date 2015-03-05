<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>系统后台</title>
		<meta http-equiv="X-UA-Compatible" content="chrome=1,IE=edge" />
		<meta name="robots" content="noindex,nofollow">
		<link href="/statics/css/admin_login.css<?php echo ($js_debug); ?>" rel="stylesheet" />
		<style>
			#login_btn_wraper{
				text-align: center;
			}
			#login_btn_wraper .tips_success{
				color:#fff;
			}
			#login_btn_wraper .tips_error{
				color:#DFC05D;
			}
		</style>
		<script>
			if (window.parent !== window.self) {
					document.write = '';
					window.parent.location.href = window.self.location.href;
					setTimeout(function () {
							document.body.innerHTML = '';
					}, 0);
			}
		</script>

	</head>
<body>
	<div class="wrap">
		<h1><a href="">工采网</a></h1>
		<form method="post" name="login" action="<?php echo U('public/dologin');?>" autoComplete="off" class="J_ajaxForm">
			<div class="login">
				<ul>
					<li>
						<input class="input" id="J_admin_name" required name="username" type="text" placeholder="帐号名" title="帐号名" />
					</li>
					<li>
						<input class="input" id="admin_pwd" type="password" required name="password" placeholder="密码" title="密码" />
					</li>
					<li>
						<div id="J_verify_code">
							<img class="yanzheng_img" id="code_img" alt="" src="<?php echo U('Api/Checkcode/index','code_len=4&fontSize=25&imageW=200&imageH=60');?>"
							onclick="document.getElementById('code_img').src='<?php echo U('Api/Checkcode/index','code_len=4&fontSize=25&imageW=200&imageH=60');?>&time='+Math.random();"
							style="cursor: pointer;" title="点击获取"/>
						</div>
					</li>
					<li>
						<input class="input" type="text" name="verify" placeholder="请输入验证码" />
					</li>
				</ul>
				<div id="login_btn_wraper">
					<button type="submit" name="submit" class="btn btn_submit J_ajax_submit_btn">登录</button>
				</div>
			</div>
		</form>
	</div>

<script>
var GV = {
	DIMAUB: "/",
	JS_ROOT: "statics/js/",//js版本号
	TOKEN : ''	//token ajax全局
};
</script>
<script src="/statics/js/wind.js"></script>
<script src="/statics/js/jquery.js"></script>
<script type="text/javascript" src="/statics/js/common.js<?php echo ($js_debug); ?>"></script>
<script>
;(function(){
	document.getElementById('J_admin_name').focus();

})();
</script>
</body>
</html>