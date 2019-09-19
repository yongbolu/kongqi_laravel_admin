<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class HomeController extends BaseController
{
    //
    public function index(){
        return $this->display();
    }
    public function console(){
        return $this->display();
    }
    public function plugin($ename){
        return $this->display(['side_menu_type'=>'plugin.'.strtolower($ename)]);
    }
}
