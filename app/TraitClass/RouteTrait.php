<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ Laravel快速后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------

namespace App\TraitClass;

use Illuminate\Support\Facades\Route;

trait RouteTrait
{

    public $route;
    public $namespace='App\\Http\\Controllers\\';
    public $controllerReplace='Controller';
    /**
     * 路由信息
     * @param $module
     * @return array
     */
    public function routeInfo($module)
    {
        $route_arr = explode('@', Route::currentRouteAction());
        $data = [];
        $data['route_name'] = Route::currentRouteName();
        $data['controller_name'] = '\\' . $route_arr[0];
        $data['action_name'] = strtolower($route_arr[1]);
        $data['controller_base'] = str_replace($this->controllerReplace, '', str_replace($this->namespace . $module . '\\', '', $route_arr[0]));
        $data['controller_base'] = str_replace('Controller', '', str_replace($this->namespace . $module . '\\', '', $data['controller_base']));

        $data['controller'] = '\\' . $route_arr[0];
        $data['controller_base_lower']=$this->toBlade($data['controller_base']);

       //dump($data);

        $this->route=$data;
        return $data;
    }
    public function toBlade($path){
        $arr= explode("\\",$path);
        return strtolower(implode(".",$arr));
    }

}