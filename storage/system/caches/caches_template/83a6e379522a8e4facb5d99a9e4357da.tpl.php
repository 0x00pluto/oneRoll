<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<link rel="stylesheet" type="text/css" href="<?php echo G_TEMPLATES_STYLE; ?>/css/qq.css"/>

<div class="help-main">
	<div class="qqGroup">
		<div class="qqTitle">
			<span class="groupt">云购<b>QQ</b>群</span>
			<span>为打造更具公平、透明的云购平台，购了么特成立各地QQ交流群（可在选择框查找本地群），欢迎广大云友加入。<br>另外，购了么正在招募各地群主加盟，也可自建群，具体待遇和要求请咨询QQ:<?php echo _cfg("qq"); ?></span>
		</div>		
		<div id="listContents" class="qqList">
			<ul>
            	<li>
					<dt><img border="0" src=""></dt>
					<dt></dt><dd></dd>
				</li>
				<li>
					<dt><img border="0" src=""></dt>
					<dt></dt><dd></dd>
				</li>
    
			</ul>
		</div>
	</div>
</div>
<?php include templates("index","footer");?>