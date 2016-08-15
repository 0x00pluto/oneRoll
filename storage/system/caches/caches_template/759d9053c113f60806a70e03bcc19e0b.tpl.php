<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><div class="detail_main">
		<div class="detail_main_l">
			<div id="zoom1" class="detail_main_l_img">
				<a  href="<?php echo G_UPLOAD_PATH; ?>/<?php echo $item_img; ?>" id="zoom1" class="MagicZoom MagicThumb"><img width="410" height="380" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $item['thumb']; ?>" /> </a>
			<div class="mousetrap" style="background-image:url();z-index:999;position:absolute;width:400px;height:400px;left:0px;top:0px;cursor:crosshair;"></div>
			</div>
			<div class="detail_main_l_imgli">
				<ul class="detail_main_l_imgul">
					<?php $ln=1; if(is_array($item['picarr'])) foreach($item['picarr'] AS $i => $imgtu): ?>                  
						<?php if($i==0): ?>
							<li data-pro="thumbnail" imgid="<?php echo $i; ?>" class="selected"><a href="<?php echo G_UPLOAD_PATH; ?>/<?php echo $imgtu; ?>"  rel="zoom1" rev="<?php echo G_UPLOAD_PATH; ?>/<?php echo $imgtu; ?>"><img width="64" height="60" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $imgtu; ?>" /></a> </li>
						<?php  else: ?>
							<li data-pro="thumbnail" imgid="<?php echo $i; ?>"> <a href="<?php echo G_UPLOAD_PATH; ?>/<?php echo $imgtu; ?>"  rel="zoom1" rev="<?php echo G_UPLOAD_PATH; ?>/<?php echo $imgtu; ?>"><img width="64" height="60" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $imgtu; ?>" /> </a></li>
						<?php endif; ?>	
					<?php  endforeach; $ln++; unset($ln); ?> 
				</ul>
			</div>
		</div>
		<div class="detail_main_c">
			<div class="detail_main_c_title"><span style="font-size:18px;font-weight:normal">(第<?php echo $item['qishu']; ?>期)</span> <?php echo $item['title']; ?><span class="txt-red" title="<?php echo $item['title2']; ?>"> <?php echo $item['title2']; ?></span></div>
			<div class="detail_main_c_cont">
				<p class="detail_main_c_cont_price">总需：<span class="txt-main"><?php echo $item['zongrenshu']; ?></span> 人次</p>
				<?php 
				 $p_width=round($item['canyurenshu']/$item['zongrenshu']*100);
				 ?>
				<div class="detail_progressBar">
					<p class="detail_progressBar_wrap"><span class="detail_progressBar_bar" style="width:<?php echo $p_width; ?>%;"></span></p>
					<ul class="detail_progressBar_txt">
						<li class="detail_progressBar_txt_l">
							<p>已参与人次：</p>
							<p><b><?php echo $item['canyurenshu']; ?></b></p>
						</li>
						<li class="detail_progressBar_txt_r">
							<p><b><?php echo $item['zongrenshu']-$item['canyurenshu']; ?></b></p>
							<p>剩余人次：</p>
						</li>
					</ul>
				</div>
				<div class="detail_main_c_count">
					参与：
					<div id="buyNumbers" class="detail_main_c_count_number"> 
					<div id="pro-view-4" class="detail_main_c_count_inline"> 
					   <input class="detail_main_c_count_input" value="1" data-pro="input" maxlength="7" onKeyUp="value=value.replace(/\D/g,'')" id="num_dig" /> 
					   <a id="shopadd" class="detail_main_c_count_add" href="javascript:void(0);" data-pro="plus">+</a> 
					   <a id="shopsub" class="detail_main_c_count_sub" href="javascript:void(0);" data-pro="minus">-</a> 
					</div> 
					</div>人次 
					 <span class="detail_main_c_count_buyHint"><i class="ico_buyHint"></i><b>多参与1人次，获奖机会翻倍！</b></span> 
				</div>
				<div class="detail_main_c_button">
					<a id="quickBuy" class="detail_main_c_button_Shopbut" href="javascript:void(0)">立即云购</a>
					<a id="addToCart" class="detail_main_c_button_Cart" href="javascript:void(0)">加入清单</a>
				</div>
				<div class="detail_main_c_state">
					<img src="<?php echo G_TEMPLATES_STYLE; ?>/images/detail_main_c_state.jpg" />
				</div>
			</div>
		</div>
		<div class="detail_main_r">
			<div class="detail_main_r_title"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/detail_main_r_title.jpg" /></div>
			<div class="detail_main_r_zxcy">
				<ul>
					<?php $ln=1;if(is_array($go_record_list)) foreach($go_record_list AS $user): ?>	
					<li><p class="detail_main_r_zxcy_l"><a class="w-record-user" title="<?php echo _strcut($user['username'],6); ?>" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($user['uid']); ?>" target="_blank"><?php echo _strcut($user['username'],20); ?></a></p><p class="detail_main_r_zxcy_r">参与了<span><?php echo $user['gonumber']; ?></span>人次</p></li>
					<?php  endforeach; $ln++; unset($ln); ?>
				</ul>
			</div>
			<!--<div class="detail_main_r_button"><a href="">查看全部</a></div>-->
		</div>
	</div>
