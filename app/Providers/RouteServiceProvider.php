<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
        //后台路由
        $this->mapWebAdminRoutes();
        //如果数据库没有配置，忽略下面加载，避免报错
        try{
            //插件路由
            $this->mapPluginRoutes();
        }catch (\Exception $exception)

        {

        }




    }

    protected function mapPluginRoutes()
    {
        //取得安装插件
        $plugin=get_plugins_data();
        if(empty($plugin))
        {
            return false;
        }
        //取得插件目录
        $plugin_path = get_plugin_path();
        foreach ($plugin as $k=>$v)
        {

            $route_path=$plugin_path.$v['ename'].'/frontRoute.php';
            //判断这个路由文件是否存在，如果存在则进行读取
            if(file_exists($route_path))
            {
                $this->addRoute($route_path,$v['ename'],'plugin.'.strtolower($v['ename']).'.');
            }
            $route_path=$plugin_path.$v['ename'].'/adminRoute.php';
            //判断这个路由文件是否存在，如果存在则进行读取
            if(file_exists($route_path))
            {
                //后台增加路由前缀命名为admin.plugin.
                $this->addRoute($route_path,$v['ename'],'admin.plugin.'.strtolower($v['ename']).'.','admin/plugin/'.strtolower($v['ename']).'/');
            }
            $route_path=$plugin_path.$v['ename'].'/helper.php';
            if(file_exists($route_path))
            {
                //加载函数

                require_once $route_path;
            }

        }


    }

    /**
     * 添加路由信息
     * @param array|string $route_path
     * @param string $v
     * @param string $name
     * @param string $prefix
     * @return \Illuminate\Routing\Route|void
     */
    public function addRoute($route_path,$v,$name='',$prefix=''){
        Route::middleware('web')->name($name)->prefix($prefix)
            ->namespace(  'App\Plugin\\'.$v)
            ->group($route_path);


    }

    protected function mapWebAdminRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace . '\Admin')
            ->group(base_path('routes/admin.php'));
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
