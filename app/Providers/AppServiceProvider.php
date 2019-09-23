<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $relation=[
            'admin' => 'App\Models\Admin'
        ];
        $plugin_path=get_plugin_path();
        $plugin_path_dir =get_dir($plugin_path,0);
        if(!empty($plugin_path_dir))
        {

            foreach ($plugin_path_dir as $k=>$v) {

                $route_path = $plugin_path . $v . '/relation.php';

                if(file_exists($route_path))
                {
                    $plugin_reation=require_once $route_path;

                    $relation=array_merge($relation,$plugin_reation);
                }

            }

        }
        //去掉重复
        $relation=array_unique($relation);

        //注册关系
        Relation::morphMap($relation);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

    }
}
