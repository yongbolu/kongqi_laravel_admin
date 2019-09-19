<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ Laravel快速后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------

/*****************************************杂项路由***********************************************/
//安装
Route::prefix('kongqi/install')->group(function ($route) {
    $route->any('/', 'Install\IndexController@index')->name('kongqi.install');
    $route->any('/test', 'Install\IndexController@test')->name('kongqi.test');
});




//验证码
Route::prefix('api/')->group(function ($route) {
    $route->get('captcha/{type?}', 'Api\CaptchaController@index')->name('api.captcha');

});



/*****************************************END杂项路由***********************************************/
