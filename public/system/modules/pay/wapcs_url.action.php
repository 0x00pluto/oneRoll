<?php
defined('G_IN_SYSTEM') or exit('No permission resources.');
ini_set("display_errors", "OFF");
//include dirname(__FILE__) . '/lib/weixin.class.php';

class wapcs_url extends SystemAction
{
	private $out_trade_no;

	public function __construct()
	{
		$this->db = System::load_sys_class('model');
	}

	public function qiantai()
	{	
		$path = G_HTTP.G_HTTP_HOST;
		$path .= str_replace($_SERVER['PATH_INFO'],'',$_SERVER['SCRIPT_NAME']);
		$out_trade_no = empty($_GET['out_trade_no']) ? '' : $_GET['out_trade_no'];
		if(empty($out_trade_no)){
			_messagemobile("支付失败",$path . "/mobile/home/userrecharge");
			exit();
		}
		$dingdaninfo = $this->db->GetOne("select * from `@#_member_addmoney_record` where `code` = '$out_trade_no'");
		if (!$dingdaninfo || $dingdaninfo['status'] == '未付款') {
			_messagemobile("支付失败",$path . "/mobile/home/userrecharge");
		} else {
			if (empty($dingdaninfo['scookies'])) {
				_messagemobile("充值成功!",$path . "/mobile/home/userbalance");
			} else {
				if ($dingdaninfo['scookies'] == '1') {
					_messagemobile("支付成功!",$path . "/mobile/cart/paysuccess");
				} else {
					_messagemobile("商品还未购买,请重新购买商品!",$path . "/mobile/cart/cartlist");
				}
			}
		}
	}

	public function houtai()
	{
		$sign = empty($_GET['sign'])? '' : $_GET['sign'];
		$out_trade_no = empty($_GET['out_trade_no'])? '' : $_GET['out_trade_no'];
		$status = empty($_GET['status'])? '' : $_GET['status'];
		if(empty($out_trade_no) || empty($status)){
			echo '缺少参数';
			exit();
		}
		//if(empty($sign) || empty($out_trade_no) || empty($status)){
		//	echo '缺少参数';
		//	exit();
		//}
		
		if ($status == 'success') {
			$this->out_trade_no = $out_trade_no;
			$ret = $this->cs_chuli();
			echo 'ok';
			exit();
		} else {
			echo 'ok';
			exit();
		}
	}

	public function houtai_cs()
	{
		$sign = empty($_GET['sign'])? '' : $_GET['sign'];
		$out_trade_no = empty($_GET['out_trade_no'])? '' : $_GET['out_trade_no'];
		$status = empty($_GET['status'])? '' : $_GET['status'];
		if(empty($sign) || empty($out_trade_no) || empty($status)){
			echo "缺少参数";
			exit();
		}
		
		if ($status == 'success') {
			//echo json_encode(array('status' => 'successs'));die;
			$this->out_trade_no = $out_trade_no;
			$ret = $this->cs_chuli();
			echo json_encode(array('status' => 'success'));
			exit();
		} else {
			echo "失败";
			exit();
		}
	}

	private function cs_chuli()
	{
		$pay_type = $this->db->GetOne("SELECT * from `@#_pay` where `pay_class` = 'weixin' and `pay_start` = '1'");
		$out_trade_no = $this->out_trade_no;
		$dingdaninfo = $this->db->GetOne("select * from `@#_member_addmoney_record` where `code` = '$out_trade_no'");
		if (!$dingdaninfo) {
			return false;
		}
		if ($dingdaninfo['status'] == '已付款') {
			return '已付款';
		}
		$c_money = intval($dingdaninfo['money']);
		$uid = $dingdaninfo['uid'];
		$time = time();
		$this->db->Autocommit_start();
		$up_q1 = $this->db->Query("UPDATE `@#_member_addmoney_record` SET `pay_type` = '测试支付', `status` = '已付款' where `id` = '$dingdaninfo[id]' and `code` = '$dingdaninfo[code]'");
		$up_q2 = $this->db->Query("UPDATE `@#_member` SET `money` = `money` + $c_money where (`uid` = '$uid')");
		$up_q3 = $this->db->Query("INSERT INTO `@#_member_account` (`uid`, `type`, `pay`, `content`, `money`, `time`) VALUES ('$uid', '1', '账户', '充值', '$c_money', '$time')");
		if ($up_q1 && $up_q2 && $up_q3) {
			$this->db->Autocommit_commit();
		} else {
			$this->db->Autocommit_rollback();
			return '充值失败';
		}
		if (empty($dingdaninfo['scookies'])) {
			return "充值完成";
		}
		$scookies = unserialize($dingdaninfo['scookies']);
		$pay = System::load_app_class('pay', 'pay');
		$pay->scookie = $scookies;
		$ok = $pay->init($uid, $pay_type['pay_id'], 'go_record');
		if ($ok != 'ok') {
			$_COOKIE['Cartlist'] = '';
			_setcookie('Cartlist', NULL);
			return '商品购买失败';
		}
		$check = $pay->go_pay(1);
		if ($check) {
			$this->db->Query("UPDATE `@#_member_addmoney_record` SET `scookies` = '1' where `code` = '$out_trade_no' and `status` = '已付款'");
			$_COOKIE['Cartlist'] = '';
			_setcookie('Cartlist', NULL);
			return "商品购买成功";
		} else {
			return '商品购买失败';
		}
	}

	public function error()
	{	
		$path = G_HTTP.G_HTTP_HOST;
		$path .= str_replace($_SERVER['PATH_INFO'],'',$_SERVER['SCRIPT_NAME']);
		_messagemobile("支付错误，请联系管理员",$path . "/mobile/home/userrecharge");
		exit();	
	}
}