<?php

namespace App\Http\Controllers\Admin;

use App\Models\Config;
use App\Models\Logo;
use App\Models\Media;
use App\Models\Progress;
use App\Models\Themes;
use App\Services\RedisSiteServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;

class ConfigController extends BaseDefaultController
{
    public $pageName = '配置';

    public function index()
    {
        $config_name=\request()->input('type','');
        if($config_name)
        {
            return $this->setModelControllerView($config_name);
        }
        $config = config_cache($config_name,$config_name);
        $config = is_array($config) ? $config : [];

        return $this->display($config);
    }


    public function setModel()
    {
        return new Config();
    }

    public function store( Request $request)
    {
        $config_name=$request->input('type','');
        config_cache($config_name,  $config_name,$request->all());
        $this->insertLog('系统配置成功');
        return $this->returnOkApi('设置成功');

    }
}
