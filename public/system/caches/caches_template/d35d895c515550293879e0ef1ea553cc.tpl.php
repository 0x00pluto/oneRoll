<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <title>申请提现 - 购了么云购平台</title>
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/comm.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/member.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo G_TEMPLATES_CSS; ?>/mobile/invite.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo G_TEMPLATES_JS; ?>/mobile/jquery190.js" language="javascript" type="text/javascript"></script>
</head>

<body>
    <div class="h5-1yyg-v11">
        <!-- 栏目页面顶部 -->
        <!-- 内页顶部 -->
      <header class="header" style="position: fixed;width: 100%;z-index: 99999999;">
    <h1 style="width: 100%;text-align: center;float: none;top: 0px;left: 0px;font-size: 25px;" class="fl">
        <span style="display: block;height: 49px;line-height: 49px;">
            <a style="font-size: 20px;line-height: 49px;" href="<?php echo WEB_PATH; ?>/mobile/mobile">
                申请提现
            </a>
        </span>

        <!--<img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo Getlogo(); ?>"/>
        -->
        <!--<img src="/statics/templates/yungou/images/sjlogo.png"/>
        -->
    </h1>

    <a id="fanhui" class="cefenlei" onclick="history.go(-1)" href="javascript:;">
        
        <img width="30" height="30" src="/statics/templates/yungou/images/mobile/fanhui.png">
    </a>

    <div class="fr head-r" style="position: absolute;right: 6px;top: 10px;">

        <!--<a href="<?php echo WEB_PATH; ?>/mobile/user/login" class="z-Member"></a>
    -->
    <a href="<?php echo WEB_PATH; ?>/mobile/mobile" class="z-shop" style="background-position: 2px -73px;"></a>

</div>

</header>
        <section class="clearfix g-member" style="padding-top: 60px;">
        <div class="clearfix m-round m-name">
            <div class="fl f-Himg" style="padding-top: 5px;">
                <a href="<?php echo WEB_PATH; ?>/mobile/mobile/userindex/<?php echo $member['uid']; ?>" class="z-Himg">
                    <?php 
                    $touxiang = get_user_key($member['uid'],'img')
                 ?>
                    <img style="border-radius: 110px;" src="
                    <?php if($touxiang !='photo/member.jpg'): ?>
                        <?php echo G_UPLOAD_PATH; ?>/<?php echo $touxiang; ?>
                    <?php elseif ($member['headimg'] !=''): ?>
                        <?php echo $member['headimg']; ?>
                    <?php  else: ?>
                        <?php echo G_UPLOAD_PATH; ?>/<?php echo $touxiang; ?>
                    <?php endif; ?>" border=0>
                </a>
                <span class="<?php if($member['jingyan'] < 501): ?>
                    z-class-icon01
                <?php elseif ($member['jingyan'] < 1001): ?>
                    z-class-icon02
                <?php elseif ($member['jingyan'] < 3001): ?>
                    z-class-icon03
                <?php elseif ($member['jingyan'] < 6001): ?>
                    z-class-icon04
                <?php elseif ($member['jingyan'] < 2001): ?>
                    z-class-icon05
                <?php  else: ?>
                    z-class-icon06
                <?php endif; ?> gray02">
                    <s></s>
                    <?php if($member['jingyan'] < 501): ?> 
                        云购新手
                    <?php elseif ($member['jingyan'] < 1001): ?>
                        云购小将
                    <?php elseif ($member['jingyan'] < 3001): ?>
                        云购中将
                    <?php elseif ($member['jingyan'] < 6001): ?>
                        云购上将
                    <?php elseif ($member['jingyan'] < 20001): ?>
                        云购大将
                    <?php  else: ?>
                        云购将军
                    <?php endif; ?>
                </span>
            </div>
            <div class="m-name-info">
                <p class="u-name"> 
                <b class="z-name gray01">
                <?php echo get_user_name($member['uid']); ?>
                </b>
                    <?php if($member['mobile']): ?> 
                    <em>
                    (<?php echo $member['mobile']; ?>)
                    </em>
                    <?php  else: ?> 
                    <em>
                    <a href="<?php echo WEB_PATH; ?>/mobile/user/mobile" class="fr z-Recharge-btn" style="line-height:24px; margin-right:5px; margin-top:3px;">
                    绑定手机
                    </a>
                    </em> 
                    <?php endif; ?>
                    <?php if($member['username']): ?>
                    <em></em>
                    <?php  else: ?> 
                    <em>
                    <a href="<?php echo WEB_PATH; ?>/mobile/user/profile" class="fr z-Recharge-btn" style="line-height:24px; margin-right:5px; margin-top:3px;">
                    绑定昵称
                    </a>
                    </em> 
                    <?php endif; ?>
                    
                </p>
                <ul class="clearfix u-mbr-info">
                    <li>
                        可用积分
                        <span class="orange"><?php echo $member['score']; ?></span>
                    </li>
                    <li>
                        经验值
                        <span class="orange"><?php echo $member['jingyan']; ?></span>
                    </li>
                    <li>
                        可用余额
                        <span class="orange">￥<?php echo $member['money']; ?></span>
                        <a href="<?php echo WEB_PATH; ?>/mobile/home/userrecharge" class="fr z-Recharge-btn">去充值</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="R-content">
            <div class="subMenu">
                <a id="linkApply" class="current">提现申请</a>
                <a id="linkRecharge">充值到云购账户</a>
            </div>

            <div class="total">
                <dt>
                </dt><dd>佣金总余额：<b class="orange"><?php echo $total; ?></b>元</dd>  <dd>活动佣金：<b class="orange"><?php echo $cashouthdtotal; ?></b>元</dd> <dd>正在佣金提现审核（冻结）：<b class="orange"><?php echo $cashoutdjtotal; ?></b>元</dd>

                <dd class=" "id="divTip">为确保您申请的金额能够正确无误的转入您的账户，请填写真实有效的账户信息，以下信息均为必填项！</dd>
            </div>
            <div id="divSQTX" class="Apply-con" style="margin-bottom: 30px;">
                <form name="form1" action="" method="post">
                    <dl>
                        <dt>佣金余额：</dt>
                        <dd><span id="spanBrokerage" class="orange"><?php echo $cashouthdtotal; ?></span> 元&nbsp;<span class="gray02" style="color:#999999">余额满100元时才可以申请提现</span></dd>
                    </dl>
                    <dl>
                        <dt>申请提现金额：</dt>
                        <dd><input id="txtAppMoney" type="text" name="money" onkeyup="value=value.replace(/\D/g,'')" class="inp-money txtAri" value="" maxlength="10" tip="1" /><b>元</b>&nbsp;<span id="tip1"></span></dd>
                    </dl>
                    <dl>
                        <dt>开&nbsp;&nbsp;户&nbsp;人：</dt>
                        <dd><input name="txtUserName" type="text" id="txtUserName" class="input-txt" maxlength="10" tip="2" />&nbsp;<span id="tip2"></span></dd>
                    </dl>
                    <dl>
                        <dt>银行名称：</dt>
                        <dd><input name="txtBankName" type="text" id="txtBankName" class="input-txt" tip="3" />&nbsp;<span id="tip3"></span></dd>
                    </dl>
                    <dl>
                        <dt>开户支行：</dt>
                        <dd><input name="txtSubBank" type="text" id="txtSubBank" class="input-txt" tip="4" />&nbsp;<span id="tip4"></span></dd>
                    </dl>
                    <dl>
                        <dt>银行帐号：</dt>
                        <dd><input name="txtBankNo" type="text" id="txtBankNo" class="input-txt txtAri" maxlength="23" tip="5" />&nbsp;<span id="tip5"></span></dd>
                    </dl>
                    <dl>
                        <dt>联系电话：</dt>
                        <dd><input name="txtPhone" type="text" id="txtPhone" class="input-txt txtAri" maxlength="13" tip="6" />&nbsp;<span id="tip6">格式输入186****2310</span></dd>
                    </dl>

                    <div class="Apply-button">
                        <input style="padding: 10px 20px;" type="submit" name="submit1" id="btnSQTX" class="bluebut" title="提交申请" value="提交申请">
                    </div>
                </form>
            </div>
            <div id="divSQCZ" class="Apply-con" style="display:none;">
                <form name="form2" action="" method="post">
                    <dl>
                        <dt>当前可充值金额：</dt>
                        <dd><span id="spanBrokerage2" class="orange"><?php echo $cashouthdtotal; ?></span> 元 <br><br></dd>
                    </dl>
                    <dl>
                        <dt>申请充值金额：</dt>
                        <dd><input id="txtCZMoney" name="txtCZMoney" type="text" onkeyup="value=value.replace(/\D/g,'')" class="inp-money txtAri" value="" tip="请输入充值金额"/><b>元</b>
                  </dd>
                    </dl>
                    <div class="Apply-button" style="height: 50px;">
                        <input style="padding: 10px 20px;margin: 20px 0px 0px 0px;" type="submit" name="submit2" id="btnSQCZ" class="bluebut" title="充值" value="充值" style="float:left;" >
                    </div>
                </form>
            </div>
        </div>


    </section>
        <?php include templates("mobile/index","footer");?>
        <script language="javascript" type="text/javascript">
        var Path = new Object();
        Path.Skin = "<?php echo G_TEMPLATES_STYLE; ?>";
        Path.Webpath = "<?php echo WEB_PATH; ?>";

        var Base = {
            head: document.getElementsByTagName("head")[0] || document.documentElement,
            Myload: function(B, A) {
                this.done = false;
                B.onload = B.onreadystatechange = function() {
                    if (!this.done && (!this.readyState || this.readyState === "loaded" || this.readyState === "complete")) {
                        this.done = true;
                        A();
                        B.onload = B.onreadystatechange = null;
                        if (this.head && B.parentNode) {
                            this.head.removeChild(B)
                        }
                    }
                }
            },
            getScript: function(A, C) {
                var B = function() {};
                if (C != undefined) {
                    B = C
                }
                var D = document.createElement("script");
                D.setAttribute("language", "javascript");
                D.setAttribute("type", "text/javascript");
                D.setAttribute("src", A);
                this.head.appendChild(D);
                this.Myload(D, B)
            },
            getStyle: function(A, B) {
                var B = function() {};
                if (callBack != undefined) {
                    B = callBack
                }
                var C = document.createElement("link");
                C.setAttribute("type", "text/css");
                C.setAttribute("rel", "stylesheet");
                C.setAttribute("href", A);
                this.head.appendChild(C);
                this.Myload(C, B)
            }
        }

        function GetVerNum() {
            var D = new Date();
            return D.getFullYear().toString().substring(2, 4) + '.' + (D.getMonth() + 1) + '.' + D.getDate() + '.' + D.getHours() + '.' + (D.getMinutes() < 10 ? '0' : D.getMinutes().toString().substring(0, 1))
        }
        Base.getScript('<?php echo G_TEMPLATES_JS; ?>/mobile/Bottom.js');

        $(function() {
            $(".subMenu a").click(function() {
                var id = $(".subMenu a").index(this);
                $(".subMenu a").removeClass().eq(id).addClass("current");
                $(".R-content .topic").hide().eq(id).show();
            });

            $("#linkApply").click(function() {
                $("#divSQTX").show();
                $("#divTip").show();
                $("#divSQCZ").hide();
            });
            $("#linkRecharge").click(function() {
                $("#divSQTX").hide();
                $("#divTip").hide();
                $("#divSQCZ").show();

            });

            function trim(s) {
                if (s.length > 0) {
                    if (s.charAt(0) == " ")
                        s = s.substring(1, s.length);
                    if (s.charAt(s.length - 1) == " ")
                        s = s.substring(0, s.length - 1);

                    if (s.charAt(0) == " " || s.charAt(s.length - 1) == " ")
                        return trim(s);
                }
                return s;
            }
            //  提交申请 判断
            $("#btnSQTX").click(function() {
                var Money = trim($("#txtAppMoney").val());
                var UserName = trim($("#txtUserName").val());
                var BankName = trim($("#txtBankName").val());
                var Bank = trim($("#txtSubBank").val());
                var BankNo = trim($("#txtBankNo").val());
                var Phone = trim($("#txtPhone").val());


                if (Money == '') {

                    $("#tip1").html("*&nbsp;&nbsp;请输入提现金额");

                    return false;

                } else if (UserName == '') {
                    $("#tip2").html("*&nbsp;&nbsp;请输入开户人");
                    return false;

                } else if (BankName == '') {
                    $("#tip3").html("*&nbsp;&nbsp;请输入银行名称");
                    return false;

                } else if (Bank == '') {
                    $("#tip4").html("*&nbsp;&nbsp;请输入开户支行");
                    return false;

                } else if (BankNo == '') {
                    $("#tip5").html("*&nbsp;&nbsp;请输入银行帐号");
                    return false;

                } else if (Phone == '') {
                    $("#tip6").html("*&nbsp;&nbsp;请输入联系电话");
                    return false;
                } else {
                    return true;
                }
            });

            $("#txtAppMoney").blur(function() {
                var Money = trim($("#txtAppMoney").val());
                if (Money == '') {
                    $("#tip1").html("*&nbsp;&nbsp;请输入提现金额");
                } else if (Money > {
                        wc: $cashouthdtotal
                    }) {
                    $("#tip1").html("*&nbsp;&nbsp;输入额超出可提现金额");
                    $(this).val("");
                } else if (Money < 100) {
                    $("#tip1").html("*&nbsp;&nbsp;佣金余额未满100元,不能提现!");
                    $(this).val("");
                } else {
                    $("#tip1").html("");
                }

            });


            $("#txtUserName").blur(function() {
                var UserName = trim($("#txtUserName").val());

                if (UserName == '') {
                    $("#tip2").html("*&nbsp;&nbsp;请输入开户人");
                } else if (!isCardName(UserName)) {
                    $("#tip2").html("*&nbsp;&nbsp;开户人输入有误");
                    $(this).val("");
                } else {
                    $("#tip2").html("");
                }

            });

            $("#txtBankName").blur(function() {
                var BankName = trim($("#txtBankName").val());

                if (BankName == '') {
                    $("#tip3").html("*&nbsp;&nbsp;请输入银行名称");
                } else if (!isCardName(BankName)) {
                    $("#tip3").html("*&nbsp;&nbsp;银行名称输入有误");
                    $(this).val("");
                } else {
                    $("#tip3").html("");
                }

            });

            $("#txtSubBank").blur(function() {
                var Bank = trim($("#txtSubBank").val());

                if (Bank == '') {
                    $("#tip4").html("*&nbsp;&nbsp;请输入开户支行");
                } else if (!isCardName(Bank)) {
                    $("#tip4").html("*&nbsp;&nbsp;开户支行输入有误");
                    $(this).val("");
                } else {
                    $("#tip4").html("");
                }

            });

            $("#txtBankNo").blur(function() {
                var BankNo = trim($("#txtBankNo").val());

                if (BankNo == '') {
                    $("#tip5").html("*&nbsp;&nbsp;请输入银行帐号");
                } else if (!isNumber(BankNo)) {
                    $("#tip5").html("*&nbsp;&nbsp;银行帐号输入有误");
                    $(this).val("");
                } else if (BankNo.length < 16) {
                    $("#tip5").html("*&nbsp;&nbsp;银行账号为16-19位数字");
                    $(this).val("");
                } else {
                    $("#tip5").html("");
                }

            });

            $("#txtPhone").blur(function() {
                var Phone = trim($("#txtPhone").val());
                if (Phone == '') {
                    $("#tip6").html("*&nbsp;&nbsp;请输入联系电话");
                } else if (!isMobile(Phone)) {
                    $("#tip6").html("*&nbsp;&nbsp;联系电话输入有误");
                    $(this).val("");
                } else {

                    $("#tip6").html("");
                }

            });

            $("#txtCZMoney").blur(function() {
                var CZMoney = trim($("#txtCZMoney").val());
                if (CZMoney == '') {
                    $("#tip7").html("<font color='#FF6600'>*&nbsp;&nbsp;请输入提现金额</font>");
                } else if (CZMoney > {
                        wc: $cashouthdtotal
                    }) {
                    $("#tip7").html("<font color='#FF6600'>*&nbsp;&nbsp;输入额超出可提现金额</font>");
                    $(this).val("");
                } else {
                    $("#tip1").html("");
                }

            });



            $("#btnSQCZ").click(function() {
                var CZMoney = trim($("#txtCZMoney").val());

                if (CZMoney == '') {
                    $("#tip7").html("<font color='#FF6600'>*&nbsp;&nbsp;请输入充值金额</font>");
                    return false;
                } else {
                    return true;
                }
            });




            //检验汉字
            function isChinese(s) {
                var patrn = /^\s*[\u4e00-\u9fa5]{1,15}\s*$/;
                if (!patrn.exec(s)) {
                    return false;
                }
                return true;
            }

            //数字
            function isNumber(s) {
                var patrn = /^\s*\d+\s*$/;
                //var patrn1=/^\s*\d{16}[\dxX]{2}\s*$/;
                if (!patrn.exec(s)) {
                    return false;
                }
                return true;
            }
            //校验手机号码：必须以数字开头
            function isMobile(s) {
                var patrn = /^13[0-9]{9}$|17[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|18[0-9]{9}$/;
                if (!patrn.exec(s)) {
                    return false;
                }
                return true;
            }



            //检验姓名：姓名是2-15字的汉字
            function isCardName(s) {

                var patrn = /^\s*[\u4e00-\u9fa5]{1,}[\u4e00-\u9fa5.·]{0,15}[\u4e00-\u9fa5]{1,}\s*$/;
                if (!patrn.exec(s)) {
                    return false;
                }
                return true;
            }

        })
        </script>
    </div>
</body>

</html>