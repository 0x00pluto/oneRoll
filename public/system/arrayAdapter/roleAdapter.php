<?php
/**
 * Created by PhpStorm.
 * User: zhipeng
 * Date: 16/8/22
 * Time: 下午6:01
 */
namespace arrayAdapter;
class roleAdapter extends arrayAdapter
{
    protected $keyMap = [
        'money' => ""
    ];


    public function getMoneyAttribute()
    {
        return $this->data['diamond'];
    }
}