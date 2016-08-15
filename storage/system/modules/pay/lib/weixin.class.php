<?php
header("Content-Type:text/html;charset=UTF-8");

include dirname(__FILE__) . DIRECTORY_SEPARATOR . "weixin" . DIRECTORY_SEPARATOR . "WxPayPubHelper.php";

class weixin {
	private $config;

	public function config($config = null) {
		$this->config = $config;
	}

	public function send_pay() {
		$unifiedOrder = new UnifiedOrder_pub();
		$amount = trim($this->config['money']) * 100;
		$notify_url = $this->config['NotifyUrl'];
		$unifiedOrder->setParameter("body", $this->config['title']);
		$out_trade_no = $this->config['code'];
		$unifiedOrder->setParameter("out_trade_no", $out_trade_no);
		$unifiedOrder->setParameter("total_fee", $amount);
		$unifiedOrder->setParameter("notify_url", $notify_url);
		$unifiedOrder->setParameter("trade_type", "NATIVE");
		$unifiedOrder->setParameter("attach", "111");
		$unifiedOrderResult = $unifiedOrder->getResult();
		if ($unifiedOrderResult["return_code"] == "FAIL") {
			echo "通信出错：" . $unifiedOrderResult['return_msg'] . "<br>";
		} elseif ($unifiedOrderResult["result_code"] == "FAIL") {
			echo iconv("utf-8", "gb2312//IGNORE", "错误代码：" . $unifiedOrderResult['err_code'] . "<br>");
			echo iconv("utf-8", "gb2312//IGNORE", "错误代码描述：" . $unifiedOrderResult['err_code_des'] . "<br>");
		} elseif ($unifiedOrderResult["code_url"] != NULL) {
			$qrcode = "/system/modules/pay/lib/qrcode.js";
			$code_url = $unifiedOrderResult["code_url"];
			if ($unifiedOrderResult["code_url"] != NULL) {
				$hehe = 'var url = "' . $code_url . '";
				var qr = qrcode(10, "M");
				qr.addData(url);
				qr.make();
				var code=document.createElement("DIV");
				code.innerHTML = qr.createImgTag();
				var element=document.getElementById("qr_box");
				element.appendChild(code);';
			}

			$def_url = '<html><head>
			  <title>微信扫码支付</title>
			  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			  <link rel="shortcut icon" href="/favicon.ico" />
			  <meta name="decorator" content="template_footer" />
			  <link rel="stylesheet" type="text/css" href="/statics/templates/yungou/css/abcdf839c1929881eba2690ee517a7f09599c131.css">

			</head><body>

		<div class="g-header" module="header/Header" id="pro-view-0" module-id="module-2" module-launched="true">
<div class="m-toolbar" module="toolbar/Toolbar" id="pro-view-1" module-id="module-3" module-launched="true">
    <div class="g-wrap f-clear">
        <div class="m-toolbar-l">
            <span class="m-toolbar-welcome">欢迎来到购了么！</span>
        </div>
    </div>
</div>		</div>

<div class="m-header">
    <div class="g-wrap f-clear">
        <div class="m-header-logo">
            <h1><a class="m-header-logo-link" href="http://goleme.cc/">购了么</a></h1>
        </div>

        <div class="m-header-steps">

        </div>
    </div>
</div>

    <div class="g-wrap">

        <div class="m-weixin-header">
            <p><strong>请您及时付款，以便订单尽快处理！<span class="wx_left">微信支付号</span><span class="wx_right">' . $out_trade_no . '</span></strong></p>
            <p>请您在提交订单后1小时内支付，否则订单会自动取消。</p>
        </div>
<br />
        <div class="m-weixin-main">
            <h1 class="m-weixin-title"><font style="font-size: 20px;">微信支付</font></h1>
             <hr style="width:100%;border-bottom: 2px solid #db3652;"/>
            <center><h2><font style="font-size: 20px;">扫一扫付款</font><br></h2>
			<br />
            <p>


				<div class="wx_header">
			      <div class="wx_logo">
			      		<img style="padding:10px;display:block;  position: absolute; top:44%; left:86%; margin-left:-300px; margin-top:-150px;" class="m-weixin-demo" src="/statics/templates/yungou/images/wxlogo_pay.png" alt="扫一扫">
			      </div>
			  </div>

				<div align="center" id="qrcode"></div>
<center>
				<div class="weixin">
				    <div class="weixin2">
				        <b class="wx_box_corner left pngFix"></b><b class="wx_box_corner right pngFix"></b>
				        <div class="wx_box pngFix">
				            <div class="wx_box_area">
				                <div class="pay_box qr_default">
				                    <div class="area_bd">

				                    <span id="qr_box" class="wx_img_wrapper">

				                    </span>

									<img style="float: center; id="guide" alt="" src="/statics/templates/yungou/images/wxwebpay_guide.png" class="guide pngFix" />
		
				                        <div class="msg_default_box"><i class="icon_wx pngFix"></i>
										<br />
				                            <p>
				                                请使用微信扫描<br />
				                                                                                                        二维码以完成支付
				                            </p>
				                        </div>

				                        <div class="msg_box"><i class="icon_wx pngFix"></i>
				                            <p><strong>扫描成功</strong>请在手机确认支付</p>
				                        </div>
				                    </div>
				                </div>
				            </div>

					<div class="wx_hd">
					    <div class="wx_hd_img icon_wx"></div>
					</div>

					<div class="wx_money"><strong><font style="color: red;font-size: 28px;">￥' . $this->config['money'] . '元</font></strong></div>

					<div class="wx_kf">
					    <div class="wx_kf_img icon_wx"></div>
					    <div class="wx_kf_wz">
					        <p>工作时间：8:00-24:00</p>
					    </div>
					</div>
</center>
				            <div class="wx_hd">
				                <div class="wx_hd_img icon_wx"></div>
				            </div>
				        </div>
				    </div>
				</div>

            </p>
            </center>
        </div>

    </div>
      <br />
      <center>
      	<p>购了么 版权所有 @ 2015-2016  鲁ICP备09213115号-1 </p>
      </center>
				</body><script src="' . $qrcode . '"></script>
				<script>' . $hehe . '</script>
				</html>';
			echo $def_url;
			exit;
		}
	}
}