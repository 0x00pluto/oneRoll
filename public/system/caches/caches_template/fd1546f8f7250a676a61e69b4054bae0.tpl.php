<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<div class="main-content clearfix">
<?php include templates("member","left");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/layout-setUp.css"/>
<script type="text/javascript" src="<?php echo G_TEMPLATES_STYLE; ?>/js/area.js"></script>
<script type="text/javascript">
$(function(){		
	var demo=$(".registerform").Validform({
		tiptype:2,
		datatype:{
			"tel":/^(([0\+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/,
		},
	});	
	demo.tipmsg.w["tel"]="请正确输入电话号码(区号、号码必填，用“-”隔开)";
	demo.addRule([
	{
		ele:"#txt_ship_tel",
		datatype:"tel",
	}]);
});
$(function(){
	$("#btnAddnewAddr").click(function(){
		$("#div_consignee").show();
		$("#btnAddnewAddr").hide();
	});
	$("#btn_consignee_cancle").click(function(){
		$("#div_consignee").hide();
		$("#btnAddnewAddr").show();
	});
});
$(function(){
	$(".xiugai").click(function(){
		$("#btnAddnewAddr").hide();
		$("#div_consignee").hide();
	});
	$("#btn_consignee_cancle2").click(function(){
		$("#div_consignee2").hide();
		$("#btnAddnewAddr").show();
	});
});
function update(id){	
	$("#div_consignee2").show;
	setup3();
	$("#registerform3").attr("action","<?php echo WEB_PATH; ?>/member/home/updateddress/"+id);
	var str=$("#dizh_"+id).html();
	var spl=str.split(",");
	$("#province3").append('<option selected value="'+spl[0]+'">'+spl[0]+'</option>');
	$("#city3").append('<option selected value="'+spl[1]+'">'+spl[1]+'</option>');
	$("#county3").append('<option selected value="'+spl[1]+'">'+spl[1]+'</option>');
	$("#dizh2").val(spl[3]);
	$("#mob2").val($("#mob_"+id).html());
	$("#yb2").val($("#yb_"+id).html());
	$("#shr2").val($("#shr_"+id).html());
	$("#skfs2").val($("#skfs_"+id).html());
	$("#skr2").val($("#skr_"+id).html());
	$("#skzh2").val($("#skzh_"+id).html());
	$("#div_consignee2").show();	
};
function dell(id){
	if (confirm("您确认要删除该条信息吗？")){
		window.location.href="<?php echo WEB_PATH; ?>/member/home/deladdress/"+id;
	}
}


</script>
<div class="R-content">
	<?php include templates("member","shezhi");?>
	<?php if($count==0): ?>
	<div  class="addAddress">
		<dl>添加收货地址</dl>
		<form class="registerform" method="post" action="<?php echo WEB_PATH; ?>/member/home/useraddress">
		<table border="0" cellpadding="0" cellspacing="0">
		<tbody>
		<tr>
			<script>var s=["province","city","county"];</script>
			<td><label>所在地区：</label></td>
			<td>
				<select datatype="*" nullmsg="请选择有效的省市区" class="select" id="province" runat="server" name="sheng"></select>
				<select datatype="*" nullmsg="请选择有效的省市区" id="city" runat="server" name="shi"></select>
				<select datatype="*" nullmsg="请选择有效的省市区" id="county" runat="server" name="xian"></select>
				<em id="ship_address_valid_msg" class="red">*</em> 	
				<script type="text/javascript">setup()</script>
			</td>
			<td><div class="Validform_checktip"></div></td>
		</tr>
		<tr>
			<td><label>街道地址：</label></td>
			<td>
				<input datatype="*1-100" nullmsg="请填街道地址！" errormsg="范围在100之间！" name="jiedao" type="text" class="street" maxlength="100" />
				<em id="ship_address_valid_msg" class="red">*</em> 			
			</td>
			<td><div class="Validform_checktip">(不需要重复填写省/市/区)</div></td>
		</tr>
		<tr>
			<td><label>收货方式：</label></td>
			<td>
				<select datatype="*" nullmsg="收货方式不能为空" id="txt_ship_mb" runat="server" name="skfs">
				<option value="转为余额" selected="selected">转为余额</option>
				<option value="转入支付宝" >转入支付宝</option>
				<option value="配送商品" >配送商品</option>
				</select>
				<!--<input datatype="*" nullmsg="收货方式不能为空" name="skfs" type="text" id="txt_ship_mb" value="" class="inputTxt" maxlength="11">-->
				<em id="ship_mb_valid_msg" class="red">*</em>
				<td><div class="Validform_checktip"></div></td>
			</td>
			<td><div class="Validform_checktip">(请选择您所需要的收货方式)</div></td>
		</tr>
		<tr>
			<td><label>收货人：</label></td>
			<td>
				<input datatype="*" nullmsg="收货人不能为空" name="skr" type="text" id="txt_ship_mb" value="" class="inputTxt" maxlength="11">
				<em id="ship_mb_valid_msg" class="red">*</em>
				<td><div class="Validform_checktip"></div></td>
			</td>
			<td><div class="Validform_checktip">(1：如选转为余额请输入您在本网站注册的用户名；2：如选转入支付宝请输入支付宝开户名:3：如选配送商品请填写收货人姓名)</div></td>
		</tr>
		<tr>
			<td><label>收货账号：</label></td>
			<td>
				<input datatype="*" nullmsg="收货账号不能为空" name="skzh" type="text" id="txt_ship_mb" value="" class="inputTxt" maxlength="50">
				<em id="ship_mb_valid_msg" class="red">*</em>
				<td><div class="Validform_checktip"></div></td>
			</td>
			<td><div class="Validform_checktip">(1：如选转为余额请输入您在本网站注册的手机号；2：如选转入支付宝请输入支付宝账号:3：如选配送商品请填写收货人手机号)</div></td>
		</tr>
		<tr>
			<td><label>&nbsp;</label></td>
			<td>
				<input style="margin-right:20px;" name="submit" type="submit" class="orangebut" id="btn_consignee_save" value="保存" title="保存"> 
			</td>
		</tr>		
		</tbody>
		</table>
		</form>
	</div>
	<?php endif; ?>
	<?php if($count>0): ?>
	<div id="addressListDiv" class="list-tab detailAddress gray01" style="">
		<ul class="listTitle tdTitle">
			<li class="pad">详细地址</li>
		        <li class="wid55">收货方式</li>
			<li class="wid50">收货人</li>
			<li class="wid11">收货帐号</li>
			<li class="wid80">&nbsp;</li>
			<li class="wid70">操作</li>
		</ul>					
		<?php $ln=1;if(is_array($member_dizhi)) foreach($member_dizhi AS $v): ?>
		<ul class="liBg">
			<li id="dizh_<?php echo $v['id']; ?>" class="pad"><?php echo $v['sheng']; ?>,<?php echo $v['shi']; ?>,<?php echo $v['xian']; ?>,<?php echo $v['jiedao']; ?></li>
			<li id="yb_<?php echo $v['id']; ?>" class="wid55"><?php echo $v['youbian']; ?></li>
			<li id="shr_<?php echo $v['id']; ?>" class="wid55"><?php echo $v['shouhuoren']; ?></li>
			<li id="mob_<?php echo $v['id']; ?>" class="wid70"><?php echo $v['mobile']; ?></li>
			<li id="skfs_<?php echo $v['id']; ?>" class="wid55"><?php echo $v['skfs']; ?></li>
			<li id="skr_<?php echo $v['id']; ?>" class="wid50"><?php echo $v['skr']; ?></li>
			<li id="skzh_<?php echo $v['id']; ?>" class="wid11"><?php echo $v['skzh']; ?></li>
			<?php if($v['default']=='Y'): ?>
			<li class="wid80 orange">默认地址</li>
			<li class="wid70"><a class="xiugai" href="javascript:;" id="update<?php echo $v['id']; ?>" onclick="update(<?php echo $v['id']; ?>)" title="修改">修改</a></li>
			<?php  else: ?>
			<li class="wid80 lightBlue">
				<a class="blue" href="<?php echo WEB_PATH; ?>/member/home/morenaddress/<?php echo $v['id']; ?>">设为默认地址</a>
			</li>
			<li class="wid70">
				<a class="xiugai" href="javascript:;"   onclick="update(<?php echo $v['id']; ?>)" title="修改">修改</a>
				<a onclick="dell(<?php echo $v['id']; ?>)"  href="javascript:;" >删除</a>
			</li>
			<?php endif; ?>			
		</ul>
		<?php  endforeach; $ln++; unset($ln); ?>
	</div>
	<div class="add" style="display:none" ><input id="btnAddnewAddr" type="button" class="orangebut" value="新增收货地址" style="display: block;"></div>
	<?php endif; ?>
	<?php if($count<=5): ?>	            
	<div id="div_consignee" class="addAddress" style="display:none;">
		<dl>添加收货地址<span style="padding-left:16px;color:red;">以下选项必须全部填写，否则会导致提交失败或者再次重新提交</span></dl>
		<form class="registerform" method="post" action="<?php echo WEB_PATH; ?>/member/home/useraddress">
		<table border="0" cellpadding="0" cellspacing="0">
		<tbody>
		<tr>
		<script>var s2=["province2","city2","county2"];</script>
			<td><label>所在地区：</label></td>
			<td>
				<select datatype="*" nullmsg="请选择有效的省市区" class="select" id="province2" runat="server" name="sheng"></select>
				<select datatype="*" nullmsg="请选择有效的省市区" id="city2" runat="server" name="shi"></select>
				<select datatype="*" nullmsg="请选择有效的省市区" id="county2" runat="server" name="xian"></select>
				<em id="ship_address_valid_msg" class="red">*</em> 	
				<script type="text/javascript">setup2()</script>
			</td>
			<td><div class="Validform_checktip"></div></td>
		</tr>
		<tr>
			<td><label>街道地址：</label></td>
			<td>
				<input datatype="*1-100" nullmsg="请填街道地址！" errormsg="范围在100之间！" name="jiedao" type="text" class="street" maxlength="100" />
				<em id="ship_address_valid_msg" class="red">*</em> 			
			</td>
			<td><div class="Validform_checktip">(不需要重复填写省/市/区)</div></td>
		</tr>
		<tr>
			<td><label>收款方式：</label></td>
			<td>
				<select datatype="*" nullmsg="收款方式不能为空" id="txt_ship_mb" runat="server" name="skfs">
				<option value="转入余额" selected="selected">转入余额</option>
				<option value="转入支付宝" >转入支付宝</option>
				<option value="配送商品" >配送商品</option>
				</select>
				<!--<input datatype="*" nullmsg="收款方式不能为空" name="skfs" type="text" id="txt_ship_mb" value="" class="inputTxt" maxlength="66">-->
				<em id="ship_mb_valid_msg" class="red">*</em>
				<td><div class="Validform_checktip"></div></td>
			</td>
			<td><div class="Validform_checktip">(请选择您所需要的收款方式)</div></td>
		</tr>
		<tr>
			<td><label>收款人：</label></td>
			<td>
				<input datatype="*" nullmsg="收款人不能为空" name="skr" type="text" id="txt_ship_mb" value="" class="inputTxt" maxlength="66">
				<em id="ship_mb_valid_msg" class="red">*</em>
				<td><div class="Validform_checktip"></div></td>
			</td>
			<td><div class="Validform_checktip">(支付宝开户名或购了么帐号手机号，配送商品填写收货人)</div></td>
		</tr>
		<tr>
			<td><label>收款帐号：</label></td>
			<td>
				<input datatype="*" nullmsg="收款帐号不能为空" name="skzh" type="text" id="txt_ship_mb" value="" class="inputTxt" maxlength="66">
				<em id="ship_mb_valid_msg" class="red">*</em>
				<td><div class="Validform_checktip"></div></td>
			</td>
			<td><div class="Validform_checktip">(支付宝帐号或购了么帐号手机号，配送商品填写收货手机号)</div></td>
		</tr>
		<tr>
			<td><label>&nbsp;</label></td>
			<td>
				<input style="margin-right:20px;" name="submit" type="submit" class="orangebut" id="btn_consignee_save" value="保存" title="保存"> 
				<input type="button" class="cancelBtn" value="取消" id="btn_consignee_cancle" title="取消">
			</td>
		</tr>
		
		</tbody>
		</table>		
		</form>
	</div>
	<?php endif; ?>
	<div id="div_consignee2" class="addAddress" style="display:none;">
		<dl>修改收货地址<span style="padding-left:16px;color:red;">以下选项必须全部填写，否则会导致提交失败或者再次重新提交</span></dl>
		<script>var s3=["province3","city3","county3"];</script>	
		 
		<form id="registerform3" class="registerform" method="post" >
		<table border="0" cellpadding="0" cellspacing="0">
		<tbody>
		<tr>		
			<td><label>所在地区：</label></td>
			<td>
				<select datatype="*" nullmsg="请选择有效的省市区" class="select" id="province3" runat="server" name="sheng"></select>
				<select datatype="*" nullmsg="请选择有效的省市区" id="city3" runat="server" name="shi"></select>
				<select datatype="*" nullmsg="请选择有效的省市区" id="county3" runat="server" name="xian"></select>
				<em id="ship_address_valid_msg" class="red">*</em> 				
			</td>
			<td><div class="Validform_checktip"></div></td>
		</tr>
		<tr>
			<td><label>街道地址：</label></td>
			<td>
				<input  id="dizh2" datatype="*1-100" nullmsg="请填街道地址！" errormsg="范围在100之间！" name="jiedao" type="text" class="street" maxlength="100" />
				<em id="ship_address_valid_msg" class="red">*</em> 			
			</td>
			<td><div class="Validform_checktip">(不需要重复填写省/市/区)</div></td>
		</tr>
		<tr>
			<td><label>收货方式：</label></td>
			<td>
				<select datatype="*" nullmsg="收货方式不能为空" id="skfs2" runat="server" name="skfs">
				<option value="转入余额" selected="selected">转入余额</option>
				<option value="转入支付宝" >转入支付宝</option>
				<option value="配送商品" >配送商品</option>
				</select>
				<!--<input datatype="*" nullmsg="收货方式不能为空" name="skfs" type="text" id="skfs2" value="" class="inputTxt" maxlength="66">-->
				<em id="ship_mb_valid_msg" class="red">*</em>
				<td><div class="Validform_checktip"></div></td>
			</td>
			<td><div class="Validform_checktip">(请选择您所需要的收货方式)</div></td>
		</tr>
		<tr>
			<td><label>收货人：</label></td>
			<td>
				<input datatype="*" nullmsg="收货人不能为空" name="skr" type="text" id="skr2" value="" class="inputTxt" maxlength="66">
				<em id="ship_mb_valid_msg" class="red">*</em>
				<td><div class="Validform_checktip"></div></td>
			</td>
			<td><div class="Validform_checktip">(1：如选转为余额请输入您在本网站注册的用户名；2：如选转入支付宝请输入支付宝开户名:3：如选配送商品请填写收货人姓名)</div></td>
		</tr>
		<tr>
			<td><label>收货帐号：</label></td>
			<td>
				<input datatype="*" nullmsg="收货帐号不能为空" name="skzh" type="text" id="skzh2" value="" class="inputTxt" maxlength="66">
				<em id="ship_mb_valid_msg" class="red">*</em>
				<td><div class="Validform_checktip"></div></td>
			</td>
			<td><div class="Validform_checktip">(1：如选转为余额请输入您在本网站注册的手机号；2：如选转入支付宝请输入支付宝账号:3：如选配送商品请填写收货人手机号)</div></td>
		</tr>
		<tr>
			<td><label>&nbsp;</label></td>
			<td>
				<input style="margin-right:20px;" name="submit" type="submit" class="orangebut" id="btn_consignee_save" value="保存" title="保存"> 
				<input type="button" class="cancelBtn" value="取消" id="btn_consignee_cancle2" title="取消">
			</td>
		</tr>
		</tbody>
		</table>
		</form>
		 
	</div>
</div>
</div>
<?php include templates("index","footer");?>