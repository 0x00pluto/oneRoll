<?php

System::load_sys_class("model", 'sys', 'no');
System::load_sys_fun("rpcadapter");
System::load_sys_class('arrayProbe');
//System::load_sys_class('arrayAdapter');

/**
 * Created by PhpStorm.
 * User: zhipeng
 * Date: 16/8/17
 * Time: 上午11:58
 */
class rpcmodel extends model
{
    /**
     * function..key
     */
    const KEY_FUNCTION = "function";
    /**
     * key..map
     */
    const KEY_ADAPTER_CLASS = "Adapter";


    /**
     * getList 适配器
     * @var array
     */
    private $getListAdapter = [];

    /**
     * rpcmodel constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->bootstrap();
    }

    /**
     * 启动
     */
    private function bootstrap()
    {

        //注册适配器

        $this->addGetAdapter(
            'select * from `@#_wap`',
            "rpc_a_get_wap");

        $this->addGetAdapter("select * from `@#_shoplist` where `q_end_time` !='' ORDER BY `q_end_time` DESC LIMIT 4",
            "rpc_a_get_shop_list",
            \arrayAdapter\shopItemAdapter::class);

        $this->addGetAdapter("select * from `@#_shoplist` where `q_uid` is null order by `shenyurenshu` asc",
            "rpc_a_get_shop_active_list",
            \arrayAdapter\shopItemAdapter::class);

        $this->addGetAdapter("select * from `@#_shoplist` where `q_uid` is null order by `shenyurenshu` asc limit 0,10",
            "rpc_a_get_shop_active_list",
            \arrayAdapter\shopItemAdapter::class);

        $this->addGetAdapter("select * from `@#_category` where `model`='1' and `parentid` = '0' order by `order` desc",
            "rpc_a_get_category",
            \arrayAdapter\categoryAdapter::class);

        $this->addGetAdapter("select `cateid`,`name`,`pic_url` from `@#_category` where `model`='1' and `parentid` = '0' order by `order` desc",
            "rpc_a_get_category",
            \arrayAdapter\categoryAdapter::class);
        $this->addGetAdapter("select * from `@#_category` where `model`='1' order by `order` desc",
            "rpc_a_get_category",
            \arrayAdapter\categoryAdapter::class);

        $this->addGetAdapter("select * from `@#_article` where cateid = 142 order by posttime DESC limit 4",
            "rpc_a_get_article",
            \arrayAdapter\articleAdapter::class);

    }


    private function addGetAdapter($key, $functionName, $adapterClassName = '\arrayAdapter\arrayAdapter')
    {
        $this->getListAdapter[$key] = [
            self::KEY_FUNCTION => $functionName,
            self::KEY_ADAPTER_CLASS => $adapterClassName
        ];
    }


    /**
     * 创建读取适配器
     * @param $datas
     * @param string $adapterClassName
     * @return array
     */
    private function createMultiArrayAdapter($datas, $adapterClassName)
    {
        $arrayAdapters = [];
        foreach ($datas as $data) {
            $arrayAdapters[] = new $adapterClassName($data);
        }
        return $arrayAdapters;
    }

    public function GetList($sql, $info = array('type' => 1, 'key' => ''))
    {
        if (isset($this->getListAdapter[$sql])) {

            $callReturnArrays = call_user_func_array($this->getListAdapter[$sql][self::KEY_FUNCTION],
                [
                    $sql, $info
                ]);
            return $this->createMultiArrayAdapter($callReturnArrays, $this->getListAdapter[$sql][self::KEY_ADAPTER_CLASS]);
        }
        return [arrayProbe::create($sql)];
    }


    public function GetOne($sql, $info = array('type' => 1))
    {

        return arrayProbe::create($sql);
    }


}