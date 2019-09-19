<?php

namespace App\Http\Controllers;

use App\TraitClass\ApiTrait;
use App\TraitClass\BladeTrait;
use App\TraitClass\RouteTrait;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $routeInfo;
    use BladeTrait;
    use RouteTrait;
    use ApiTrait;
    public function __construct()
    {
        $this->routeInfo = $this->routeInfo($this->module);
        //共享路由信息到变量
        $this->getBlade();

    }
    protected function getTable(){

    }
    public function pageName()
    {

    }

}
