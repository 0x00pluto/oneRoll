<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="glist_nav">
	<div class="glist_nav_cont">
		<div class="glist_nav_cont_box">
			<div class="gilst_nav_cont_qbsp_img gilst_nav_cont_img"><a href="<?php echo WEB_PATH; ?>/goods_list/" ></a></div>
			<div class="gilst_nav_cont_title"><a href="<?php echo WEB_PATH; ?>/goods_list/"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/gilst_nav_cont_qbsp_title.png" /></a></div>
		</div>
					<?php $data=$this->DB()->GetList("select * from `@#_category` where `model`='1' and `parentid` = '0' order by `order` desc limit 0,8",array("type"=>1,"key"=>'',"cache"=>0)); ?>
					<?php $ln=1;if(is_array($data)) foreach($data AS $categoryx): ?>
					<div class="glist_nav_cont_box glist_nav_cont_box_mgl">
					<div class="gilst_nav_cont_img" style='background: url(<?php echo G_UPLOAD_PATH; ?>/<?php echo $categoryx['pic_url']; ?>) no-repeat center center;'><a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $categoryx['cateid']; ?>" ></a></div>
					<div class="gilst_nav_cont_title"><a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $categoryx['cateid']; ?>"><?php echo $categoryx['name']; ?><br><small><?php echo $categoryx['catdir']; ?></small></a></div>
					</div>

					<?php  endforeach; $ln++; unset($ln); ?>
					<?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
		<!--<div class="glist_nav_cont_box glist_nav_cont_box_mgl">
			<div class="gilst_nav_cont_sjpb_img gilst_nav_cont_img"><a href="<?php echo WEB_PATH; ?>/goods_list/5" ></a></div>
			<div class="gilst_nav_cont_title"><a href="<?php echo WEB_PATH; ?>/goods_list/"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/gilst_nav_cont_sjpb_title.png" /></a></div>
		</div>
		<div class="glist_nav_cont_box glist_nav_cont_box_mgl">
			<div class="gilst_nav_cont_dnbg_img gilst_nav_cont_img"><a href="<?php echo WEB_PATH; ?>/goods_list/13" ></a></div>
			<div class="gilst_nav_cont_title"><a href="<?php echo WEB_PATH; ?>/goods_list/"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/gilst_nav_cont_dnbg_title.png" /></a></div>
		</div>
		<div class="glist_nav_cont_box glist_nav_cont_box_mgl">
			<div class="gilst_nav_cont_smyy_img gilst_nav_cont_img"><a href="<?php echo WEB_PATH; ?>/goods_list/12" ></a></div>
			<div class="gilst_nav_cont_title"><a href="<?php echo WEB_PATH; ?>/goods_list/"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/gilst_nav_cont_smyy_title.png" /></a></div>
		</div>
		<div class="glist_nav_cont_box glist_nav_cont_box_mgl">
			<div class="gilst_nav_cont_nxss_img gilst_nav_cont_img"><a href="<?php echo WEB_PATH; ?>/goods_list/14" ></a></div>
			<div class="gilst_nav_cont_title"><a href="<?php echo WEB_PATH; ?>/goods_list/"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/gilst_nav_cont_nxss_title.png" /></a></div>
		</div>
		<div class="glist_nav_cont_box glist_nav_cont_box_mgl">
			<div class="gilst_nav_cont_qcfc_img gilst_nav_cont_img"><a href="<?php echo WEB_PATH; ?>/goods_list/36" ></a></div>
			<div class="gilst_nav_cont_title"><a href="<?php echo WEB_PATH; ?>/goods_list/"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/gilst_nav_cont_qcfc_title.png" /></a></div>
		</div>
		<div class="glist_nav_cont_box glist_nav_cont_box_mgl">
			<div class="gilst_nav_cont_clxp_img gilst_nav_cont_img"><a href="<?php echo WEB_PATH; ?>/goods_list/6" ></a></div>
			<div class="gilst_nav_cont_title"><a href="<?php echo WEB_PATH; ?>/goods_list/"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/gilst_nav_cont_clxp_title.png" /></a></div>
		</div>
		<div class="glist_nav_cont_box glist_nav_cont_box_mgl">
			<div class="gilst_nav_cont_zbss_img gilst_nav_cont_img"><a href="<?php echo WEB_PATH; ?>/goods_list/35" ></a></div>
			<div class="gilst_nav_cont_title"><a href="<?php echo WEB_PATH; ?>/goods_list/"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/gilst_nav_cont_zbss_title.png" /></a></div>
		</div>
		<div class="glist_nav_cont_box glist_nav_cont_box_mgl">
			<div class="gilst_nav_cont_qtsp_img gilst_nav_cont_img"><a href="<?php echo WEB_PATH; ?>/goods_list/15" ></a></div>
			<div class="gilst_nav_cont_title"><a href="<?php echo WEB_PATH; ?>/goods_list/"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/gilst_nav_cont_qtsp_title.png" /></a></div>
		</div>-->
	</div>
</div>

<div class="dir">
	<div class="dir_cont">
		<a href="<?php echo WEB_PATH; ?>">首页</a>  &gt; <a href="<?php echo WEB_PATH; ?>/goods_list/">全部商品</a>&gt; <span class="txt-red"><?php echo $daohang_title; ?></span>
	</div>
</div>
<div class="index_body">
	<div class="m-list-mod-hd">
		<h6>排序：</h6>
		<ul class="m-list-sortList">    
			<li <?php if($select=='20'): ?>class="selected"<?php endif; ?>>
				<a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $cate_band; ?>/20">人气奖品</a>
			</li>
			<li <?php if($select=='30'): ?>class="selected"<?php endif; ?>>
				<a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $cate_band; ?>/30">剩余人次</a>
			</li>
			<li <?php if($select=='40'): ?>class="selected"<?php endif; ?>>
				<a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $cate_band; ?>/40">最新奖品</a>
			</li>
			<li <?php if($select=='60'): ?>class="selected"<?php endif; ?>>
				<a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $cate_band; ?>/60">总需人次 <i title='升序' class='ico ico-arrow-sort ico-arrow-sort-gray-up'></i></a>
			</li>
			<li <?php if($select=='50'): ?>class="selected"<?php endif; ?>>
				<a href="<?php echo WEB_PATH; ?>/goods_list/<?php echo $cate_band; ?>/50">总需人次 <i title='降序' class='ico ico-arrow-sort ico-arrow-sort-gray-down'></i></a>
			</li>
		</ul>
	</div>
	<div class="glist_cont">
		<?php $ln=1; if(is_array($shoplist)) foreach($shoplist AS $i => $shop): ?>
			<?php 
			$p_width=round($shop['canyurenshu']/$shop['zongrenshu']*100);
			 ?>
			<div class="index_qgjp_item">
			<?php if($shop['yunjiage']=='10.00'): ?>							
				<i class="ten_ioc"></i>
			<?php endif; ?>
				<div class="index_qgjp_img"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shop['id']; ?>" title="<?php echo $shop['title']; ?>" target="_blank"><img alt="<?php echo $shop['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $shop['thumb']; ?>"/></a></div>
				<p class="index_qgjp_title"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shop['id']; ?>" title="<?php echo $shop['title']; ?>" target="_blank">(第<?php echo $shop['qishu']; ?>期) <?php echo $shop['title']; ?></a></p>
				<p class="index_qgjp_price">总需：<?php echo $shop['zongrenshu']; ?>人次</p>
				<div class="progressBar">
					<p class="progressBar_wrap"><span class="progressBar_bar" style="width:<?php echo $p_width; ?>%;"></span></p>
					<ul class="progressBar_txt">
						<li class="progressBar_txt_l">
							<p><b><?php echo $shop['canyurenshu']; ?></b></p>
							<p>已参与人次</p>
						</li>
						<li class="progressBar_txt_r">
							<p><b><?php echo $shop['zongrenshu']-$shop['canyurenshu']; ?></b></p>
							<p>剩余人次</p>
						</li>
					</ul>
				</div>
				<div class="index_body_zrjp_Button">
					<a href="<?php echo WEB_PATH; ?>/goods/<?php echo $shop['id']; ?>">立即云购 ></a>
				</div>
			</div>
		<?php  endforeach; $ln++; unset($ln); ?>
		
            <?php if($total>$num): ?>
			<div class="pagesx"><?php echo $page->show('two'); ?></div>
			<?php endif; ?>
	</div>
</div>

<?php include templates("index","footer");?>