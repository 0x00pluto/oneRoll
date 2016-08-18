<?php
/**
 * Created by PhpStorm.
 * User: zhipeng
 * Date: 16/8/17
 * Time: 下午12:18
 */
System::load_sys_fun('rpc');

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
        "mall.goodsSellInfoDetail" => \arrayAdapter\sellDetailAdapter::class
    ];

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

function rpc_a_get_category($sql, $info)
{
    $categorys = [
        [
            'cateid' => 0,
            "name" => "充值卡类",
            "pic_url" => "cateimg/20160624/21233098701900.png",
        ],
        [
            'cateid' => 1,
            "name" => "手机平板",
//            http://m.goleme.cc/statics/uploads/cateimg/20160624/91389348701156.png
            "pic_url" => "cateimg/20160624/91389348701156.png",
        ],
        [
            'cateid' => 2,
            "name" => "电脑办公",
            //http://m.goleme.cc/statics/uploads/cateimg/20160624/93904973701670.png
            "pic_url" => "cateimg/20160624/93904973701670.png",
        ],
        [
            'cateid' => 3,
            "name" => "数码影音",
            //http://m.goleme.cc/statics/uploads/cateimg/20160624/99623723701730.png
            "pic_url" => "cateimg/20160624/99623723701730.png",
        ],
        [
            'cateid' => 4,
            "name" => "家电电器",
            //http://m.goleme.cc/statics/uploads/cateimg/20160624/78451848702114.png
            "pic_url" => "cateimg/20160624/78451848702114.png",
        ],
        [
            'cateid' => 5,
            "name" => "汽车服务",
            //http://m.goleme.cc/statics/uploads/cateimg/20160624/85576848702035.png
            "pic_url" => "cateimg/20160624/85576848702035.png",
        ],
        [
            'cateid' => 6,
            "name" => "食品饮料",
            //http://m.goleme.cc/statics/uploads/cateimg/20160717/28699920725439.png
            "pic_url" => "cateimg/20160624/28699920725439.png",
        ],
        [
            'cateid' => 7,
            "name" => "综合超市",
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