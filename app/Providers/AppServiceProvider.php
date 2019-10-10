<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $relation=[
            'admin' => 'App\Models\Admin'
        ];
        try{

        }catch (\Exception $exception)
        {
            //取得安装插件
            $plugin=get_plugins_data();

            //取得插件目录
            $plugin_path = get_plugin_path();

            if(!empty($plugin))
            {

                foreach ($plugin as $k=>$v) {

                    $route_path = $plugin_path . $v['ename'] . '/relation.php';

                    if(file_exists($route_path))
                    {
                        $plugin_reation=require_once $route_path;

                        $relation=array_merge($relation,$plugin_reation);
                    }

                }

            }
        }

        //去掉重复
        $relation=array_unique($relation);

        //注册关系
        Relation::morphMap($relation);

        //注册验证手机规则
        Validator::extend('mobile', 'App\Rules\Mobile@passes');

    }
}
