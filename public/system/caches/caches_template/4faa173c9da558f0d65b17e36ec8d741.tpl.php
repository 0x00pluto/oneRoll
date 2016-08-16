<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>分享页面得现金 - 购了么云购平台</title>
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/weixin/comm.css?v=130715" rel="stylesheet" type="text/css" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/weixin/index.css?v=141009" rel="stylesheet" type="text/css" />
    <script src="<?php echo G_TEMPLATES_CSS; ?>/weixin/jquery190.js" language="javascript" type="text/javascript"></script>
    <script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jweixin.js"  language="javascript"  type="text/javascript"></script>
</head>
<body>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div id="newbeiBox">
                <ul class="slides">
                    <li class="swiper-slide" style="display:block;">
                        <div class="item"><img src="<?php echo G_TEMPLATES_CSS; ?>/weixin/index_03.jpg"></div>
                    </li>
                    <li class="swiper-slide" style="display:block;">
                        <div class="item"><img src="<?php echo G_TEMPLATES_CSS; ?>/weixin/index_10.jpg"></div>
                    </li>
                    <li class="swiper-slide" style="display:block;">
                          <div class="item"><img src="<?php echo G_TEMPLATES_CSS; ?>/weixin/index_12.jpg">
                     <div class="indexCon">
                             <a style="margin-bottom: 50px;" href="<?php echo G_WEB_PATH; ?>"  class="orangeBtn">立即云购</a>
                     </div>
                     </div>
                     </li>
                </ul>
            </div>
  </div>
</div>
<input id="uid" type="hidden" value="<?php echo $member['uid']; ?>">

<script>
  wx.config({
    debug: false,
    appId: "<?php  echo $wechat['appid']; ?>",
    timestamp: <?php  echo $signPackage["timestamp"]; ?>,
    nonceStr: '<?php  echo $signPackage["nonceStr"]; ?>',
    signature: '<?php  echo $signPackage["signature"]; ?>',
  jsApiList: ["checkJsApi", "onMenuShareAppMessage", "onMenuShareTimeline", "onMenuShareWeibo", "onMenuShareQQ"]
  });
wx.ready(function () {
var n = $("#hidLineLink").val();
    wx.onMenuShareTimeline({
        title: "我在这里花1元中了一个iPhone 6S！是真的，快来看看吧！", // 分享标题
        link: n, // 分享链接
        imgUrl: "<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/iphone6.jpg", // 分享图标
        success: function () { 
            var tt =$("#uid").val();
            $.ajax({
                    url: "<?php echo WEB_PATH; ?>/mobile/home/shareinc",
                     type: 'post',
                      dataType: "json",
                      data : {f : tt},
                success:function(data){
                    if(data==2){
                         alert('分享成功,赠送的现金已经存入你的账户！');
                     }else if(data==4){
                        alert('分享成功,您已经分享过，不能再次获得赠金哦');

                     }else if(data ==1){
                         alert('感谢您的分享，分享赠现金活动已经结束了哦');
                     }else if(data ==5){
                        alert('请登录后分享，以便领取赠送的金额哦');
                     }
                },
                error:function(data){
                }
             }) 
        },
        cancel: function () { 
            alert('已取消');
        }
    });
    wx.onMenuShareAppMessage({
        title: "我在这里花1元中了一个iPhone 6S！是真的，快来看看吧", // 分享标题
        desc: "这是一个可以赚钱的网站，玩儿就能赚钱", // 分享描述
        link: n, // 分享链接
        imgUrl: "<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/iphone6.jpg", // 分享图标
        type: '', // 分享类型,music、video或link，不填默认为link
        dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
         success: function () { 
           alert('已分享');
        },

        cancel: function () { 
            alert('已取消');
        }
    });
    wx.onMenuShareQQ({
        title: "我在这里花1元中了一个iPhone 6S！是真的，快来看看吧", // 分享标题
        desc: "这是一个可以赚钱的网站，玩儿就能赚钱", // 分享描述
        link: n, // 分享链接
        imgUrl: "<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/iphone6.jpg", // 分享图标
        success: function () { 
        },
        cancel: function () { 
        }
    });
    wx.onMenuShareWeibo({
        title: "我在这里花1元中了一个iPhone 6S！是真的，快来看看吧", // 分享标题
        desc: "这是一个可以赚钱的网站，玩儿就能赚钱", // 分享描述
        link: n, // 分享链接
        imgUrl: "<?php echo G_TEMPLATES_STYLE; ?>/images/mobile/iphone6.jpg", // 分享图标
        success: function () { 
           alert('已分享');
        },
        cancel: function () { 
            alert('已取消');
        }
    });

});
</script>
</body>
</html>