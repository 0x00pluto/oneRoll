<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="main-content clearfix">
<?php include templates("member","left");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-setUp.css"/>
<link href="<?php echo G_TEMPLATES_STYLE; ?>/js/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo G_TEMPLATES_STYLE; ?>/js/demo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/jquery.Validform.min.js"></script>
<script type="text/javascript">
$(function(){		
	var demo=$(".tel_verification").Validform({
		tiptype:3,		
	});
});
</script>

<div class="R-content">
	<div class="member-t"><h2>手机验证</h2><a href="javascript:history.go(-1);" class="blue">&lt;&lt; 返回</a></div>
	<div class="tel_verification">
		<div class="prompt orange">请完成手机验证，验证手机不仅能加强账户安全，快速找回密码，还会在您成功云购到商品后及时通知您！<em></em></div>	
		<div id="divChecking" class="verification_code" style="display: block;">
			<h4 id="sendok">验证短信已发送到您的手机<span><?php echo $member['mobile']; ?></span>，请注意查收。<a href="<?php echo WEB_PATH; ?>/member/home/mobilechecking">更换手机号</a></h4>
			<div class="text_verification_code">
			<form method="post" action="<?php echo WEB_PATH; ?>/member/home/mobilecheck">
				<span class="text">输入验证码：</span>
				<input id="txtMobileSN" type="text" name="mobile" class="tel" maxlength="11">
				<div class="back">
					<p>
						2分钟后未收到手机验证码，请点击重新发送</p>
					<input id="btnSendSN" onclick="javascript:sendmobile();" type="button" value="重新发送<?php echo $time; ?>" disabled=1>
				</div>
				<div class="value">
					<input id="butSaveSubmit" type="submit" name="submit" value="提交" class="bluebut">
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
var i = <?php echo $time; ?>;
var senda=document.getElementById('btnSendSN');
setInterval(function(){if(i>0){
	senda.value = '重新发送'+i;i--;}else{senda.value = '重新发送';senda.disabled=0;}
},1000);

function sendmobile(){
	window.location.href="<?php echo WEB_PATH; ?>/member/home/sendmobile";
}

</script>		
</div>
<?php include templates("index","footer");?>