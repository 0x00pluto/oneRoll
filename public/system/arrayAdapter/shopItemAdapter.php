<?php
/**
 * Created by PhpStorm.
 * User: zhipeng
 * Date: 16/8/17
 * Time: 下午4:20
 */

namespace arrayAdapter;


class shopItemAdapter extends arrayAdapter
{
    protected $keyMap = [
        "q_user" => "",
        "q_showtime" => "",
        "id" => "id",
        "thumb" => "",
        "title" => "",
        "q_end_time" => "",
        "q_uid" => "",
        "qishu" => "",
        'money' => "",
        "canyurenshu" => "",
        "zongrenshu" => "",
        "shenyurenshu" => "",
        "q_user_code" => "",
        "picarr" => "",
        'LuckUserId' => "",
        'LuckRoleName' => "",
        "LuckRoleHeadIconURL" => "",
        "status" => "",
        "content" => ""
    ];


    public function getQShowtimeAttribute()
    {
        return 'N';
    }

    public function getTitleAttribute()
    {
        return $this->data['mallGoodsData']['goodsName'];
    }

    public function getThumbAttribute($value)
    {
        return "shopimg/20160728/60647127697356.png";
    }

    public function getContentAttribute()
    {
        return "";
    }

    public function getPicArrAttribute()
    {
        return [
            "shopimg/20160728/60647127697356.png",
            "shopimg/20160728/60647127697356.png"
        ];
    }

    public function getQUserAttribute()
    {
        return [];
    }

    public function getLuckRoleNameAttribute()
    {
        return $this->data['mallGoodsData']['goodsRollResult']['luckUserInfo']['rolename'];
    }

    public function getQishuAttribute()
    {
//        \hellaEngine\support\dump([
//            $this->data['mallGoodsData']['goodsPeriod'],
//            ]);
        return intval($this->data['mallGoodsData']['goodsPeriod']) + 1 + 10000000;
    }

    public function getMoneyAttribute()
    {
        return $this->data['mallGoodsData']['eachRollPrice'];
    }

    public function getCanyurenshuAttribute()
    {
        return $this->data['mallGoodsData']['selloutrollCount'];
    }

    public function getZongrenshuAttribute()
    {
        return $this->data['mallGoodsData']['rollCount'];
    }

    public function getQEndTimeAttribute()
    {
        if ($this->data['mallGoodsData']['status'] == 1 ||
            $this->data['mallGoodsData']['status'] == 2
        ) {
            return $this->data['mallGoodsData']['goodsRollResult']['rollTime'];
        } else {
            return null;
        }
    }

    public function getQUserCodeAttribute()
    {
        if ($this->data['mallGoodsData']['status'] == 2) {
            return $this->data['mallGoodsData']['goodsRollResult']['luckNum'];
        } else {
            return null;
        }
    }

    public function getLuckRoleHeadIconURLAttribute()
    {
        if ($this->data['mallGoodsData']['status'] == 2) {
            $url = $this->data['mallGoodsData']['goodsRollResult']['luckUserInfo']['headiconurl'];
            if (empty($url)) {
                return "photo/member.jpg";
            }
            return $url;
        } else {
            return "photo/member.jpg";
        }
    }

    public function getLuckUserIdAttribute()
    {
        if ($this->data['mallGoodsData']['status'] == 2) {
            return $this->data['mallGoodsData']['goodsRollResult']['luckUserId'];
        } else {
            return "-1";
        }
    }

    public function getShenyurenshuAttribute()
    {
        return $this['zongrenshu'] - $this['canyurenshu'];
    }


    public function getStatusAttribute()
    {
        return $this->data['mallGoodsData']['status'];
    }
}