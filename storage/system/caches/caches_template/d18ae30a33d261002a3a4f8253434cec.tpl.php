<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?>﻿<?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/LotteryDetail.css"/>
<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/page.js"></script>
	<div class="dir">
		<div class="dir_cont">
			<a href="<?php echo WEB_PATH; ?>">首页</a> &gt; 
			<a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $item['cateid']; ?>"><?php echo $category['name']; ?></a>  &gt; 
			<a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $item['cateid']; ?>e<?php echo $item['brandid']; ?>"><?php echo $brand['name']; ?></a> &gt; 
			<span class="txt-red">开奖详情</span>
		</div>
	</div>
	<div class="index_body">
    <div class="detail_main"> 
		<div class="kj_main_l">
			<div class="kj_main_l_pic">
				<img width="324" height="314" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $item['thumb']; ?>" /> 
			</div>
			<div class="kj_main_l_haoma">
				<div class="kj_main_l_haoma_title"><span style="font-weight:normal">(第<?php echo $item['qishu']; ?>期)</span> <?php echo $item['title']; ?> <span class="txt-red" title="<?php echo $item['title2']; ?>"> <?php echo $item['title2']; ?> </span></div>
				<div class="kj_main_l_haoma_kjbg">
					<div class="kj_main_l_haoma_djs">
						<div> 
							 <?php $ln=1;if(is_array($q_user_code_arr)) foreach($q_user_code_arr AS $q_code_num): ?><b class="w-num w-num-<?php echo $q_code_num; ?>"><?php echo $q_code_num; ?></b><?php  endforeach; $ln++; unset($ln); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="kj_main_l_cont">
				<div class="kj_main_l_cont_pic">
					<img width="100" height="100" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo get_img($item['q_uid']); ?>" />
				</div>
				<p class="kj_main_l_cont_name">恭喜 <a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($item['q_uid']); ?>" title="<?php echo get_user_name($item['q_uid']); ?>(ID:<?php echo $item['q_uid']; ?>)" class="txt-red"><?php echo get_user_name($item['q_uid']); ?></a> 获得了本期奖品</p>
				<p class="kj_main_l_cont_id"><b>用户ID：<?php echo $item['q_uid']; ?></b> (ID为用户唯一不变标识)</p>
				<p>揭晓时间：<?php echo date("Y-m-d H:i:s",$item['q_end_time']); ?></p>
				<p>云购时间：<?php echo date("Y-m-d H:i:s",$user_shop_time); ?></p>
			</div>
			<div class="kj_main_l_cy">
				<p style="margin-bottom:5px;color:#3c3c3c">奖品获得者本期总共参与了<b class="txt-red"><?php echo $user_shop_number; ?></b>人次</p>
				<p><span>Ta的号码:</span><?php echo yunmas($user_shop_codes,"span","7"); ?></p>
				<a href="javascript:void(0)" class="m-detail-main-codes-viewWinnerCodesBtn">TA的所有号码>></a>
			</div>
		</div>
		<div class="kj_main_r">
			<div class="kj_main_r_zxyq"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/kj_main_r_zxyq.jpg" /></div>
			<div class="kj_main_r_cont">
				<?php if($zx_shop['qishu']==$zx_shop['maxqishu']): ?>
				
				<div class="kj_main_r_spxj">
					<img width="240" height="210" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $item['thumb']; ?>" /> 
					<div class="kj_main_r_spyxj">
						<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/kj_main_r_spyxj.png" />
					</div>
				</div>
				<div class="kj_main_r_spxj_title"><b title="<?php echo $item['title']; ?><?php echo $item['title2']; ?>"><?php echo $item['title']; ?> <span class="txt-red"><?php echo $item['title2']; ?></span></b></div>
				<div class="kj_main_r_spxj_p">该商品已售完，给您带来不便敬请谅解！我们一直致力于改善服务体验，购了么感谢您的支持！更多新品敬请期待！</div>
				<?php  else: ?>
				<div class="kj_qgjp_img"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $zx_shop['id']; ?>" title="<?php echo $zx_shop['title']; ?>" target="_blank"><img alt="<?php echo $zx_shop['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $zx_shop['thumb']; ?>"/></a></div>
				<p class="kj_qgjp_title"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $zx_shop['id']; ?>" title="<?php echo $zx_shop['title']; ?>" target="_blank">(第<?php echo $zx_shop['qishu']; ?>期) <?php echo $zx_shop['title']; ?></a></p>
				<p class="kj_qgjp_price">总需：<?php echo $zx_shop['zongrenshu']; ?>人次</p>
				<div class="progressBar">
					<?php 
					 $p_width=round($zx_shop['canyurenshu']/$zx_shop['zongrenshu']*100);
					  ?>
					<p class="progressBar_wrap"><span class="progressBar_bar" style="width:<?php echo $p_width; ?>%;"></span></p>
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
					<a href="<?php echo WEB_PATH; ?>/goods/<?php echo $zx_shop['id']; ?>">立即云购 ></a>
				</div>
				<?php endif; ?> 
			</div>
		</div>
		<div class="clear"></div>
		
	</div>
        <div class="kj_main_b">
			<div class="m-detail-main-rule">
				<ul class="txt">
					<li>
						<span class="title"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/kj_main_b_jsgs.png" /></span>
						<div class="formula">
							<div class="box red-box"><b class="txt-red"><?php echo $item['q_user_code']; ?></b><br/><b class="txt-red" style="font-size:12px">本期幸运号码</b></div><div class="operator">=</div>
							<div class="box gray-box"><b class="txt-red"><?php echo $item['q_counttime']; ?></b><br/>该商品最后一条购买时间之前，网站所有商品最后100条购买时间得到的数据之和
								<div class="more-box">
									<i class="ico ico-arrow ico-arrow-yellow"></i>
									<div class="yellow-box f-breakword">
										该商品最后一条购买时间之前，网站所有商品最后100条购买时间得到的数据之和<span><a href="javascript:void(0)" class="time-detail-main-codes-viewWinnerCodesBtn">点击查看</a></span>
									</div>
								</div>
							</div>
							<div class="operator" title="取余">%</div><div class="box"><b class="txt-red"><?php echo $item['zongrenshu']; ?></b><br/>该奖品总需人次</div><div class="operator" title="相加">+</div><div class="box"><b class="txt-red">10000001</b><br/>原始数</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
        
       
        <div class="detail_tab" style="z-index:1">
			<div class="detail_tab_nav">
				<ul>
					<li id="resultTab" class="detail_tab_navli detail_tab_navs">开奖详情</li>
					<li id="recordTab" class="detail_tab_navli">所有参与记录</li>
					<li id="pastTab" class="detail_tab_navli">往期云购</li>
					<li id="shareTab" class="detail_tab_navli">晒单</li>
				</ul>
			</div>
			<div class="detail_tab_cont">
				<div id="resultPanel" class="detail_tab_cont_panel detail_tab_cont_result" >
					<div class="m-detail-mainTab-calcRule">
						<h4><i class="ico ico-text"></i><br/>幸运号码<br/>计算规则</h4>
						<div class="ruleWrap">
			            <ol class="ruleList">
			                <li><span class="index">1</span>取该商品最后购买时间前网站所有商品的最后100条购买时间记录之和；</li>
			                <li><span class="index">2</span>按时、分、秒、毫秒排列取值之和，除以该商品总参与人次后取余数；</li>
			                <li><span class="index">3</span>余数加上10000001 即为“幸运中奖码”，拥有该幸运号码者，直接获得该奖品。</li>
			                <li class="txt-red">注：完全参照用户夺宝时间数据获取幸运号无人为技术操作可能性，余数结果加上10000001的计算方式让每一个幸运号码都有中奖可能，原始数据不足100条取最近所有100条以内数据</li>
			            </ol>
			        </div>
					</div>
					<table class="m-detail-mainTab-resultList" cellpadding="0" cellspacing="0">
			       
			        <tbody>
			              
			
			                <tr class="resultRow">
			                    <td colspan="5">
			                        <h4>计算结果<a name="calcResult"></a></h4>
			                        <ol>
			                            <li><span class="index">1、</span>
			                                                                                取该商品最后购买时间前网站所有商品的最后100条购买时间记录之和：<?php echo $item['q_counttime']; ?>
			                                        <a href="javascript:void(0)" class="time-detail-main-codes-viewWinnerCodesBtn">查询详情>></a>
			                            </li>
			                            <li><span class="index">2、</span> 求余：<?php echo $item['q_counttime']; ?> % <?php echo $item['zongrenshu']; ?> (奖品所需人次) = 
			                                <b class=""><?php echo $yu; ?></b>
										(余数) <i data-func="remainder" class="ico ico-questionMark"></i>
			                            </li>
			                            <li><span class="index">3、</span>
			                               <b class=""><?php echo $yu; ?></b>
			 							(余数) + 10000001 = 
			 								<?php $ln=1;if(is_array($q_user_code_arr)) foreach($q_user_code_arr AS $q_code_num): ?><b class="square"><?php echo $q_code_num; ?></b><?php  endforeach; $ln++; unset($ln); ?>				
			                            </li>
			                        </ol>
			                        <span class="resultCode">幸运中奖号码：<?php echo $item['q_user_code']; ?></span>
			                    </td>
			                </tr>
			 
			        </tbody>
			    </table>
		   		</div>
				<!--所有参与记录-->
			   <div id="recordPanel" class="detail_tab_cont_panel detail_tab_cont_record" style="display:none"> 
					
						
			   </div>
				<!--所有参与记录 end-->
				<!--往期云购-->
				<div id="pastPanel" class="detail_tab_cont_panel detail_tab_cont_past" style="display:none">
					
				</div>
				<!--往期云购 end-->
				<!--晒单-->
				<div id="sharePanel" class="detail_tab_cont_panel detail_tab_cont_share" style="display:none"> 
					<div class="detail_tab_cont_share_empty"> 
						<iframe id="ifmdt" src="<?php echo WEB_PATH; ?>/go/shaidan/itmeifram/<?php echo $itemid; ?>" frameborder="0" marginheight="0" marginwidth="0" frameborder="0" scrolling="no" width="100%" name="ifmdt"></iframe>
						<!--<p class="status-empty"><i class="littleU littleU-cry"></i>&nbsp;&nbsp;暂时还没有任何晒单</p>  -->
					</div> 
			    </div>
				<!--晒单 end-->
			</div>
        </div>
        
        
      
        
    </div>
</div>

<script type="text/javascript">
$(function(){
	$.post("<?php echo WEB_PATH; ?>/go/index/jxfy/<?php echo $item['id']; ?>/",{"times":Math.random()},function(sdata){
		if(sdata){$("#recordPanel").html(sdata);}
	});
	
	$.post("<?php echo WEB_PATH; ?>/go/index/wqfy/<?php echo $item['id']; ?>/",{"times":Math.random()},function(sdata){
		if(sdata){$("#pastPanel").html(sdata);}
	});

})	

</script>

<script>
$(function(){
	var fouli=$(".detail_tab_navli");
	fouli.click(function(){
		var add=fouli.index(this);
		fouli.removeClass("detail_tab_navs").eq(add).addClass("detail_tab_navs");
		var tname=$(this).attr('id').replace('Tab','Panel');
		$(".detail_tab_cont_panel").hide();
		$("#"+tname).show();
	});

	$(".m-detail-main-codes-viewWinnerCodesBtn").click(function(){
		var pro_width=($(window).width()-500)/2;
		var pro_height=($(window).height()-620)/2;
		if(pro_width<0) pro_width=0;
		if(pro_height<0) pro_height=0;
		$("#pro-view-84").css({"left":pro_width+"px","top":pro_height+"px"});
	  	$("#pro-view-85").show();
		$("#pro-view-84").show();  
	});
	$(".w-msgbox-close").click(function(){
		$("#pro-view-85").hide();
		$("#pro-view-84").hide();
	});
	$(".time-detail-main-codes-viewWinnerCodesBtn").click(function(){
		var pro_width=$(window).width()-100;
		var pro_height=($(window).height()-620)/2;
		if(pro_width<0) pro_width=0;
		if(pro_height<0) pro_height=0;
		$("#pro-view-86").css({"left":"50px","top":pro_height+"px","width":pro_width+"px"});
	  	$("#pro-view-87").show();
		$("#pro-view-86").show();  
	});
	$(".w-msgbox-close").click(function(){
		$("#pro-view-87").hide();
		$("#pro-view-86").hide();
	});
});

</script>
<?php include templates("index","footer");?>			
 <div id="pro-view-85" class="w-mask" style="display:none">
   <iframe style="position:absolute;top:0;left:0;z-index:-1;filter:Alpha(Opacity=0);width:100%;height:100%" scrolling="no" frameborder="0"></iframe>
  </div>
  <div style="display:none;" id="pro-view-84" class="w-msgbox m-detail-codesDetail"> 
   <a data-pro="close" href="javascript:void(0);" class="w-msgbox-close">&times;</a> 
   <div class="w-msgbox-hd" data-pro="header"></div> 
   <div class="w-msgbox-bd" data-pro="entry">
    <div class="m-detail-codesDetail-bd">
     <h3>奖品获得者本期总共参与了<span class="txt-red"><?php echo $user_shop_number; ?></span>人次</h3>
     <div class="m-detail-codesDetail-wrap">
      <dl class="m-detail-codesDetail-list f-clear">
		<dt><?php echo date('Y-m-d H:i:s',$user_shop_time); ?></dt>
        <?php echo yunma($user_shop_codes,"dd"); ?>
                       

     </div>
    </div>
   </div> 
  </div> 
 <div id="pro-view-87" class="w-mask" style="display:none">
   <iframe style="position:absolute;top:0;left:0;z-index:-1;filter:Alpha(Opacity=0);width:100%;height:100%" scrolling="no" frameborder="0"></iframe>
  </div>
  <div style="display:none;" id="pro-view-86" class="w-msgbox m-detail-codesDetail"> 
   <a data-pro="close" href="javascript:void(0);" class="w-msgbox-close">&times;</a> 
   <div class="w-msgbox-hd" data-pro="header"></div> 
   <div class="w-msgbox-bd" data-pro="entry">
    <div class="m-detail-codesDetail-bd">
     <h3>奖品获得者本期总共参与了<span class="txt-red"><?php echo $user_shop_number; ?></span>人次</h3>
     <div class="m-detail-codesDetail-wrap" style="width:100%">
      <dl class="m-detail-codesDetail-list f-clear">
		<dt>本商品最后一条购买时间：<?php echo date('Y-m-d H:i:s',$user_shop_time); ?></dt>
		 <ul class="Record_content bb_pink" style="color: #999;height: 39px;line-height: 39px;text-align: center;">
		  <li class="time" style="width: 18%;color: #f60;font-weight: bold;font-size: 14px;text-align: center;padding-left: 0px;float:left"> <b style="margin-right: 0px;">夺宝时间</b>
                    </li>
                    <li class="timeVal" style="width: 15%;color: #f60;font-weight: bold;font-size: 14px;text-align: center;padding-left: 0px;float:left">转换数据</li>
                    <li class="nem" style="width: 10%;color: #f60;font-weight: bold;font-size: 14px;text-align: center;padding-left: 0px;float:left">
                        会员账号
                    </li>
                    <li class="much" style="width: 10%;color: #f60;font-weight: bold;font-size: 14px;text-align: center;padding-left: 0px;float:left">云购人次</li>
                    <li class="name" style="width: 45%;color: #f60;font-weight: bold;font-size: 14px;text-align: center;padding-left: 0px;float:left">
                        商品名称
                    </li>
		  </ul>
       <?php $ln=1;if(is_array($item['q_content'])) foreach($item['q_content'] AS $record): ?> <?php  $record_time = explode(".",$record['time']); $record['time'] = $record_time[0];  ?>
                <ul class="Record_content bb_pink" style="color: #999;height: 39px;line-height: 39px;text-align: center;">
                    <li class="time" style="width: 18%;overflow: hidden;height: 39px;line-height: 39px;float:left"> <b style="margin-right: 0px;"><?php echo date("Y-m-d",$record['time']); ?></b> <?php echo date("H:i:s",$record['time']); ?>.<?php echo $record_time['1']; ?>
                    </li>
                    <li class="timeVal" style="width: 15%;color: #f60;font-weight: bold;font-size: 14px;text-align: center;padding-left: 0px;float:left"><?php echo $record['timeadd']; ?></li>
                    <li class="nem" style="width: 10%;text-align: center;float:left">
                        <a style="font-size: 14px;" class="gray02" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($record['uid']); ?>" target="_blank"><?php echo get_user_name_open($record['uid']); ?>

						</a>
                    </li>
                    <li class="much" style="width: 10%;text-align: center;font-size: 14px;float:left"><?php echo $record['gonumber']; ?>人次</li>
                    <li class="name" style="width: 45%;text-align: left;padding-left: 20px;float:left">
                        <a style="font-size: 14px;" class="gray02" href="<?php echo WEB_PATH; ?>/goods/<?php echo $record['shopid']; ?>" target="_blank">
					(&nbsp第<?php echo $record['shopqishu']; ?>期&nbsp)<?php echo $record['shopname']; ?>
				</a>
                    </li>
                </ul>
                <?php  endforeach; $ln++; unset($ln); ?>
                       

     </div>
    </div>
   </div> 
  </div> 