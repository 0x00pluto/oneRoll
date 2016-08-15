<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/share_new.css"/>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/clipboard.min.js"></script>
<?php 
	$uid = _encrypt(get_user_uid());
 ?>
<div class="index_body">
     <div id="share_up"></div>
    <div id="share_dowm">
		<?php if(!uidcookie('uid')): ?>
                        <div class="login_reg">
                        请先<a href="<?php echo WEB_PATH; ?>/member/user/login">登录</a>或者<a href="<?php echo WEB_PATH; ?>/member/user/register">注册</a>，获取您的专属邀请链接。
			
			<div class="reg-txt">
				还没有<?php echo _cfg('web_name_two'); ?>帐号？<a href="<?php echo WEB_PATH; ?>/member/user/register"><b>立即注册</b></a>
			</div>
		<?php  else: ?>
        <div id="share_dowm_head">
            <ul>
                <li><div id="target">我在这里花1块钱中了一个iPhone 6S！是真的，快来看看吧！<br/><?php echo WEB_PATH; ?>/register/<?php echo $uid; ?></div></li>
                <li><p class="btn-copy" data-clipboard-target="#target"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/YQ_fuzhi.jpg"/></p></li>
                <li><p id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/YQ_fenxiang.jpg" class="bds_more"/></p></li>
            </ul>
        </div>
		<?php endif; ?>
        <div id="share_dowm_foot">
            <div id="share_dowm_foot_left">
                <h2>购了么福分</h2>
                <h1>1000</h1>
                <div>分享好友领取 <br/>可得1000购了么福分，可抵现金哦</div>
                <a><div>分享送福分</div></a>
            </div>
            <div id="share_dowm_foot_right">
                <h2>3%现金提成</h2>
              <div>分享好友领取 <br/>3%现金提成，且永久有效</div>
                <a><div>分享得佣金</div></a>
            </div>
        </div>
        <div id="share_footer">
            
        </div>
        <div id="share_caption">
            <img src="<?php echo G_TEMPLATES_STYLE; ?>/images/YQ_lg.png" alt=""/>
        </div>
    </div>
</div>
    <script>
        var clip=new Clipboard('.btn-copy');
    </script>
    <script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
    <script type="text/javascript" id="bdshell_js"></script>
    <script type="text/javascript">
        document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
    </script>


<?php include templates("index","footer");?>
