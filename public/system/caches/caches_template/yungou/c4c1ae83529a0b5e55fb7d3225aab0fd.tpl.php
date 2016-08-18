<?php defined('G_IN_SYSTEM')or exit('No permission resources.'); ?><?php include templates("index","header");?>
<!--herd end-->
<!--BANNER-->
<div class="index_banner" id="slider">
    <?php $slides=$this->DB()->GetList("select * from `@#_slide` where 1",array("type"=>1,"key"=>'',"cache"=>0)); ?>
    <?php $ln=1;if(is_array($slides)) foreach($slides AS $slide): ?>
    <a href="<?php echo $slide['link']; ?>" target="_blank"><img src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $slide['img']; ?>" alt="" title=""/></a>
    <?php  endforeach; $ln++; unset($ln); ?>
    <?php if(defined('G_IN_ADMIN')) {echo '<div style="padding:8px;background-color:#F93; color:#fff;border:1px solid #f60;text-align:center"><b>This Tag</b></div>';}?>
</div>
<!--BANNER END-->
<!--body-->
<div class="index_body">
    <div class="index_body_zxjx">
        <div class="index_body_ksyg"><a href="<?php echo WEB_PATH; ?>//help/1"><img
                src="<?php echo G_TEMPLATES_STYLE; ?>/images/index_body_ksyg.jpg"/></a></div>
        <div class="index_body_zxjx_cont">
            <div class="hd">
                <a class="next"></a>
                <a class="prev"></a>
            </div>

            <div class="bd">
                <ul>
                    <?php $ln=1;if(is_array($shopqishu)) foreach($shopqishu AS $sq): ?>
                    <?php 

                    $user_goods_num = get_user_goods_num($sq['q_uid'],$sq['id']);
                    $huibaolv= round($sq['zongrenshu']/$user_goods_num);
                     ?>
                    <li>
                        <i class="index_body_zxjx_ioc"></i>
                        <div class="index_body_focus">
                            <div class="index_body_jx_img"><a href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $sq['id']; ?>"
                                                              title="<?php echo $sq['title']; ?>" target="_blank"><img
                                    src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $sq['thumb']; ?>"/></a></div>
                            <div class="index_body_jx_cont">
                                <p class="index_body_jx_title"><a href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $sq['id']; ?>"
                                                                  title="<?php echo $sq['title']; ?>" target="_blank">(第<?php echo $sq['qishu1']; ?>期)
                                    <?php echo $sq['title']; ?></a></p>
                                <span>总需：<?php echo $sq['zongrenshu']; ?>人次</span>
                                <p>获奖者：<a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($sq['q_uid']); ?>"
                                          title="<?php echo get_user_name($sq['q_user']); ?>(ID:<?php echo $sq['q_uid']; ?>)"><b><?php if($sq['q_user']['username']!=null): ?>
                                    <?php echo $sq['q_user']['username']; ?>
                                    <?php elseif ($sq['q_user']['mobile']!=null): ?>
                                    <?php echo $sq['q_user1']; ?>
                                    <?php  else: ?>
                                    <?php echo $sq['q_user2']; ?>
                                    <?php endif; ?></b></a></p>
                                <p>本期参与：<?php echo $user_goods_num; ?>人次</p>
                                <p>幸运中奖号码：<?php echo $sq['q_user_code']; ?></p>
                                <p>回报率：<b><?php echo $huibaolv; ?></b>倍</p>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </li>
                    <?php  endforeach; $ln++; unset($ln); ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="index_body_tjsp">
        <div class="index_body_title"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/index_body_zxjx_title.png"/></div>
        <div class="clear"></div>
        <div class="index_body_tjsp_cont">
            <div class="hd">
                <a class="next"></a>
                <a class="prev"></a>
            </div>
            <div class="bd">
                <ul class="w-goodsList-djs">

                    <?php $ln=1;if(is_array($shopdjs)) foreach($shopdjs AS $djs): ?>
                    <?php 

                    $djs['q_user'] = unserialize($djs['q_user']);
                    $timenow=time();
                     ?>
                    <li class="w-goodsList-item">
                        <div class="index_body_tjsp_img"><a href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $djs['id']; ?>"
                                                            title="<?php echo $djs['title']; ?>" target="_blank"><img
                                alt="<?php echo $djs['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $djs['thumb']; ?>"/></a></div>
                        <p><a title="<?php echo $djs['title']; ?>" href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $djs['id']; ?>" target="_blank">(第<?php echo $djs['qishu']; ?>期)
                            <?php echo $djs['title']; ?></a></p>
                        <?php if($djs['q_end_time']<$timenow): ?>
                        <div class="countdown_end">
                            <p class="countdown_end_p">恭喜<a href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($djs['q_uid']); ?>"
                                                            title="<?php echo get_user_name($djs['q_user']); ?>(ID:<?php echo $djs['q_uid']; ?>)"><?php echo get_user_name($djs['q_user']); ?></a>获得
                            </p>
                        </div>
                        <?php  else: ?>
                        <div class="countdown_nums">
                            <p class="countdown_nums_p"><b class="count-m0">0</b><b class="count-m1">0</b>:<b
                                    class="count-s0">0</b><b class="count-s1">0</b>:<b class="count-ms0">0</b><b
                                    class="count-ms1">0</b></p>
                        </div>
                        <?php endif; ?>
                    </li>
                    <?php  endforeach; $ln++; unset($ln); ?>

                </ul>
                <script type="text/javascript">

                    function show_date_time_location() {
                        //	$("#divLotteryTimer").hide();
                        //	$("#divLotteryTiming").show();
                        //var djs='<?php echo $djs["id"]; ?>';
                        var djs = '<?php echo $djs_id; ?>';
                        $.post("<?php echo WEB_PATH; ?>/api/getshop/lottery_shop_set/", {
                            "lottery_sub": "true",
                            "gid": djs,
                            "times": Math.random()
                        }, function (data) {
                            if (data != 0) {
                                if (djs) {
                                    $.post("<?php echo WEB_PATH; ?>/go/index/jxdjs/", {"times": Math.random()}, function (sdata) {
                                        if (sdata) {
                                            $(".w-goodsList-djs").html(sdata);
                                        }
                                        console.log(sdata);
                                    });
                                }
                            }
                            else {
                                window.setTimeout("show_date_time_location()", 1000);
                            }
                        });
                        //	window.setInterval(get_cp, 1000);

                    }
                    function show_date_time(endTime, obj) {
                        if (!this.endTime) {
                            this.endTime = endTime;
                            this.obj = obj;
                        }
                        rTimeout = window.setTimeout("show_date_time()", 30);
                        timeold = this.endTime - (new Date().getTime());

                        if (timeold <= 0) {

                            $(".countdown_nums").html("<p class='countdown_nums_js'>正在计算，请稍候...</p>");

                            rTimeout && clearTimeout(rTimeout);
                            show_date_time_location();
                            return;
                        }

                        sectimeold = timeold / 1000
                        secondsold = Math.floor(sectimeold);
                        msPerDay = 24 * 60 * 60 * 1000
                        e_daysold = timeold / msPerDay
                        daysold = Math.floor(e_daysold); 				//天
                        e_hrsold = (e_daysold - daysold) * 24;
                        hrsold = Math.floor(e_hrsold); 				//时
                        e_minsold = (e_hrsold - hrsold) * 60;
                        hrsold = (hrsold < 10 ? '0' + hrsold : hrsold)
                        hrsold = new String(hrsold);
                        hrsold_1 = hrsold.substr(0, 1);
                        hrsold_2 = hrsold.substr(1, 1);
                        //分
                        minsold = Math.floor((e_hrsold - hrsold) * 60);
                        minsold = (minsold < 10 ? '0' + minsold : minsold)
                        minsold = new String(minsold);
                        minsold_1 = minsold.substr(0, 1);
                        minsold_2 = minsold.substr(1, 1);

                        //秒
                        e_seconds = (e_minsold - minsold) * 60;
                        seconds = Math.floor((e_minsold - minsold) * 60);
                        seconds = (seconds < 10 ? '0' + seconds : seconds)
                        seconds = new String(seconds);
                        seconds_1 = seconds.substr(0, 1);
                        seconds_2 = seconds.substr(1, 1);
                        //毫秒
                        ms = e_seconds - seconds;
                        ms = new String(ms)
                        ms_1 = ms.substr(2, 1);
                        ms_2 = ms.substr(3, 1);
                        if (hrsold > 0) {
                            $(".count-m0").html(hrsold_1);
                            $(".count-m1").html(hrsold_2);
                            $(".count-s0").html(minsold_1);
                            $(".count-s1").html(minsold_2);
                            $(".count-ms0").html(seconds_1);
                            $(".count-ms1").html(seconds_2);
                        }
                        else {
                            $(".count-m0").html(minsold_1);
                            $(".count-m1").html(minsold_2);
                            $(".count-s0").html(seconds_1);
                            $(".count-s1").html(seconds_2);
                            $(".count-ms0").html(ms_1);
                            $(".count-ms1").html(ms_2);
                        }
                        //this.obj.innerHTML=daysold+"天"+(hrsold<10?'0'+hrsold:hrsold)+"小时"+(minsold<10?'0'+minsold:minsold)+"分"+(seconds<10?'0'+seconds:seconds)+"秒."+ms;
                    }

                    $(function () {
                        $.ajaxSetup({async: false});
                        $.post("<?php echo WEB_PATH; ?>/api/getshop/lottery_shop_get", {
                            "lottery_shop_get": true,
                            "gid": {wc: $djs_id},
                            "times": Math.random()
                        }, function (sdata) {
                            if (sdata != 'no') {
                                show_date_time((new Date().getTime()) + (parseInt(sdata)) * 1000, null);
                            }
                        });
                    });
                </script>

            </div>
        </div>
    </div>

    <div class="index_body_xptj">
        <?php echo Getindexcat('indexmid'); ?>

        <div class="clear"></div>
    </div>
    <div class="index_body_gg"><?php echo Getindexad('index_ad_1'); ?></div>
    <div class="index_body_zrjp">
        <div class="index_body_zrjp_left">
            <div class="index_body_hjjl">
                <div class="index_body_jltop"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/index_body_hjjltop.jpg"></div>
                <div class="bd">
                    <ul>
                        <?php $ln=1; if(is_array($zhongjiang)) foreach($zhongjiang AS $i => $qishu): ?>
                        <?php 
                        $qishu['q_user'] = unserialize($qishu['q_user']);
                        $user_goods_num = get_user_goods_num($qishu['q_uid'],$qishu['id']);
                         ?>
                        <?php if($i%2==0): ?>
                        <li>
                            <div class="index_body_jlimg"><a
                                    href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($qishu['q_uid']); ?>"><img
                                    src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $qishu['q_user']['img']; ?>"/></a></div>
                            <div class="index_body_jlcont">
                                <p class="index_body_jlcont_name1"><a
                                        href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($qishu['q_uid']); ?>" target="_blank"
                                        title="<?php echo get_user_name($qishu['q_user']); ?>(ID:<?php echo $qishu['q_uid']; ?>)"><?php echo get_user_name($qishu['q_user']); ?></a>于<?php echo date('m月d日',$qishu['q_end_time']); ?>
                                </p>
                                <p class="index_body_jlcont_cont"><?php echo $user_goods_num; ?>人次夺得<a
                                        title="<?php echo $qishu['title']; ?>" href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $qishu['id']; ?>"
                                        target="_blank"><?php echo $qishu['title']; ?></a></p>
                                <p>总需：<?php echo $qishu['zongrenshu']; ?>人次</p>
                            </div>
                        </li>
                        <?php  else: ?>
                        <li>
                            <div class="index_body_jlimg"><a
                                    href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($qishu['q_uid']); ?>"><img
                                    src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $qishu['q_user']['img']; ?>"/></a></div>
                            <div class="index_body_jlcont">
                                <p class="index_body_jlcont_name1"><a
                                        href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($qishu['q_uid']); ?>" target="_blank"
                                        title="<?php echo get_user_name($qishu['q_user']); ?>(ID:<?php echo $qishu['q_uid']; ?>)"><?php echo get_user_name($qishu['q_user']); ?></a>于<?php echo date('m月d日',$qishu['q_end_time']); ?>
                                </p>
                                <p class="index_body_jlcont_cont"><?php echo $user_goods_num; ?>人次夺得<a
                                        title="<?php echo $qishu['title']; ?>" href="<?php echo WEB_PATH; ?>/dataserver/<?php echo $qishu['id']; ?>"
                                        target="_blank"><?php echo $qishu['title']; ?></a></p>
                                <p>总需：<?php echo $qishu['zongrenshu']; ?>人次</p>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php  endforeach; $ln++; unset($ln); ?>
                    </ul>
                </div>
            </div>
            <div class="index_body_cyjl">
                <div class="index_body_jltop"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/index_body_cyjltop.jpg"></div>
                <div class="bd">
                    <ul>
                        <?php $ln=1;if(is_array($go_record)) foreach($go_record AS $gorecord): ?>
                        <li>
                            <div class="index_body_jlimg"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $gorecord['shopid']; ?>"><img
                                    src="<?php echo G_UPLOAD_PATH; ?>/<?php echo shopimg($gorecord['shopid']); ?>"/></a></div>
                            <div class="index_body_jlcont">
                                <p class="index_body_jlcont_name"><a class="w-record-user"
                                                                     title="<?php echo get_user_name($gorecord); ?>(ID:<?php echo $gorecord['uid']; ?>)"
                                                                     href="<?php echo WEB_PATH; ?>/uname/<?php echo idjia($gorecord['uid']); ?>"
                                                                     target="_blank"><?php echo get_user_name($gorecord); ?></a>参与了
                                </p>
                                <p class="index_body_jlcont_cont"><?php echo $gorecord['gonumber']; ?>人次 <a
                                        title="<?php echo $gorecord['shopname']; ?>"
                                        href="<?php echo WEB_PATH; ?>/goods/<?php echo $gorecord['shopid']; ?>" target="_blank"><?php echo $gorecord['shopname']; ?></a>
                                </p>
                                <p></p>
                            </div>
                        </li>
                        <?php  endforeach; $ln++; unset($ln); ?>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="index_body_zrjp_right">
            <div class="index_body_titles"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/index_body_zrjp_title.png"/></div>
            <div class="clear"></div>
            <div class="index_body_zrjp_cont">

                <?php $ln=1;if(is_array($shoplistrenqi1)) foreach($shoplistrenqi1 AS $renqi): ?>
                <?php 
                $rq_width=round($renqi['canyurenshu']/$renqi['zongrenshu']*100);
                 ?>
                <div class="index_body_zrjp_item">
                    <i class="index_body_zrjp_ioc"></i>
                    <div class="index_body_zrjp_img"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>"
                                                        title="<?php echo $renqi['title']; ?>" target="_blank"><img
                            alt="<?php echo $renqi['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $renqi['thumb']; ?>"/></a></div>
                    <p class="index_body_zrjp_title"><a title="<?php echo $renqi['title']; ?>"
                                                        href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank">(第<?php echo $renqi['qishu']; ?>期)
                        <?php echo $renqi['title']; ?></a></p>
                    <p class="index_body_zrjp_price">总需：<?php echo $renqi['zongrenshu']; ?>人次</p>
                    <div class="progressBar">
                        <p class="progressBar_wrap"><span class="progressBar_bar" style="width:<?php echo $rq_width; ?>%;"></span>
                        </p>
                        <ul class="progressBar_txt">
                            <li class="progressBar_txt_l">
                                <p><b><?php echo $renqi['canyurenshu']; ?></b></p>
                                <p>已参与人次</p>
                            </li>
                            <li class="progressBar_txt_r">
                                <p><b><?php echo $renqi['zongrenshu']-$renqi['canyurenshu']; ?></b></p>
                                <p>剩余人次</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php  endforeach; $ln++; unset($ln); ?>
                <div class="index_body_zrjp_Slider">
                    <div class="bd">
                        <ul>
                            <?php echo Getindexad('index_ad_2'); ?>

                        </ul>
                    </div>
                    <div class="hd">
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>


                <div class="clear"></div>
                <?php $ln=1;if(is_array($shoplistrenqi2)) foreach($shoplistrenqi2 AS $renqi): ?>
                <?php 
                $rq_width=round($renqi['canyurenshu']/$renqi['zongrenshu']*100);
                 ?>
                <div class="index_body_zrjp_item">
                    <i class="index_body_zrjp_ioc"></i>
                    <div class="index_body_zrjp_img"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>"
                                                        title="<?php echo $renqi['title']; ?>" target="_blank"><img
                            alt="<?php echo $renqi['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $renqi['thumb']; ?>"/></a></div>
                    <p class="index_body_zrjp_title"><a title="<?php echo $renqi['title']; ?>"
                                                        href="<?php echo WEB_PATH; ?>/goods/<?php echo $renqi['id']; ?>" target="_blank">(第<?php echo $renqi['qishu']; ?>期)
                        <?php echo $renqi['title']; ?></a></p>
                    <p class="index_body_zrjp_price">总需：<?php echo $renqi['zongrenshu']; ?>人次</p>
                    <div class="progressBar">
                        <p class="progressBar_wrap"><span class="progressBar_bar" style="width:<?php echo $rq_width; ?>%;"></span>
                        </p>
                        <ul class="progressBar_txt">
                            <li class="progressBar_txt_l">
                                <p><b><?php echo $renqi['canyurenshu']; ?></b></p>
                                <p>已参与人次</p>
                            </li>
                            <li class="progressBar_txt_r">
                                <p><b><?php echo $renqi['zongrenshu']-$renqi['canyurenshu']; ?></b></p>
                                <p>剩余人次</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php  endforeach; $ln++; unset($ln); ?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <!--手机平板-->
    <div class="index_body_gg"><?php echo Getindexad('index_ad_3'); ?></div>
    <div class="index_body_sjpb">
        <div class="index_body_title"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/index_body_sjpb_title.png"/></div>
        <div class="index_body_sjpb_cont">
            <?php $ln=1;if(is_array($shoplistshouji)) foreach($shoplistshouji AS $qita): ?>
            <?php 
            $rq_width=$qita['canyurenshu']/$qita['zongrenshu']*100;
             ?>
            <div class="index_qgjp_item">
                <?php if($qita['yunjiage']=='10.00'): ?>
                <i class="index_body_ten_ioc"></i>
                <?php endif; ?>
                <div class="index_qgjp_img"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $qita['id']; ?>" title="<?php echo $qita['title']; ?>"
                                               target="_blank"><img alt="<?php echo $qita['title']; ?>"
                                                                    src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $qita['thumb']; ?>"/></a>
                </div>
                <p class="index_qgjp_title"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $qita['id']; ?>" title="<?php echo $qita['title']; ?>"
                                               target="_blank">(第<?php echo $qita['qishu']; ?>期) <?php echo $qita['title']; ?></a></p>
                <p class="index_qgjp_price">总需：<?php echo $qita['zongrenshu']; ?>人次</p>
                <div class="progressBar">
                    <p class="progressBar_wrap"><span class="progressBar_bar" style="width:<?php echo $rq_width; ?>%;"></span></p>
                    <ul class="progressBar_txt">
                        <li class="progressBar_txt_l">
                            <p><b><?php echo $qita['canyurenshu']; ?></b></p>
                            <p>已参与人次</p>
                        </li>
                        <li class="progressBar_txt_r">
                            <p><b><?php echo $qita['zongrenshu']-$qita['canyurenshu']; ?></b></p>
                            <p>剩余人次</p>
                        </li>
                    </ul>
                </div>
                <div class="index_body_zrjp_Button">
                    <a href="<?php echo WEB_PATH; ?>/goods/<?php echo $qita['id']; ?>">立即云购 ></a>
                </div>
            </div>
            <?php  endforeach; $ln++; unset($ln); ?>

        </div>
    </div>
    <div class="clear"></div>
    <!--珠宝中部分类  id=153-->
    <div class="index_body_gg"><?php echo Getindexad('index_ad_4'); ?></div>
    <div class="index_body_qtjp">
        <div class="index_body_title"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/index_body_qtjp_title.png"/></div>
        <div class="index_body_qtjp_cont">
            <?php $ln=1;if(is_array($shoplistqita)) foreach($shoplistqita AS $qita): ?>
            <?php 
            $rq_width=$qita['canyurenshu']/$qita['zongrenshu']*100;
             ?>
            <div class="index_qgjp_item">
                <?php if($qita['yunjiage']=='10.00'): ?>
                <i class="index_body_ten_ioc"></i>
                <?php endif; ?>
                <div class="index_qgjp_img"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $qita['id']; ?>" title="<?php echo $qita['title']; ?>"
                                               target="_blank"><img width="200" height="150" alt="<?php echo $qita['title']; ?>"
                                                                    src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $qita['thumb']; ?>"/></a>
                </div>
                <p class="index_qgjp_title"><a title="<?php echo $qita['title']; ?>" href="<?php echo WEB_PATH; ?>/goods/<?php echo $qita['id']; ?>"
                                               target="_blank">(第<?php echo $qita['qishu']; ?>期) <?php echo $qita['title']; ?></a></p>
                <p class="index_qgjp_price">总需：<?php echo $qita['zongrenshu']; ?>人次</p>
                <div class="progressBar">
                    <p class="progressBar_wrap"><span class="progressBar_bar" style="width:<?php echo $rq_width; ?>%;"></span></p>
                    <ul class="progressBar_txt">
                        <li class="progressBar_txt_l">
                            <p><b><?php echo $qita['canyurenshu']; ?></b></p>
                            <p>已参与人次</p>
                        </li>
                        <li class="progressBar_txt_r">
                            <p><b><?php echo $qita['zongrenshu']-$qita['canyurenshu']; ?></b></p>
                            <p>剩余人次</p>
                        </li>
                    </ul>
                </div>
                <div class="index_body_zrjp_Button">
                    <a href="<?php echo WEB_PATH; ?>/goods/<?php echo $qita['id']; ?>" target="_blank">立即云购 ></a>
                </div>
            </div>
            <?php  endforeach; $ln++; unset($ln); ?>
        </div>
    </div>
    <div class="clear"></div>
    <div class="index_body_zxsj">
        <div class="index_body_title"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/index_body_zxsj_title.png"/></div>
        <div class="index_body_zxsj_cont">
            <ul>
                <?php $ln=1;if(is_array($shoplistnew)) foreach($shoplistnew AS $new): ?>
                <li>
                    <i class="index_body_zxsj_ioc"></i>
                    <div class="index_body_zxsj_conts">
                        <p class="index_body_zxsj_conts_p p1"><a href="<?php echo WEB_PATH; ?>/goods/<?php echo $new['id']; ?>"
                                                                 title="<?php echo $new['title']; ?>" target="_blank"><?php echo $new['title']; ?></a>
                        </p>
                        <div class="index_body_zxsj_conts_img">
                            <a href="<?php echo WEB_PATH; ?>/goods/<?php echo $new['id']; ?>" title="<?php echo $new['title']; ?>" target="_blank"><img
                                    alt="<?php echo $new['title']; ?>" src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $new['thumb']; ?>"/></a>
                        </div>
                    </div>

                </li>
                <?php  endforeach; $ln++; unset($ln); ?>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
    <div class="index_body_sdhp">
        <div class="index_body_title"><img src="<?php echo G_TEMPLATES_STYLE; ?>/images/index_body_sdhp_title.png"/></div>
        <div class="index_body_sdhp_cont">
            <ul>
                <?php $ln=1;if(is_array($shaidan)) foreach($shaidan AS $sd): ?>
                <?php 
                $sd['sd_content']=strip_tags($sd['sd_content']);
                 ?>
                <li>
                    <div class="index_body_sdhp_img"><a href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>"
                                                        target="_blank"> <img
                            src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $sd['sd_thumbs']; ?>"/></a></div>
                    <div class="index_body_sdhp_conts">
                        <b><a title="<?php echo get_user_name($sd['sd_userid']); ?>(ID:<?php echo $sd['sd_userid']; ?>)"
                              href="<?php echo WEB_PATH; ?>/uname/<?php echo $sd['sd_userid']; ?>" target="_blank"><?php echo get_user_name($sd['sd_userid']); ?></a><span><?php echo date("Y-m-d",$sd['sd_time']); ?></span></b>
                        <p><?php echo _strcut($sd['sd_content'],100); ?></p>
                    </div>
                </li>
                <?php  endforeach; $ln++; unset($ln); ?>

                <?php $ln=1;if(is_array($shaidan_two)) foreach($shaidan_two AS $sd): ?>
                <?php 
                $sd['sd_content']=strip_tags($sd['sd_content']);

                 ?>
                <li>
                    <div class="index_body_sdhp_img"><a href="<?php echo WEB_PATH; ?>/go/shaidan/detail/<?php echo $sd['sd_id']; ?>"
                                                        target="_blank"> <img
                            src="<?php echo G_UPLOAD_PATH; ?>/<?php echo $sd['sd_thumbs']; ?>"/></a></div>
                    <div class="index_body_sdhp_conts">
                        <b><a title="<?php echo get_user_name($sd['sd_userid']); ?>(ID:<?php echo $sd['sd_userid']; ?>)"
                              href="<?php echo WEB_PATH; ?>/uname/<?php echo $sd['sd_userid']; ?>" target="_blank"><?php echo get_user_name($sd['sd_userid']); ?></a><span><?php echo date("Y-m-d",$sd['sd_time']); ?></span></b>
                        <p><?php echo _strcut($sd['sd_content'],100); ?></p>
                    </div>

                </li>
                <?php  endforeach; $ln++; unset($ln); ?>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<!--body end-->

<!--foot-->
<?php include templates("index","footer");?>
<!--foot end-->
<script>

    $(function () {
        $(".index_submenu").show();
        $(".index_menu").css("background-image", "url(<?php echo G_TEMPLATES_STYLE; ?>/images/index_menu.png)")
        $('#slider').nivoSlider();

    });

</script>
<!--index_menu-->

<!--index_menu end-->

