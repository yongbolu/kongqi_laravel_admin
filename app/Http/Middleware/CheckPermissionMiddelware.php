<?php

namespace App\Http\Middleware;


use Auth;
use Route;
use Closure;


class CheckPermissionMiddelware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $guard='admin';
        $admin=Auth::guard($guard)->user();




        //超级管理员
        if($admin->is_root)
        {
            return $next($request);
        }

        //替换几个规则
        $on_route=Route::currentRouteName();
        $on_route_arr=explode(".",$on_route);
        if(isset($on_route_arr[2]))
        {
            //提交，更新，导入，批量插入进行转换
            if(in_array($on_route_arr[2],['store','all_create','import_post','all_create'])){
                $on_route_arr[2]='create';
            }
            if(in_array($on_route_arr[2],['update','edit_list'])){
                $on_route_arr[2]='edit';
            }
            if(in_array($on_route_arr[2],['list'])){
                $on_route_arr[2]='index';
            }

            $on_route=implode(".",$on_route_arr);
        }

        //放行路由
        if(in_array($on_route,['admin.home','admin.error','admin.admin.password','admin.admin.password_post','admin.home.home']))
        {
            return $next($request);
        }


        //权限判断
        try{
            if(!$admin->hasPermissionTo($on_route,$guard))
            {

                if ($request->ajax() || $request->wantsJson()) {
                    return response()->json(['code'=>1000,'msg'=>'没有权限']);
                } else {
                    return redirect()->route('admin.error',['code'=>401]);
                }
            }
        }catch (\Exception $exception)
        {
            return redirect()->route('admin.error',['code'=>401]);
        }





        return $next($request);
    }
    public function getRouteInfo($type=0){
        $arr=[];
        $route_arr=explode('@', Route::currentRouteAction());
        $arr['controller']=str_replace('Controller','',str_replace('App\\Http\\Controllers\\Admin\\','',$route_arr[0]));
        //$arr['action']=$route_arr[1];
        if($type==1)
        {
            return   strtolower($arr['action']);
        }
        return strtolower(implode('/',$arr));
    }
}
