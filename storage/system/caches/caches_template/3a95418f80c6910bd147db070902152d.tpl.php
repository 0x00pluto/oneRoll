<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><div class="detail_main"> 
	<div class="kj_main_l">
		<div class="kj_main_l_pic">
			<img width="324" height="314" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $item['thumb']; ?>" /> 
		</div>
		<div class="kj_main_l_haoma">
			<div class="kj_main_l_haoma_title"><span style="font-weight:normal">(第<?php echo $item['qishu']; ?>期)</span> <?php echo $item['title']; ?> <span class="txt-red" title="<?php echo $item['title2']; ?>"> <?php echo $item['title2']; ?> </span></div>
			<div class="kj_main_l_haoma_djsbg">
				<div class="kj_main_l_haoma_djs">
					<div id="divLotteryTimer" class="m-detail-main-wrap m-detail-main-will"> 
						 <div class="m-detail-main-will-countdown"> 
							  <b id="liMinute1" class="count-m0 w-num w-num-9">9</b>
							  <b id="liMinute2" class="count-m1 w-num w-num-9">9</b>
							  <b class="count_dian"></b>
							  <b id="liSecond1" class="count-s0 w-num w-num-9">9</b>
							  <b id="liSecond2" class="count-s1 w-num w-num-9">9</b>
							  <b class="count_dian"></b>
							  <b id="liMilliSecond1" class="count-ms0 w-num w-num-9">9</b>
							  <b id="last" class="count-ms1 w-num w-num-9">9</b> 
						 </div> 
					</div>
					<div id="divLotteryTiming" class="m-detail-main-wrap m-detail-main-will" style="display:none;"> 
						<img src="<?php echo G_TEMPLATES_IMAGE; ?>/kaijiang.gif" />
					</div>
				</div>
			</div>
		</div>
		<div class="djs_main_b">
		<div class="djs_main_b_rule">
			<ul class="txt">
				<li>
					<span class="title"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/kj_main_b_jsgs.png" /></span>
					<div class="formula">
						<div class="box red-box"><b class="txt-red">?????</b><br/><b class="txt-red" style="font-size:12px">本期幸运号码</b></div><div class="operator">=</div>
						<div class="box gray-box"><b class="txt-red"><?php echo $item['cp_num']; ?></b><br/>该商品最后购买时间前，网站所有商品最后100条夺宝时间
															<div class="more-box">
									<i class="ico ico-arrow ico-arrow-yellow"></i>
									<div class="yellow-box f-breakword">
										该商品最后购买时间前， 网站所有商品最后100条夺宝时间<span><!--<a href="javascript:void(0)" class="time-detail-main-codes-viewWinnerCodesBtn">点击查看</a>--></span>
									</div>
								</div>
						</div>
						<div class="operator" title="取余">%</div><div class="box"><b class="txt-red"><?php echo $item['zongrenshu']; ?></b><br/>该奖品总需人次</div><div class="operator" title="相加">+</div><div class="box"><b class="txt-red">10000001</b><br/>原始数</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	</div>
	<div class="kj_main_r">
			<div class="kj_main_r_zxyq"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/kj_main_r_zxyq.jpg" /></div>
			<div class="kj_main_r_cont">
				<div class="kj_qgjp_img"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $zx_shop['id']; ?>" title="<?php echo $zx_shop['title']; ?>" target="_blank"><img alt="<?php echo $zx_shop['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $zx_shop['thumb']; ?>"/></a></div>
				<p class="kj_qgjp_title"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $zx_shop['id']; ?>" title="<?php echo $zx_shop['title']; ?>" target="_blank">(第<?php echo $zx_shop['qishu']; ?>期) <?php echo $zx_shop['title']; ?></a></p>
				<p class="kj_qgjp_price">总需：<?php echo $zx_shop['zongrenshu']; ?>人次</p>
				<div class="progressBar">
					<?php 
					 $p_width=round($zx_shop['canyurenshu']/$zx_shop['zongrenshu']*100);
					  ?>
					<p class="progressBar_wrap"><span class="progressBar_bar" style="width:<?php echo $rq_width; ?>%;"></span></p>
					<ul class="progressBar_txt">
						<li class="progressBar_txt_l">
							<p><b><?php echo $zx_shop['canyurenshu']; ?></b></p>
							<p>已参与人次</p>
						</li>
						<li class="progressBar_txt_r">
							<p><b><?php echo $zx_shop['zongrenshu']-$zx_shop['canyurenshu']; ?></b></p>
							<p>剩余人次</p>
						</li>
					</ul>
				</div>
				<div class="kj_body_zrjp_Button">
					<a href="<?php echo WEB_PATH; ?>/goods/<?php echo $zx_shop['id']; ?>">立即抢购 ></a>
				</div>
			</div>
		</div>
	
</div>


<script type="text/javascript">
function show_date_time_location(){
	window.setTimeout(function(){
		$("#divLotteryTimer").hide();
		$("#divLotteryTiming").show();	
		$.post("<?php echo WEB_PATH; ?>/api/getshop/lottery_shop_set/",{"lottery_sub":"true","gid":<?php echo $item['id']; ?>},null);
		window.setTimeout(function(){window.location.href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $item['id']; ?>";},5000);},1000);}
function show_date_time(endTime,obj){	
	if(!this.endTime){this.endTime=endTime;this.obj=obj;}	
	rTimeout = window.setTimeout("show_date_time()",30);	
	timeold = this.endTime-(new Date().getTime());
	if(timeold <= 0){		
		$("#liMinute1").attr("class","count-m0 w-num w-num-0");
		$("#liMinute2").attr("class","count-m1 w-num w-num-0");
		$("#liSecond1").attr("class","count-s0 w-num w-num-0");
		$("#liSecond2").attr("class","count-s1 w-num w-num-0");
		$("#liMilliSecond1").attr("class","count-ms0 w-num w-num-0");
		$("#last").attr("class","count-ms1 w-num w-num-0");	
		rTimeout && clearTimeout(rTimeout);	
		show_date_time_location();	
		return;
	}	
	sectimeold=timeold/1000
	secondsold=Math.floor(sectimeold); 
	msPerDay=24*60*60*1000
	e_daysold=timeold/msPerDay 	
	daysold=Math.floor(e_daysold); 				//天	
	e_hrsold=(e_daysold-daysold)*24; 
	hrsold=Math.floor(e_hrsold); 				//时
	e_minsold=(e_hrsold-hrsold)*60;	
	//分
	minsold=Math.floor((e_hrsold-hrsold)*60);
	minsold = (minsold<10?'0'+minsold:minsold)
	minsold = new String(minsold);
	minsold_1 = minsold.substr(0,1);
	minsold_2 = minsold.substr(1,1);	

	//秒
	e_seconds = (e_minsold-minsold)*60;	
	seconds=Math.floor((e_minsold-minsold)*60);
	seconds = (seconds<10?'0'+seconds:seconds)
	seconds = new String(seconds);
	seconds_1 = seconds.substr(0,1);
	seconds_2 = seconds.substr(1,1);	
	//毫秒	
	ms = e_seconds-seconds;
	ms = new String(ms)
	ms_1 = ms.substr(2,1);
	ms_2 = ms.substr(3,1);

	if(hrsold>0)
	{
		$("#liMinute1").attr("class","count-m0 w-num w-num-"+hrsold_1);
		$("#liMinute2").attr("class","count-m1 w-num w-num-"+hrsold_2);
		$("#liSecond1").attr("class","count-s0 w-num w-num-"+minsold_1);
		$("#liSecond2").attr("class","count-s1 w-num w-num-"+minsold_2);
		$("#liMilliSecond1").attr("class","count-ms0 w-num w-num-"+seconds_1);
		$("#last").attr("class","count-ms1 w-num w-num-"+seconds_2);
	}
	else
	{
		$("#liMinute1").attr("class","count-m0 w-num w-num-"+minsold_1);
		$("#liMinute2").attr("class","count-m1 w-num w-num-"+minsold_2);
		$("#liSecond1").attr("class","count-s0 w-num w-num-"+seconds_1);
		$("#liSecond2").attr("class","count-s1 w-num w-num-"+seconds_2);
		$("#liMilliSecond1").attr("class","count-ms0 w-num w-num-"+ms_1);
		$("#last").attr("class","count-ms1 w-num w-num-"+ms_2);		
	}
	//this.obj.innerHTML=daysold+"天"+(hrsold<10?'0'+hrsold:hrsold)+"小时"+(minsold<10?'0'+minsold:minsold)+"分"+(seconds<10?'0'+seconds:seconds)+"秒."+ms;
}

$(function(){
	$.ajaxSetup({async:false});
	$.post("/index.php/api/getshop/lottery_shop_get",{"lottery_shop_get":true,"gid":<?php echo $item['id']; ?>,"times":Math.random()},function(sdata){	
	if(sdata!='no'){show_date_time((new Date().getTime())+(parseInt(sdata))*1000,null);}});});
</script>
