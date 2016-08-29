<?php
/**
 * Created by PhpStorm.
 * User: zhipeng
 * Date: 16/8/17
 * Time: 下午12:18
 */
System::load_sys_fun('rpc');
System::load_sys_fun('weibo');

/**
 * @param $datas
 * @param $adapterClassName
 * @return \arrayAdapter\arrayAdapter []
 */
function __createMultiArrayAdapter($datas, $adapterClassName = "")
{
    $arrayAdapters = [];
    foreach ($datas as $data) {
        $arrayAdapters[] = __createSingleAdapter($data, $adapterClassName);
    }
    return $arrayAdapters;
}

/**
 * @param $data
 * @param $adapterClassName
 * @return \arrayAdapter\arrayAdapter
 */
function __createSingleAdapter($data, $adapterClassName = "")
{
    $classMap = [
        "mall.onlineGoods" => \arrayAdapter\shopItemAdapter::class,
        "mall.goodsSellInfoDetail" => \arrayAdapter\sellDetailAdapter::class,
        "role" => \arrayAdapter\roleAdapter::class,
        'records.recordData' => \arrayAdapter\recordAdapter::class,
        'category' => \arrayAdapter\categoryAdapter::class,
        'records.acceptRecords' => \arrayAdapter\acceptRecordsAdapter::class
    ];

    if (!isset($data["dataTemplateType"])) {
        return null;
    }
    $dataTemplate = $data["dataTemplateType"];

    $className = isset($classMap[$dataTemplate]) ? $classMap[$dataTemplate] : $adapterClassName;
    if (empty($className)) {
        return new \arrayAdapter\arrayAdapter();
    } else {
        return new $className($data);
    }
}

function rpc_a_get_wap($sql, $info)
{
    return callRpc('mall.getAllAdvertisements')->get_retdata();
}

function rpc_a_get_shop_list($sql, $info)
{
    return callRpc('mall.getAllFinishGoods', [
        "start" => 0,
        "count" => 10
    ])->get_retdata();
}

function rpc_a_get_shop_active_list($sql, $info)
{
    return callRpc('mall.getAllSellingGoods',
        [
            "start" => 0,
            "count" => 10
        ])->get_retdata();
}

function rpc_a_get_categoryById($categoryId)
{
    $categoryId = intval($categoryId);
    $categorys = rpc_a_get_category("", "");

    return __createSingleAdapter($categorys[$categoryId]);
}

function rpc_a_get_categorys()
{
    return __createMultiArrayAdapter(rpc_a_get_category("", ""));
}

function rpc_a_get_category($sql, $info)
{
    $categorys = [
        [
            'dataTemplateType' => 'category',
            'cateid' => 0,
            "name" => "充值卡类",
            "pic_url" => "cateimg/20160624/21233098701900.png",
        ],
        [
            'dataTemplateType' => 'category',

            'cateid' => 1,
            "name" => "手机平板",
//            http://m.goleme.cc/statics/uploads/cateimg/20160624/91389348701156.png
            "pic_url" => "cateimg/20160624/91389348701156.png",
        ],
        [
            'dataTemplateType' => 'category',

            'cateid' => 2,
            "name" => "电脑办公",
            //http://m.goleme.cc/statics/uploads/cateimg/20160624/93904973701670.png
            "pic_url" => "cateimg/20160624/93904973701670.png",
        ],
        [
            'dataTemplateType' => 'category',

            'cateid' => 3,
            "name" => "数码影音",
            //http://m.goleme.cc/statics/uploads/cateimg/20160624/99623723701730.png
            "pic_url" => "cateimg/20160624/99623723701730.png",
        ],
        [
            'dataTemplateType' => 'category',

            'cateid' => 4,
            "name" => "女性时尚",
            //http://m.goleme.cc/statics/uploads/cateimg/20160624/78451848702114.png
            "pic_url" => "cateimg/20160624/78451848702114.png",
        ],
        [
            'dataTemplateType' => 'category',

            'cateid' => 5,
            "name" => "汽车服务",
            //http://m.goleme.cc/statics/uploads/cateimg/20160624/85576848702035.png
            "pic_url" => "cateimg/20160624/85576848702035.png",
        ],
        [
            'dataTemplateType' => 'category',

            'cateid' => 6,
            "name" => "美食天地",
            //http://m.goleme.cc/statics/uploads/cateimg/20160717/28699920725439.png
            "pic_url" => "cateimg/20160624/28699920725439.png",
        ],
        [
            'dataTemplateType' => 'category',

            'cateid' => 7,
            "name" => "其它商品",
            //http://m.goleme.cc/statics/uploads/cateimg/20160624/13701848702244.png
            "pic_url" => "cateimg/20160624/13701848702244.png",
        ]
    ];

//    var_dump($categorys);
    return $categorys;
}

function rpc_a_get_article($sql, $info)
{
    $articles = [
        [
            "id" => 1,
            "title" => "这就是个公告1",
        ],
        [
            "id" => 2,
            "title" => "这就是个公告2",
        ]
    ];
    return $articles;
}


function rpc_mall_getGoodsInfo($goodsId)
{
    return __createSingleAdapter(callRpc(
        'mall.getGoodsInfo',
        [
            "goodsId" => $goodsId
        ]
    )->get_retdata(), \arrayAdapter\shopItemAdapter::class
    );
}

/**
 * @param $goodsIds array
 * @return \arrayAdapter\arrayAdapter[]
 */
function rpc_mall_getGoodsInfos($goodsIds)
{
    return __help__createMultiArrayAdapterRpc(
        'mall.getGoodsInfos',
        [
            "goodsIds" => json_encode($goodsIds)
        ]
    );
}

/**
 * @param $storageId
 * @return \arrayAdapter\arrayAdapter[]
 */
function rpc_mall_getGoodsByStorageId($storageId)
{
    return __createMultiArrayAdapter(
        callRpc(
            'mall.getGoodsByStorageId',
            [
                "storageGoodsId" => $storageId,
                "start" => 0,
                "count" => 10
            ]
        )
    );
}

function rpc_mall_getAllSellingGoodsByStorageId($storageId)
{
    return __createSingleAdapter(
        callRpc('mall.getAllSellingGoodsByStorageId',
            [
                "storageGoodsId" => $storageId
            ]
        )->get_retdata()
    );
}

function rpc_mall_getAllTradeDetailsByGoodsId($goodsId, $start, $count)
{
    return __createMultiArrayAdapter(
        callRpc(
            'mall.getAllTradeDetailsByGoodsId',
            [
                "goodsId" => $goodsId,
                "start" => $start,
                "count" => $count
            ]
        )->get_retdata()
    );
}

/**
 * 助手方法
 * @param $rpcFunction
 * @param array $params
 * @param array $headerParams
 * @return \arrayAdapter\arrayAdapter[]
 */
function __help__createMultiArrayAdapterRpc($rpcFunction, $params = [], $headerParams = [])
{
    return __createMultiArrayAdapter(
        callRpc(
            $rpcFunction,
            $params,
            $headerParams
        )->get_retdata()
    );
}

function __help__createSingleArrayAdapterRpc($rpcFunction, $params = [], $headerParams = [])
{
    $data = callRpc(
        $rpcFunction,
        $params,
        $headerParams
    )->get_retdata();
//    \hellaEngine\support\dump($data);
    return __createSingleAdapter(
        $data
    );
}

/**
 * @param $bigKindId
 * @param $start
 * @param $count
 * @return \arrayAdapter\arrayAdapter[]
 */
function rpc_mall_getAllSellingGoodsByBigKindId($bigKindId, $start, $count)
{
    return __help__createMultiArrayAdapterRpc(
        'mall.getAllSellingGoodsByBigKindId',
        [
            'bigKindId' => $bigKindId,
            'start' => $start,
            'count' => $count
        ]
    );
}

/**
 * @param $start
 * @param $count
 * @return \arrayAdapter\arrayAdapter[]
 */
function rpc_mall_getAllSellingGoods($start, $count)
{
    return __help__createMultiArrayAdapterRpc(
        'mall.getAllSellingGoods',
        [
            "start" => $start,
            "count" => $count
        ]
    );
}

/**
 * @param $start
 * @param $count
 * @return \arrayAdapter\arrayAdapter[]
 */
function rpc_mall_getAllRecentFinishGoods($start, $count)
{
    return __help__createMultiArrayAdapterRpc('mall.getAllFinishGoods',
        [
            "start" => $start,
            "count" => $count
        ]);
}

function rpc_mall_getAllWaitLotteryGoods()
{
    return __help__createMultiArrayAdapterRpc('mall.getAllWaitLotteryGoods',
        [

        ]);
}

function rpc_mall_getHelpArticles()
{
    $articles = [
        [
            'dataTemplateType' => 'helpArticle',
            'title' => '大夺宝是怎么计算幸运号码的？',
            'content' => "a、商品的最后一个号码分配完毕后，将公示该分配时间点前本站全部商品的最后50个参与时间；<br/>" .
                "b、将这50个时间的数值进行求和（得出数值A）（每个时间按时、分、秒、毫秒的顺序组合，如20:15:25.362则为201525362）；<br/>" .
                "c、为保证公平公正公开，系统还会等待一小段时间，取最近下一期中国福利彩票“老时时彩”的揭晓结果（一个五位数值B）；<br/>" .
                "d、（数值A+数值B）除以该商品总需人次得到的余数 + 原始数 10000001，得到最终幸运号码，拥有该幸运号码者，直接获得该商品。<br/>" .
                "注：最后一个号码认购时间距离“老时时彩”最近下一期揭晓大于24小时，默认“老时时彩”揭晓结果为00000。"

        ],
        [
            'dataTemplateType' => 'helpArticle',
            'title' => '幸运号码的计算结果可信吗？',
            'content' => "由于使用了“老时时彩”揭晓结果作为参数，因此幸运号码肯定是未知的，确保绝对公平公正，您可以绝对相信计算结果真实、可信。但“老时时彩”会出现不开奖的情况，若24小时后当期“老时时彩”仍未开奖，计算规则中的“老时时彩”数据B值以00000进行计算。"

        ],
        [
            'dataTemplateType' => 'helpArticle',
            'title' => '怎样查看是否中奖？如何领奖？',
            'content' => "如果您成为中奖用户，登录sina微博后，会收到消息通知，如果填写了手机号码，还会有短信通知；<br/>
【我的】-【中奖记录】中显示中奖记录，点击对应奖品，申请发货。<br/>
请在【我的】-【地址管理】中填写真实的收货地址，完善您的个人信息，以便我们为您派发获得的商品。"

        ],
        [
            'dataTemplateType' => 'helpArticle',
            'title' => '商品是正品吗？如何保证？',
            'content' => "大夺宝所有商品均从正规渠道采购，100%正品，可享受厂家所提供的三包质量服务保障。"

        ],
        [
            'dataTemplateType' => 'helpArticle',
            'title' => '收到的商品可以退货或者换货吗？',
            'content' => "非质量问题，不在三包范围内，不给予退换货。请尽量亲自签收并当面拆箱验货，如果发现运输途中造成了商品的损坏，请不要签收，可以拒签退回。具体问题可以与客服取得联系。
一经签收，商品问题则直接联系商品厂家解决。"

        ],
        [
            'dataTemplateType' => 'helpArticle',
            'title' => '为什么商品的价格比市面上要高？',
            'content' => "因为商品在销售过程中需要支付第三方手续费、用户消费各种活动奖励、佣金奖励，除此之外还要运费、平台运营维护等费用，所以价格相对较高，还请您谅解。 但！我方承诺同样规格型号产品，各平台中最低价（保证平台正常运转前提下）！"

        ]
        ,
        [
            'dataTemplateType' => 'helpArticle',
            'title' => '获得的商品，还需要支付其他费用吗？',
            'content' => "不需要支付其他任何费用。"

        ]
    ];

    return __createMultiArrayAdapter($articles, \arrayAdapter\helpArticleAdapter::class);
}

/**
 * @param $mallId
 * @param $num
 * @return \hellaEngine\RPCMessage\RPCMessageReturn
 */
function rpc_mallOperate_buy($mallId, $num)
{
    return callRpc('mallOperate.buy',
        [
            'mallId' => $mallId,
            'num' => $num
        ], [
            'verify' => __get_verify()
        ]);

}

function rpc_quicklogin_thirdpartycreate($uid)
{
    return callRpc('quicklogin.thirdpartycreate',
        [
            'username' => $uid,
            'password' => md5($uid . "quicklogin.thirdpartycreate"),
            'thirdpartytype' => 1
        ]);
}

function rpc_quicklogin_thirdpartylogin($uid)
{
    $ret = callRpc('quicklogin.thirdpartylogin',
        [
            'username' => $uid,
            'password' => md5($uid . "quicklogin.thirdpartycreate"),
            'thirdpartytype' => 1
        ]);
    if ($ret->is_succ()) {
//        \hellaEngine\support\dump($ret->toArray());
        __set_verify($ret->get_retdata()['verify']);
    }


    return $ret;


}

function __set_verify($verify)
{
    _setcookie("api_verify", $verify, 20 * 60);
}

function __get_verify()
{
    $verify = _getcookie("api_verify");
    if (is_null($verify)) {
        rpc_quicklogin_thirdpartylogin(__getWeibo_Uid());
        return _getcookie("api_verify");
    }
    return $verify;
}

function rpc_createrole_createrole($roleName, $sex)
{

    return callRpc('createrole.createrole',
        [
            'rolename' => $roleName,
            'sex' => $sex,
        ], [
            'verify' => __get_verify()
        ]);
}

function rpc_role_setheadiconurl($url)
{
    return callRpc('role.setheadiconurl',
        [
            'url' => $url,
        ],
        [
            'verify' => __get_verify()
        ]);
}

function rpc_role_getRoleInfo()
{
    return __help__createSingleArrayAdapterRpc('role.getroleinfo',
        [
        ], ['verify' => __get_verify()]);
}


function rpc_get_pay()
{
    $payMethods = [
        [
            "pay_id" => 1,
            "pay_name" => "微博支付"
        ]
    ];

    return __createMultiArrayAdapter($payMethods, \arrayAdapter\payAdapter::class);
}

function rpc_records_getActiveRecords()
{
    return __help__createMultiArrayAdapterRpc(
        'records.getActiveRecords', [], [
            'verify' => __get_verify()
        ]
    );
}

/**
 * @param $goodsId
 * @return \arrayAdapter\arrayAdapter
 */
function rpc_records_getRecordsByGoodsId($goodsId)
{
    return __help__createSingleArrayAdapterRpc(
        'records.getRecordsBuyGoodsId',
        [
            "goodsId" => $goodsId
        ], [
            'verify' => __get_verify()
        ]
    );
}

function rpc_records_getAcceptRecords($start = 0, $count = 10)
{
    return __help__createMultiArrayAdapterRpc(
        'records.getAcceptRecords',
        [
            'start' => $start,
            'count' => $count
        ],
        [
            'verify' => __get_verify()
        ]
    );
}