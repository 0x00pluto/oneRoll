<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录-<?php echo _cfg("web_name"); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/login_new.css"/>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/JQuery.js"></script>
<link href="<?php echo G_TEMPLATES_STYLE; ?>/js/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/jquery.Validform.min.js"></script>
</head>
<body>
 <script type="text/javascript">
$(function(){		
	var demo=$(".registerform").Validform({
		tiptype:2,
	});	
})
</script>
</head>

<body>
<div class="reg_top">
	<div class="reg_logo"><a href="<?php echo G_WEB_PATH; ?>"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/logo_login.png" /></a></div>
	<div class="reg_help"><p style="width:120px; margin-right:8px;">已经是会员？<a href="<?php echo WEB_PATH; ?>/member/user/login">[请登录]</a></p><p><a href="<?php echo G_WEB_PATH; ?>">返回首页</a>&nbsp;&nbsp;&nbsp;&nbsp;|</p><p><a href="<?php echo WEB_PATH; ?>/help/1">帮助中心</a></p></div>
	<div class="reg_safe">
		<p class="reg_safe1">正品保障</p><p class="reg_safe2">全国包邮</p><p class="reg_safe3">安全支付</p><p class="reg_safe4">全国联保</p>
	</div>
</div>
<div class="login_body">
	<div class="login_body_cont">
		<div class="login_body_cont_box">
			<div class="reg_body_cont_title"><b>/登录/</b><span>USER LOGIN</span></div>
			<form class="registerform" method="post" action="">
				<ul>				
					<li class="click">
						<span>账号：</span>
						<input class="text_password" name="username" type="text"  datatype="m | e" nullmsg="请输入您的手机号！" errormsg="请输入正确的手机号" />
					</li>
					<li class="ts"><div class="Validform_checktip">请输入您的手机号</div></li>
					<li>
						<span>密码：</span>					
						<input class="text_password" name="password" type="password"  datatype="*6-20" nullmsg="请输密码，手机绑定过QQ或微信的默认密码为123456" errormsg="密码范围在6~20位之间！"/>
						<span class="fog"><a href="/index.php/member/finduser/findpassword">忘记密码？</a></span>					</li>								
					<li class="ts" id="pwd_ts"><div class="Validform_checktip">请输密码，手机绑定过QQ或微信的默认密码为123456</div></li>
					<li class="end"><input type="button" value="注册" class="login_init" onclick="window.location.href='<?php echo WEB_PATH; ?>/register'"  ><input name="submit" type="submit" value="登录" class="login_init" ></li>
				</ul>

				<?php 
				$conn_cfg = System::load_app_config("connect",'','api');
             ?>
            <?php if($conn_cfg['qq']['off']): ?>
 			<div class="loginQQ">
 				<span id="qq_login_btn">
 					免注册快捷方式登录：
 				</span>
 				<a class="qqdenglu" href="<?php echo G_WEB_PATH; ?>/index.php/api/qqlogin/"><b class="passport-icon1 transparent-png"></b></a>
 				<a class="weixindenglu" href="<?php echo G_WEB_PATH; ?>/index.php/api/wxloginpc/"><b style="background-position: 8px -149px!important;" class="passport-icon1 transparent-png"></b></a>
				
 			</div>

            <?php endif; ?>						
				<input value="<?php echo WEB_PATH; ?>/reg" name="hidurl" type="hidden">
	
				
			</form>
		</div>
	</div>
</div>
<div class="reg_foot">
	<div class="reg_foot_nav">
		<ul>
			<?php echo Getheader('foot'); ?>
		</ul>
	</div>
	<p>购了么 版权所有 @ 2015-2016  鲁ICP备16023090号-1 </p>
</div>
</body>
</html>
