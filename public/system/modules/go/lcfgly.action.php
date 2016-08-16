<?php

/*
 * 揭晓结果
 * 作者: kinwyb<kinwyb@aliyun.com>
 * 时间: 2016-7-24 15:15:32
 */

defined('G_IN_SYSTEM')or exit('No permission resources.');
System::load_app_class('base', 'member', 'no');
System::load_app_fun('my');
System::load_app_fun('user');
System::load_sys_fun('user');
System::load_app_fun("pay", "pay");

class lcfgly extends base {

    private $db;

    public function __construct() {
        $this->db = System::load_sys_class('model');
    }
	
    /**
     * 手动揭晓结果
     */
    public function jxjg() {
        $itemid = abs(intval(safe_replace($this->segment(4))));
        $item = $this->db->GetOne("select * from `@#_shoplist` where shenyurenshu=0 and `id`='" . $itemid . "' AND q_uid is NULL order by `qishu` DESC LIMIT 1");
        if (!$item)
            _message("没有这个商品！", WEB_PATH, 3);
        $this->db->Autocommit_start();
        $query_insert = pay_insert_shop($item, 'add');
        if (!$query_insert) {
            $this->db->Autocommit_rollback();
            _message("奖品揭晓失败！", WEB_PATH, 3);
        } else {
            $this->db->Autocommit_commit();
            _message("奖品揭晓成功！", WEB_PATH, 3);
        }
    }

}
