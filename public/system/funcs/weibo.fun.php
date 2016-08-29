<?php
/**
 * Created by PhpStorm.
 * User: zhipeng
 * Date: 16/8/22
 * Time: 上午10:51
 */
System::load_sys_fun('rpc');


function __getAccessToken()
{
    $access = _getcookie("ACCESS_TOKEN");
    if (!is_null($access)) {
        return $access['access_token'];
    }
    return null;
}

function __getWeibo_Uid()
{
    $access = _getcookie("ACCESS_TOKEN");
    if (!is_null($access)) {
        return $access['uid'];
    }
    return null;
}

function __weiboLogout()
{
    _clearCookie("ACCESS_TOKEN");
}

function __weiBoAuth()
{

//    var_dump(__weiBoIsLogin());
    if (!__weiBoIsLogin()) {
        $weibo = System::load_sys_config('thirdparty', 'weibo');
        $authUrl = $weibo['url'] . "oauth2/authorize?" .
            "client_id=" . $weibo['appid'] .
            "&redirect_uri=" . $weibo['redirecturi'] .
            "&display=mobile" .
            "&forcelogin=true" .
            "&scope=all";
        header("Location: " . $authUrl);
    }

}

/**
 * @return bool
 */
function __weiBoIsLogin()
{
    return !is_null(__getAccessToken());
}

function __weiBoAuto_AccessToken($code)
{
    $weibo = System::load_sys_config('thirdparty', 'weibo');

    $authUrl = "https://api.weibo.com/oauth2/access_token";

    $paramsUrl = $authUrl . "?" .
        'client_id=' . $weibo['appid'] .
        "&client_secret=" . $weibo['secret'] .
        "&grant_type=authorization_code" .
        "&code=$code" .
        "&redirect_uri=" . $weibo['redirecturi'];

    $urlResults = http($paramsUrl);

//    var_dump($urlResults);
    if ($urlResults["http_code"] == 200) {
        $response = json_decode($urlResults['response'], true);

        $result = _setcookie('ACCESS_TOKEN', $response, intval($response['expires_in']));

        $uid = $response['uid'];

        $callReturn = rpc_quicklogin_thirdpartycreate($uid);
        $callReturn = rpc_quicklogin_thirdpartylogin($uid);
        if ($callReturn->is_succ()) {
            $userInfo = __weiBo_UserInfo();

//            var_dump($callReturn);
//            var_dump($userInfo);
            if ($callReturn->get_retdata()['exists_role'] == false) {


                $callReturn = rpc_createrole_createrole($userInfo['name'], 0);
//
            }


            $callReturn = rpc_role_setheadiconurl($userInfo['profile_image_url']);
//            \hellaEngine\support\dump($callReturn->toArray());
        }
        //注册到后台账户
//        \hellaEngine\support\dump($callReturn->toArray());

//        var_dump($result);
    } else {

        _clearCookie('ACCESS_TOKEN');
    }
}

function __weiBo_UserInfo()
{
    $weibo = System::load_sys_config('thirdparty', 'weibo');
    $url = "https://api.weibo.com/2/users/show.json";
    $url .= "?access_token=" . __getAccessToken();
    $url .= "&uid=" . __getWeibo_Uid();

//    var_dump($url);
    $urlResult = http($url, "", "GET");

//    \hellaEngine\support\dump($urlResult);
//    var_dump($urlResult);
//    utf8
    return json_decode($urlResult['response'], true);
}

function __weibo_tokenInfo()
{
    $url = "https://api.weibo.com/oauth2/get_token_info";


    $params = [
        'access_token' => __getAccessToken()
    ];


    $urlResult = http($url, httpParams($params));


}



