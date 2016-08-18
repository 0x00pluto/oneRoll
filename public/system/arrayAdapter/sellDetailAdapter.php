<?php
/**
 * Created by PhpStorm.
 * User: zhipeng
 * Date: 16/8/18
 * Time: 下午6:26
 */

namespace arrayAdapter;


class sellDetailAdapter extends arrayAdapter
{
    protected $keyMap = [
        'uid' => "userid",
        'username' => "",
        'ip' => "",
        'gonumber' => "",
        'uphoto' => '',
        'time2' => ''
    ];


    public function getUserNameAttribute()
    {
        return $this->data['userinfo']['rolename'];
    }

    public function getIpAttribute()
    {
        return "127.0.0.1";
    }

    public function getGoNumberAttribute()
    {
        return 1;
    }

    public function getUphotoAttribute()
    {
        if (!empty($this->data['userinfo']['headiconurl'])) {
            return $this->data['userinfo']['headiconurl'];
        }
        return '';
    }

    public function getTime2Attribute()
    {
        return microt($this->data['selltime'] . "."
            . $this->data['rolltimeSpan'] % 1000);
    }


}