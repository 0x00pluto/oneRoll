<?php
header("Content-Type:text/html;charset=UTF-8");

//include dirname(__FILE__) . DIRECTORY_SEPARATOR . "weixin" . DIRECTORY_SEPARATOR . "WxPayPubHelper.php";

class wapcs
{
	private $config;

	public function config($config = null)
	{
		$this->config = $config;
	}

	public function send_pay()
	{	
		$jspath = G_TEMPLATES_STYLE;
		$def_url = '<html>
		<head>
		<meta charset="utf-8">
		<script type="text/javascript" src="' . $jspath . '/js/jquery-1.8.3.min.js"></script>
		</head>
		<body>
		正在充值...
		<script language="javascript">
			window.onload = function(){
			try{
			 	if(alipay && typeof(alipay) == "function"){
			 		window.apk.alipay("' . $this->config["code"] . '", "' . $config['money'] . '");
					function payCallback(ret){
						if(ret=="success"){
							//alert("支付成功");
							window.location.href=" ' . $this->config['CallbackUrl'] . '?out_trade_no=' . $this->config['code'] . '";
						}else{
							//alert("支付失败");
							window.location.href=" ' . $this->config['CallbackUrl'] . '?out_trade_no=' . $this->config['code'] . '";
						}
					}
				}
			}catch(e){
			   	//alert("支付错误，请联系管理员");
				window.location.href=" ' . $this->config['ErrorUrl'] . '";
				//window.location.href=" ' . $this->config['CallbackUrl'] . '?out_trade_no=' . $this->config['code'] . '";
			}
		}
		</script>
		</body>
		<html>';
		echo $def_url;
		exit;
	}
}