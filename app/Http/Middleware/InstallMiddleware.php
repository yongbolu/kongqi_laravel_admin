<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class InstallMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        //判断数据库是否设置了
        $install_file=linux_path(base_path()).'/install';
        if(!file_exists($install_file))
        {
            //跳转到安装
            return redirect()->route('kongqi.install');
        }

        return $next($request);
    }
}