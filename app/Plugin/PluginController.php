<?php

namespace App\Plugin;

use \App\Http\Controllers\BaseController ;

class PluginController extends BaseController
{
    public $namespace = 'App\\Plugin\\';
    public $module = 'Plugin';//模块名字
    public $bladePrefix = '';
    public $controllerReplace='App\\Plugin\\';


}
