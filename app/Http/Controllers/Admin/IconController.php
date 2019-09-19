<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IconController extends BaseController
{
    //
    public function index(){
        return $this->display();
    }
}
