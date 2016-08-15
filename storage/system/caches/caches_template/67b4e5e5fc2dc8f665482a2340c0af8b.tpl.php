<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/share.css"/>
<script type="text/javascript" src="<?php echo G_TEMPLATES_JS; ?>/liu.js"></script>
 <div class="g-body"> 
   <div class="m-share"> 
    <div class="m-share-slogan"> 
     <div class="g-wrap">
      <img src="<?php echo G_TEMPLATES_STYLE; ?>/img/share_slogan_dec.png" class="m-share-slogan-dec" />
     </div> 
     <div class="m-share-slogan-border"></div> 
    </div> 
    <div class="g-wrap f-clear"> 
     <div class="index_body_title"> 
      <img src="<?php echo G_TEMPLATES_STYLE; ?>/images/index_body_shaidan_title.png" /> 
     </div> 
     <div id="waterfall">
	 	<?php $ln=1;if(is_array($shaidan)) foreach($shaidan AS $sd): ?>	
		  <?php $mysql_model=System::load_sys_class('model'); ?><?php $shop=$this->DB()->GetOne("select * from `@#_shoplist` where `id` = '$sd[sd_shopid]'",array("cache"=>0)); ?>
		  <?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
			<div class="cell">
				<div class="pic">
			         <a target="_blank" href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>" title="<?php echo $sd['sd_title']; ?>"><img class="sky_pic" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $sd['sd_thumbs']; ?>" alt="<?php echo $sd['sd_title']; ?>" /></a>
		        </div> 
		        <div class="name">
		         	<a target="_blank" href="<?php echo WEB_PATH; ?>/goods/<?php echo $shop['id']; ?>">(第<?php echo $shop['qishu']; ?>期) <?php echo $shop['title']; ?></a>
		        </div> 
		        <div class="code">
		        	 幸运中奖号码：<strong class="txt-impt"><?php echo $shop['q_user_code']; ?></strong>
		        </div> 
		        <div class="post"> 
			         <div class="title">
			          	<a target="_blank" href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>"><strong><?php echo $sd['sd_title']; ?></strong></a>
			         </div> 
			         <div class="author">
				          <a target="_blank" href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($sd['sd_userid']); ?>" title="<?php echo get_user_name($sd['sd_userid'],'username'); ?>(ID:<?php echo $sd['sd_userid']; ?>)"><?php echo get_user_name($sd['sd_userid'],'username'); ?></a>
				          <span class="time"><?php echo date("Y-m-d H:i",$sd['sd_time']); ?></span>
			         </div> 
			         <div class="abbr"><?php echo _strcut($sd['sd_content'],50); ?></div> 
		        </div> 
			</div>
		<?php  endforeach; $ln++; unset($ln); ?> 
	</div> 
    </div> 
   </div> 
  </div> 
<script>
var opt={
  getResource:function(index,render){//index为已加载次数,render为渲染接口函数,接受一个dom集合或jquery对象作为参数。通过ajax等异步方法得到的数据可以传入该接口进行渲染，如 render(elem)
	  if(index>=10000) index=index%7+1;
	  var html='';
	  for(var i=20*(index-1);i<20*(index-1)+20;i++){
		 var k='';
		 for(var ii=0;ii<3-i.toString().length;ii++){
	        k+='0';
		 }
		 k+=i;
	     
	  }
	  return $(html);
  },
  auto_imgHeight:true,
  insert_type:1
}
$('#waterfall').waterfall(opt);
</script>
<?php include templates("index","footer");?>