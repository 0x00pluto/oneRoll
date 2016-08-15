<?php


class CommonReturnVar
{
    /**
     * 是否成功
     *
     * @var string
     */
    const DBKey_retsucc = "retsucc";

    /**
     * 返回code
     *
     * @var string
     */
    const DBKey_retcode = "retcode";

    /**
     * 返回数据
     *
     * @var string
     */
    const DBKey_retdata = "retdata";

    /**
     * 返回code str解释
     *
     * @var string
     */
    const DBKey_retcode_str = "retcode_str";

    /**
     *
     * 构建消息返回值
     *
     * @param bool $succ
     *            true or false
     * @param int $code
     *            代码
     * @param mixed $data
     *            扩展包含数据
     *
     * @return CommonReturnVar
     */
    public static function Ret($succ, $code = 0, $data = null, $code_string = '')
    {
        $succ = boolval($succ);
        $code = intval($code);
        $code_string = strval($code_string);
        $retarr = new self ($succ, $code, $data, $code_string);

        return $retarr;
    }

    /**
     *
     * 构建消息返回值(成功)
     *
     * @param mixed $data
     *            扩展包含数据
     * @param int $code
     *            代码
     *
     * @return CommonReturnVar
     */
    public static function RetSucc($code = 0, $data = null, $code_string = '')
    {
        return CommonReturnVar::Ret(true, $code, $data, $code_string);
    }

    /**
     *
     * 构建消息返回值(失败)
     *
     * @param mixed $data
     *            扩展包含数据
     * @param int $code
     *            代码
     *
     * @return CommonReturnVar
     */
    public static function RetFail($code = 0, $data = null, $code_string = '')
    {
        return CommonReturnVar::Ret(false, $code, $data, $code_string);
    }

    /**
     * 返回消息是否成功
     *
     * @param CommonReturnVar $retdata
     *            RetFail RetSucc Ret 返回结果
     */
    public static function isSucc($retdata)
    {
        return $retdata->get_retsucc();
    }

    /**
     * 返回消息是否失败
     *
     * @param CommonReturnVar $retdata
     *            RetFail RetSucc Ret 返回结果
     */
    public static function isFailed($retdata)
    {
        return !self::isSucc($retdata);
    }

    /**
     * 获得返回结果中的数据
     *
     * @param CommonReturnVar $retdata
     */
    public static function getdata($retdata)
    {
        return $retdata->get_retdata();
    }

    /**
     * 获得返回结果中的编码
     *
     * @param CommonReturnVar $retdata
     */
    public static function getcode($retdata)
    {
        return $retdata->get_retcode();
    }

    private $_data = array();

    function __construct($succ, $code = 0, $data = null, $code_string = '')
    {
        $succ = boolval($succ);
        $code = intval($code);
        $code_string = strval($code_string);
        $this->_data [self::DBKey_retsucc] = $succ;
        $this->_data [self::DBKey_retcode] = $code;
        $this->_data [self::DBKey_retdata] = $data;
        $this->_data [self::DBKey_retcode_str] = $code_string;
    }

    /**
     * 获取返回码
     *
     * @return number
     */
    function get_retcode()
    {
        return intval($this->_data [self::DBKey_retcode]);
    }

    /**
     * 是否成功
     *
     * @return boolean
     */
    function is_succ()
    {
        return $this->get_retsucc();
    }

    /**
     * 是否失败
     *
     * @return boolean
     */
    function is_failed()
    {
        return !$this->is_succ();
    }

    /**
     * 获取是否成功
     *
     * @return boolean
     */
    function get_retsucc()
    {
        return boolval($this->_data [self::DBKey_retsucc]);
    }

    /**
     * 设置失败
     */
    function set_failed()
    {
        $this->_data [self::DBKey_retsucc] = FALSE;
    }

    /**
     * 设置成功
     */
    function set_succ()
    {
        $this->_data [self::DBKey_retsucc] = TRUE;
    }

    /**
     * 获取返回数据
     * @return mixed
     */
    function get_retdata()
    {
        return $this->_data [self::DBKey_retdata];
    }

    function set_retdata($data)
    {
        $this->_data [self::DBKey_retdata] = $data;
    }

    /**
     * 获取返回码说明
     *
     * @return string
     */
    function get_retcode_str()
    {
        return strval($this->_data [self::DBKey_retcode_str]);
    }

    /**
     * 获取原始数组数据
     */
    function to_Array()
    {
        return $this->_data;
    }

    /**
     * 通过调用rpc调用返回
     *
     * @param array $message_arr
     * @return CommonReturnVar
     */
    static function create_with_message_arr(array $message_arr)
    {
        $ins = new self (false);
        $ins->_data = $message_arr ["data"];
        return $ins;
    }
}


class CommonUtils
{


    /**
     * 调用游戏rpc
     * @param $url
     * @param $cmd
     * @param array $params
     * @return array
     */
    static function callGameRpc($url, $cmd, array $params = [])
    {
        $message = \hellaEngine\RPCMessage\RPCMessage::createWithRpc($cmd,$params);
        $message->setMessageBodyProperty('clientVersion', '1.2.0');
        $ret = self::http($url, ['data'=>$message->encode()]);
        $response = \hellaEngine\RPCMessage\RPCMessage::decode($ret['response'])[0]->toArray();
        return CommonReturnVar::create_with_message_arr($response);
    }

    /**
     * 调用游戏rpc
     * @param $cmd
     * @param array $params
     * @return CommonReturnVar
     */
    static function callAPIRpc($cmd, array $params = [])
    {
        $params['clientVersion'] = "2.2.0";
        return self::callGameRpc('http://oneroll.tomatofuns.com/', $cmd, $params);
    }

    /**
     * 调用GMRPC
     * @param $cmd
     * @param array $params
     * @param null $specialUrl
     * @return CommonReturnVar
     */
    static function GMAPICall($cmd, array $params = [], $specialUrl = null)
    {
        $httpResponse = self::callAPIRpc($cmd, $params, $specialUrl);
        if ($httpResponse["http_code"] != 200) {
            return CommonReturnVar::RetFail(200, $httpResponse, 'httpcode_error');
        }
//        dump($httpResponse['response']);
        $jsonObject = json_decode($httpResponse['response'], true)[0];
//        dump($jsonObject);
        return CommonReturnVar::create_with_message_arr($jsonObject);
    }

    /**
     *
     * @param $url
     * @param string $query
     * @param string $method
     * @return array
     */
    static function http($url, $query = "", $method = 'POST')
    {
        $ch = curl_init();
        switch (strtoupper($method)) {
            case 'GET' :
                if (false === stripos($url, '?')) {
                    $url .= '?' . $query;
                } else {
                    $url .= '&' . $query;
                }
                break;
            case 'POST' :
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
                break;
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        $response = trim(curl_exec($ch));
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $result = array(
            "response" => $response,
            "http_code" => $http_code
        );
        return $result;
    }
}

/**
 * @param $cmd
 * @param array $params
 * @return CommonReturnVar
 */
function callRpc($cmd, array $params = []) {
    return CommonUtils::callAPIRpc($cmd,$params);
}