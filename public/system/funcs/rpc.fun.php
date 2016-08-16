<?php


class CommonUtils
{


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
 * @return \hellaEngine\RPCMessage\RPCMessageReturn
 */
function callRpc($cmd, array $params = [])
{

    $sendMessage = \hellaEngine\RPCMessage\RPCMessage::createWithRpc($cmd, $params);
    $sendMessage->setMessageBodyProperty('clientVersion', '2.0.0');

    $responseOrigin = CommonUtils::http("http://oneroll.tomatofuns.com/", ['data' => $sendMessage->encode()]);
    if ($responseOrigin['http_code'] != 200) {
        throw new \RuntimeException();
    }

    $responseMessages = \hellaEngine\RPCMessage\RPCMessage::decode($responseOrigin['response']);
    $responseMessage = $responseMessages[0];

    return $responseMessage->toRpcMessageReturn();

}