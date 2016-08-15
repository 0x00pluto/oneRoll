<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>登录-<?php echo _cfg("web_name"); ?></title>
<link href="<?php echo G_TEMPLATES_STYLE; ?>/js/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo G_TEMPLATES_STYLE; ?>/js/demo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/Comm.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/common.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/details.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/register.css"/>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/JQuery.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/jquery.Validform.min.js"></script>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/passwordStrength-min.js"></script>
</head>
<body>

<div class="login">
	<div class="login_head">
		<ul>			
			<li><a href="<?php echo WEB_PATH; ?>/help/1">帮助中心</a></li>			
			<li>|</li>
			<li><a href="<?php echo G_WEB_PATH; ?>">返回首页</a></li>
			<li><span style="margin-right:30px;">已经是会员？<a id="hylinkLoginPage" class=" Fb" href="<?php echo WEB_PATH; ?>/member/user/login">登录</a></span></li>
		</ul>		
	</div>
	<div class="login_head_logo">
		<a href="<?php echo G_WEB_PATH; ?>" class="login_head_a"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo Getlogo(); ?>" /></a>
		<img class="login_head_img" src="<?php echo G_TEMPLATES_STYLE; ?>/img/branding_logo.gif" />
	</div>
	
	
<div class="login_layout">
		<div class="login_layout_left_1">
		</div>
		<div class="login_layout_right">
		

	<div class="login_Content">
		<form action="" enctype="application/x-www-form-urlencoded" method="post">
		<div class="login_CMobile_Complete">
			<p><?php echo _cfg("web_name"); ?>已向您的手机 <span class="orange"><?php echo $enname; ?></span> 免费发送了一条验证短信，请查看您的手机短信！</p>
			<dl>
				<dt style="width:200px">请输入手机短信收到的验证码：</dt>
				<dd><input id="mobileCode" name="checkcode" class="login_CMobile_Code" type="text"></dd>
				<dd></dd>
			</dl>
			<input type="submit" name="submit" id="btnSubmitRegister" href="javascript:void(0);" class="login_Email_but" value="提交验证" />		
		</div>    		
        </form>
		<div class="login_Explain">
			<h2>没收到验证短信？</h2>
			<p>1.请查看手机的垃圾短信，信息有可能被误认为是垃圾信息。</p>
			<p>2.如果在2分钟后仍未收到验证短信，请点击<button id="retrySend" onclick="javascript:sendmobile();" disabled=1 class="login_SendoutbutClick">重新发送<?php echo $time; ?></button> </p>
			<p>3.如果手机号码不小心输错了或者想换个号码？请点击 <a id="hylinkRegisterPageA" class="blue Fb" href="<?php echo WEB_PATH; ?>/register">重新注册</a></p>
		</div>
	</div>
	
</div>
</div>
</div>







	<div class="login_footer">
		<div class="login_footer_links">
			<ul>
				<?php echo Getheader('foot'); ?>
			</ul>
		</div>
		<div class="copyright"><?php echo _cfg("web_copyright"); ?></div>
	</div>
</div>


</body>
</html>
<script>
	var i = <?php echo $time; ?>;
	var senda=document.getElementById('retrySend');
	setInterval(function(){if(i>0){
		senda.innerHTML = '重新发送'+i;i--;}else{senda.innerHTML = '重新发送';senda.disabled=0;}
	},1000);
	
	function sendmobile(){
		window.location.href="<?php echo WEB_PATH; ?>/member/user/sendmobile/<?php echo $namestr; ?>"
	}
</script>