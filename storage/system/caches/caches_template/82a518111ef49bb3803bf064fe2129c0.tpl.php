<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>

<div class="index_body">
	<div class="list_zkjx">
		<div class="index_body_title"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/index_body_zkjx_title.png" /></div>
		<div class="list_zkjx_cont">
		<?php $ln=1;if(is_array($shoplist)) foreach($shoplist AS $list): ?>
			<?php 
			$p_width=round($list['canyurenshu']/$list['zongrenshu']*100);
			 ?>
			<div class="index_qgjp_item">
				<div class="index_qgjp_img"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $list['id']; ?>" title="<?php echo $list['title']; ?>" target="_blank"> <img width="200px" height="150px" alt="<?php echo $list['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo shopimg($list['id']); ?>" /> </a> </div>
				<p class="index_qgjp_title"><a title="<?php echo $list['title']; ?>" href="<?php echo WEB_PATH; ?>/goods/<?php echo $list['id']; ?>" target="_blank">(第<?php echo $list['qishu']; ?>期) <?php echo $list['title']; ?></a></p>
				<p class="index_qgjp_price">总需：<?php echo $list['zongrenshu']; ?>人次</p>
				<div class="progressBar">
					<p class="progressBar_wrap"><span class="progressBar_bar" style="width:<?php echo $p_width; ?>%;"></span></p>
					<ul class="progressBar_txt">
						<li class="progressBar_txt_l">
							<p><b><?php echo $list['canyurenshu']; ?></b></p>
							<p>已参与人次</p>
						</li>
						<li class="progressBar_txt_r">
							<p><b><?php echo $list['zongrenshu']-$list['canyurenshu']; ?></b></p>
							<p>剩余人次</p>
						</li>
					</ul>
				</div>
				<div class="index_body_zrjp_Button">
					<a href="<?php echo WEB_PATH; ?>/goods/<?php echo $list['id']; ?>" target="_blank">立即云购 ></a>
				</div>
			</div>
			<?php  endforeach; $ln++; unset($ln); ?> 
		</div>
	</div>
	<div class="list_zxjx">
		<div class="index_body_title"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/index_body_zxjx_title.png" /></div>
		<div class="list_zxjx_body">
			<?php $ln=1;if(is_array($shopqishu)) foreach($shopqishu AS $qishu): ?>
				<?php 

					$qishu['q_user'] = unserialize($qishu['q_user']);
					$ip_arr = explode(",",$qishu['q_user']['user_ip']);
					if($ip_arr[0]){
						$address="(".$ip_arr[0].")";
					}elseif($ip_arr[1]){
						$address="(IP:".$ip_arr[1].")";
					}else{
						$address="";
					}
				 ?>	
			<div class="list_zxjx_cont">
				<div class="list_zxjx_cont_img"><a href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $qishu['id']; ?>" target="_blank"><img class="" style="min-height: 40px; min-width: 40px;" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $qishu['thumb']; ?>" height="150" width="200" /></a></div>
				<div class="list_zxjx_conts">
					<div class="list_zxjx_cont_title"><a href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $qishu['id']; ?>" target="_blank">(第<?php echo $qishu['qishu']; ?>期) <?php echo $qishu['title']; ?></a></div>
					<?php if($qishu['q_user_code']): ?>
					<div class="list_zxjx_cont_cont">
						<p>恭喜<a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($qishu['q_uid']); ?>" title="<?php echo get_user_name($qishu['q_user']); ?>(ID:<?php echo $qishu['q_uid']; ?>)"><?php echo get_user_name($qishu['q_user']); ?></a><span class="txt-green" style="display:none">(IP:<?php echo $qishu['q_user']['user_ip']; ?>)</span>获得该奖品</p>
						<p>幸运中奖号码：<b class="txt-red"><?php echo $qishu['q_user_code']; ?></b></p>
						<p>本期参与：<b class="txt-red"><?php echo get_user_goods_num($qishu['q_uid'],$qishu['id']); ?></b>人次</p>
						<p>揭晓时间：<span title="<?php echo date('Y年m月d日 h:i',$qishu['q_end_time']); ?>"><?php echo date('Y年m月d日 h:i',$qishu['q_end_time']); ?></span></p>
					</div>
					<?php  else: ?>
					<div class="list_countdown_nums">
						<p class="list_countdown_nums_jx">揭晓倒计时</p>
						<p class="list_countdown_nums_p" data-pro="countdown"><b class="liMinute1">9</b><b class="liMinute2">9</b>:<b class="liSecond1">9</b><b class="liSecond2">9</b>:<b class="liMilliS1">9</b><b class="liMilliS2">9</b></p>
					</div>
					<?php endif; ?>
					<div class="list_zxjx_cont_button"><a href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $qishu['id']; ?>" target="_blank">查看详情 〉</a></div>
				</div>
			</div>
			<?php  endforeach; $ln++; unset($ln); ?>
		</div>
	</div>
</div>

<?php include templates("index","footer");?>

<script type="text/javascript">	 
function show_date_time_location(){
//		$("#divLotteryTimer").hide();
//		$("#divLotteryTiming").show();	
		var djs='<?php echo $djs_id; ?>';
		$.post("<?php echo WEB_PATH; ?>/api/getshop/lottery_shop_set/",{"lottery_sub":"true","gid":"<?php echo $djs_id; ?>","times":Math.random()},function(data){
			if(data>0)
			{
				if(djs)
				{
					window.location.href="<?php echo WEB_PATH; ?>/goods_lottery";
				}
			}
			else
			{
				window.setTimeout("show_date_time_location()",1000);
			}
		});
	//	window.setInterval(get_cp, 1000); 
		
}

function show_date_time(endTime,obj){	
	if(!this.endTime){this.endTime=endTime;this.obj=obj;}	
	rTimeout = window.setTimeout("show_date_time()",30);	
	timeold = this.endTime-(new Date().getTime());
	//alert(timeold);
	if(timeold <= 0){		
		$(".list_countdown_nums_p").html("开奖中，请稍等...");
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
	hrsold = (hrsold<10?'0'+hrsold:hrsold)
	hrsold = new String(hrsold);
	hrsold_1 = hrsold.substr(0,1);
	hrsold_2 = hrsold.substr(1,1);
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
		$(".liMinute1").html(hrsold_1);
		$(".liMinute2").html(hrsold_2);
		$(".liSecond1").html(minsold_1);
		$(".liSecond2").html(minsold_2);
		$(".liMilliS1").html(seconds_1);
		$(".liMilliS2").html(seconds_2);
	}
	else
	{
		$(".liMinute1").html(minsold_1);
		$(".liMinute2").html(minsold_2);
		$(".liSecond1").html(seconds_1);
		$(".liSecond2").html(seconds_2);
		$(".liMilliS1").html(ms_1);
		$(".liMilliS2").html(ms_2);		
	}
	//this.obj.innerHTML=daysold+"天"+(hrsold<10?'0'+hrsold:hrsold)+"小时"+(minsold<10?'0'+minsold:minsold)+"分"+(seconds<10?'0'+seconds:seconds)+"秒."+ms;
}

$(function(){
	$.ajaxSetup({async:false});
	$.post("<?php echo WEB_PATH; ?>/api/getshop/lottery_shop_get",{"lottery_shop_get":true,"gid":"<?php echo $djs_id; ?>","times":Math.random()},function(sdata){	
	if(sdata!='no'){show_date_time((new Date().getTime())+(parseInt(sdata))*1000,null);}});});
</script>