<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/GoodsList.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/header.css"/>
<div class="wrap" id="loadingPicBlock">
	<div id="current" class="list_Curtit">
		<h1 class="fl">商品搜索－"<?php echo $search; ?>"</h1> 
		<span id="spTotalCount">(共<em class="orange"><?php echo $list; ?></em>件相关商品)</span>
	</div>
	<?php if($shoplist!=null): ?>	
	<div class="listContent">
	<ul class="item" id="ulGoodsList">
		<?php $ln=1;if(is_array($shoplist)) foreach($shoplist AS $shop): ?>
		<li class="goods-iten" >
			<div class="pic">
				<a href="<?php echo WEB_PATH; ?>/go/index/item/<?php echo $shop['id']; ?>" target="_blank" title="<?php echo $shop['title']; ?> "><img alt="<?php echo $shop['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $shop['thumb']; ?>"></a>
				<p name="buyCount" style="display:none;"></p>
			</div>
			<p class="name">
				<a href="<?php echo WEB_PATH; ?>/go/index/item/<?php echo $shop['id']; ?>" target="_blank" title="<?php echo $shop['title']; ?> "><?php echo $shop['title']; ?></a>
			</p>
			<p class="money">价值：<span class="rmbgray"><?php echo $shop['money']; ?></span></p>
			<div class="Progress-bar">
				<p title="已完成<?php echo percent($shop['canyurenshu'],$shop['zongrenshu']); ?>"><span style="width:<?php echo width($shop['canyurenshu'],$shop['zongrenshu'],213); ?>px;"></span></p>
				<ul class="Pro-bar-li">
					<li class="P-bar01"><em><?php echo $shop['canyurenshu']; ?></em>已参与人次</li>
					<li class="P-bar02"><em><?php echo $shop['zongrenshu']; ?></em>总需人次</li>
					<li class="P-bar03"><em><?php echo $shop['zongrenshu']-$shop['canyurenshu']; ?></em>剩余人次</li>
				</ul>
			</div>
			<div class="gl_buybtn">
				<div class="go_buy">
					<a href="<?php echo WEB_PATH; ?>/go/index/item/<?php echo $shop['id']; ?>" title="立即云购" class="go_Shopping fl">立即云购</a>
					<a href="<?php echo WEB_PATH; ?>/go/index/item/<?php echo $shop['id']; ?>" title="加入购物车" class="go_cart fr">加入购物车</a>
				</div>
			</div>
			<div class="Curborid" style="display:none;"><?php echo $shop['id']; ?></div>
		</li>
		<?php  endforeach; $ln++; unset($ln); ?>
	</ul>
	</div>
	<?php  else: ?>
	<div class="NoConMsg"><span>未找到有关“<em class="orange"><?php echo $search; ?></em>”的商品</span></div>
	<?php endif; ?>
</div>
<!-- <script type="text/javascript"> 
$(function(){
$("#ulGoodsList li a.go_cart").click(function(){ 
	var sw = $("#ulGoodsList li a.go_cart").index(this);
	var src = $("#ulGoodsList li .pic a img").eq(sw).attr('src');				
	var $shadow = $('<img id="cart_dh" style="display:none; border:1px solid #aaa; z-index:99999;" width="200" height="200" src="'+src+'" />').prependTo("body");  			
	var $img = $("#ulGoodsList li .pic").eq(sw);
	$shadow.css({ 
		'width' : 200, 
		'height': 200, 
		'position' : 'absolute',      
		"left":$img.offset().left+16, 
		"top":$img.offset().top+9,
		'opacity' : 1    
	}).show();
	var $cart = $("#sCart");
	$shadow.animate({   
		width: 50, 
		height: 50, 
		top: $cart.offset().top,    
		left: $cart.offset().left, 
		opacity: 0
	},1500,function(){
		cook(sw);
	});	
	
});
$("#ulGoodsList li a.go_Shopping").click(function(){		
	var sw = $("#ulGoodsList li a.go_Shopping").index(this);
	var go="1";
	cook(sw,go); 
});	
});
//存到COOKIE
function cook(sw,go){
var id = $(".Curborid").eq(sw).text();
$.get("<?php echo WEB_PATH; ?>/go/index/getren",{id:id},function(data){
	var data=data*1;
	var numdig=1;
	var NOW = $.cookie('CODE');			
	if(NOW){
		var arr=NOW.split(",");
		var zarr=0,znum=0;
		$.each(arr,function(key,val){
			if(val==id){
				return zarr=key,znum=val;
			}
		})
		var NOWZ = $.cookie('NUM');	
		var slitz=NOWZ.split(",");
		var c=slitz[zarr]*1+numdig*1;		
		var len=slitz.length;
		var zoo=0;
		for(i=0;i<len;i++){		
			var zoo=zoo+slitz[i]*1;		
		}	
		if(znum>0){											
			if(data-c>0){				
				slitz.splice(zarr,1,c);
				$("#sCartTotal").text(zoo*1+numdig);
			}else{			
				slitz.splice(zarr,1,data);	
				$("#sCartTotal").text(zoo);
			}
			var _NUM =  slitz;
		}
		if(znum==0){
			var _CODE = NOW+id+",";
			var _NUM =  NOWZ+numdig+",";
			$("#sCartTotal").text(zoo*1+numdig);
		}
	}else{
		var _CODE =id+",";
		var _NUM = numdig+",";
		$("#sCartTotal").text(numdig);
	}
	var CODE = "CODE";					
	var NUM = "NUM";										
	$.cookie(CODE,_CODE, { path: '/'});				
	$.cookie(NUM,_NUM, { path: '/'});
	if(go==1){
		window.location.href="<?php echo WEB_PATH; ?>/go/index/cartlist";
	}	
	})
}
</script> -->
<?php include templates("index","footer");?>