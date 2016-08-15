<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><div class="index_foot clearfix">
	<div class="index_foot_top">
		<div class="index_foot_top_cont">
			<div class="index_foot_top_cont1">
			</div>
			<div class="index_foot_top_cont2">
			</div>
			<div class="index_foot_top_tiem">
				<div id="clock_content">
	               <div class="main" id="biaopan">
		           <div id="timeLabel"></div>
		           <div id="hour"></div>
		           <div id="minute"></div>
				   <div id="second"></div>
	               </div>
                </div>
			</div>
			<div class="index_foot_top_cont3">
			</div>
			<div class="index_foot_top_cont4">
			</div>
		</div>
	</div>
	<div class="index_foot_nav"  id="foot_nav">
		<ul>
			<li class="foot_nav_li">
				<div class="foot_nav_img"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/index_foot_nav_zn.png" /></div>
				<div class="index_foot_nav_1">
					<b>新手指南</b>
					<ul>
						<li><a href="<?php echo WEB_PATH; ?>/help/1">新手指引</a></li>
						<li><a href="<?php echo WEB_PATH; ?>/help/2">常见问题</a></li>
						<li><a href="<?php echo WEB_PATH; ?>/help/3">服务协议</a></li>
					</ul>
				</div>
			</li>
			<li class="foot_nav_li">
				<div class="foot_nav_img"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/index_foot_nav_bz.png" /></div>
				<div class="index_foot_nav_2">
					<b>商品保障</b>
					<ul>
						<li><!--<a href="<?php echo WEB_PATH; ?>/help/4">-->官方渠道</a></li>
						<li><!--<a href="<?php echo WEB_PATH; ?>/help/5">-->正牌授权</a></li>
						<li><!--<a href="<?php echo WEB_PATH; ?>/help/6">-->无忧退换</a></li>
					</ul>
				</div>
			</li>
			<li class="foot_nav_li">
				<div class="foot_nav_img"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/index_foot_nav_ps.png" /></div>
				<div class="index_foot_nav_3">
					<b>用户保障</b>
					<ul>
						<li><!--<a href="<?php echo WEB_PATH; ?>/help/7">-->监管体系</a></li>
						<li><!--<a href="<?php echo WEB_PATH; ?>/help/8">-->正品保障</a></li>
						<li><!--<a href="<?php echo WEB_PATH; ?>/help/9">-->安全支付</a></li>
						</ul>
				</div>
			</li>
			<li class="foot_nav_li">
				<div class="foot_nav_img"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/index_foot_nav_zf.png" /></div>
				<div class="index_foot_nav_4">
					<b>支付保障</b>
					<ul>
						<li><!--<a href="<?php echo WEB_PATH; ?>/help/29">-->微信支付</a></li>
						<li><!--<a href="<?php echo WEB_PATH; ?>/help/30">-->安全</a></li>
						<li><!--<a href="<?php echo WEB_PATH; ?>/help/31">-->快捷</a></li>
						<li><!--<a href="<?php echo WEB_PATH; ?>/help/32">-->高效</a></li>
					</ul>
				</div>
			</li>
			<li class="foot_nav_li">
				<div class="foot_nav_img"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/index_foot_nav_xs.png" /></div>
				<div class="index_foot_nav_5">
					<b>真实诚信</b>
					<ul>
						<li><!--<a href="<?php echo WEB_PATH; ?>/help/29">-->信息公开</a></li>
						<li><!--<a href="<?php echo WEB_PATH; ?>/help/30">-->开奖公平</a></li>
						<li><!--<a href="<?php echo WEB_PATH; ?>/help/31">-->开奖公正</a></li>
					</ul>
				</div>
			</li>
		</ul>
	</div>
	
    <div class="index_foot_copy">
      <ul>
        <li class="index_foot_ga"><a href="http://www.jnga.gov.cn/" target="_blank"></a></li>
        <li class="index_foot_ba"><a href="http://www.miitbeian.gov.cn/publish/query/indexFirst.action" target="_blank"></a></li>
        <li class="index_foot_jb"><a href="http://www.12377.cn" target="_blank"></a></li>
        <li class="index_foot_xh"><a href="http://www.isc.org.cn" target="_blank"></a></li>
        <li class="index_foot_bj"><a href="http://www.cyberpolice.cn" target="_blank"></a></li>
		<li class="index_foot_bd"><a  target="_blank"></a></li>
      </ul>
      <p>购了么 版权所有 @ 2015-2016 鲁ICP备16023090号-1 </p>
    </div>

</div>
<div class="index_right">
	<div id="divRighTool" class="index_right_box">
		<ul>
			<li class="index_right_gwc"><a id="btnMyCart" href="<?php echo WEB_PATH; ?>/member/cart/cartlist" target="_blank"><div class="index_right_cont">购物车</div><i></i><s></s><em>1</em></a></li>
			<li class="index_right_kf"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo _cfg("qq"); ?>&site=qq&menu=yes" target="_blank" ><div class="index_right_cont">在线客服</div><i></i></a></li>
			<li class="index_right_wx"><a href="javascript:;"><div class="index_right_cont index_right_weixin"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/weixin.jpg" width="100" height="100" />关注微信</div><i></i></a></li>
			<!--<li class="index_right_app"><a href="#"><div>下载APP</div><i></i></a></li>-->
			<li class="index_right_sc"><a id="btnFavorite" href="javascript:;"><div class="index_right_cont">收藏本站</div><i></i></a></li>
			<li class="index_right_up"><a id="gototop" href="javascript:;"><div class="index_right_cont">返回顶部</div><i></i></a></li>
		</ul>
	</div>
</div>
<script>
$(function(){
	$(window).scroll(function() {
        if ($(window).scrollTop() > 500)
            $('div.index_right').show();
        else
            $('div.index_right').hide();
    });
	$("#gototop").click(function(){
		$("html,body").animate({scrollTop:0},500);
	});
	$("#btnFavorite,#addSiteFavorite").click(function(){
		var ctrl=(navigator.userAgent.toLowerCase()).indexOf('mac')!=-1?'Command/Cmd': 'CTRL';
		if(document.all){
			window.external.addFavorite('<?php echo G_WEB_PATH; ?>','<?php echo _cfg("web_name"); ?>');
		}
		else if(window.sidebar){
		   window.sidebar.addPanel('<?php echo _cfg("web_name"); ?>','<?php echo G_WEB_PATH; ?>', "");
		}else{ 
			alert('您可以通过快捷键' + ctrl + ' + D 加入到收藏夹');
		}
    });
});
</script>
<!--
<script type= "text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/time.js"></script>
-->
<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
	//**滚动**//
	jQuery(".index_body_zxjx_cont").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,scroll:2,vis:2,trigger:"click"});
	jQuery(".index_body_tjsp_cont").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",scroll:1,vis:5,trigger:"click"});
	jQuery(".index_body_hjjl").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"top",autoPlay:true,scroll:1,vis:4,trigger:"click"});
	jQuery(".index_body_cyjl").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"top",autoPlay:true,scroll:1,vis:4,trigger:"click"});
	jQuery(".index_body_zrjp_Slider").slide({mainCell:".bd ul",effect:"left",autoPlay:true});
	
	$(".index_foot_nav ul li").each(function(){
	$(this).hover(function(){
		$(this).find(".foot_nav_img").animate({top:"-185px"},500);
		},function(){
		$(this).find(".foot_nav_img").animate({top:"0px"},500);
			})
	})
		
</script>
<!--钟表-->
<script>
        function Clock() {
//定义属性
            this.main = this.$("biaopan");
            this.timeLabel = this.$("timeLabel");
            this.hour = this.$("hour");
            this.minute = this.$("minute");
            this.second = this.$("second");
            this.nowHour = null;
            this.nowMinute = null;
            this.nowSecond = null;
            this.timer = null;
            var _this = this;
//初始化函数
            var init = function () {
                _this.getNowTime();
                _this.initClock();
                _this.InterVal();
            }
            init();
        }
        Clock.prototype.$ = function (id) {
            return document.getElementById(id)
        }
        Clock.prototype.CreateKeDu = function (className, deg, translateWidth) {
            var Pointer = document.createElement("div");
            Pointer.className = className
            Pointer.style.transform = "rotate(" + deg + "deg) translate(" + translateWidth + "px)";
            this.main.appendChild(Pointer);
        }
        Clock.prototype.getNowTime = function () {
            var now = new Date();
            this.nowHour = now.getHours();
            this.nowMinute = now.getMinutes();
            this.nowSecond = now.getSeconds();
        }
        Clock.prototype.setPosition = function () {
            this.second.style.transform = "rotate(" + (this.nowSecond * 6 - 90) + "deg)";
            this.minute.style.transform = "rotate(" + (this.nowMinute * 6 + 1 / 10 * this.nowSecond - 90) + "deg)";
            this.hour.style.transform = "rotate(" + (this.nowHour * 30 + 1 / 2 * this.nowMinute + 1 / 120 * this.nowSecond - 90) + "deg)";
        }
        Clock.prototype.initClock = function () {

            /*for (var index = 0; index < 4; index++) {
                this.CreateKeDu("hourPointer", index * 90, 23);
            }*/
            for (var index = 0; index < 12; index++) {
                this.CreateKeDu("minuterPointer", index * 30, 28);
            }
            this.setPosition();
        }
        Clock.prototype.InterVal = function () {
            clearInterval(this.timer);
            var _this = this;
            this.timer = setInterval(function () {
                _this.getNowTime();
                _this.second.style.transform = "rotate(" + (_this.nowSecond * 6 - 90) + "deg)";
                _this.minute.style.transform = "rotate(" + (_this.nowMinute * 6 + 1 / 10 * _this.nowSecond - 90) + "deg)";
                _this.hour.style.transform = "rotate(" + (_this.nowHour * 30 + 1 / 2 * _this.nowMinute + 1 / 120 * _this.nowSecond - 90) + "deg)";
//                _this.timeLabel.innerHTML = _this.nowHour + ":" + _this.nowMinute + ":" + _this.nowSecond;
            }, 1000);
        }
        
            new Clock();
        
   </script>
   <!--钟表-->
</body>


</html>