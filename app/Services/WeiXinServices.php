<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ Laravel快速后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------
namespace App\Services;

use EasyWeChat\Factory;

class WeiXinServices
{
    public static $app;

    /**
     * 配置
     * @param $app_id
     * @param $secret
     * @param $config
     */
    public static function config($app_id, $secret, $config=[])
    {
        $config_default = [
            'app_id' => $app_id,
            'secret' => $secret,
        ];
        $config_default = $config + $config_default;

        self::$app = Factory::officialAccount($config_default);
    }

    /**
     * 发起授权
     * @param string $type
     * @param string $url
     * @return mixed
     */
    public static function auth($url = '',$type = 'snsapi_userinfo')
    {
        $app = self::$app;
        $url = $url ?: request()->fullUrl();


        //发起授权
        $response= $app->oauth->scopes([$type])->redirect($url);
        return $response;
    }

    public static function share($apis,$url='',$open_debug=false,$is_arr=1)
    {
        $url=$url?$url:request()->fullUrl();
        return self::$app->jssdk->setUrl($url)->buildConfig( $apis, $debug = $open_debug, $beta = false, $json = !$is_arr);
    }

    /**
     * 取得授权用户信息
     * @return mixed
     */
    public static function getUser()
    {
        $app = self::$app;
        return $app->oauth->user();
        /*
         * // $user 可以用的方法:
        // $user->getId();  // 对应微信的 OPENID
        // $user->getNickname(); // 对应微信的 nickname
        // $user->getName(); // 对应微信的 nickname
        // $user->getAvatar(); // 头像网址
        // $user->getOriginal(); // 原始API返回的结果
        // $user->getToken(); // access_token， 比如用于地址共享时使用
         * */
    }
}