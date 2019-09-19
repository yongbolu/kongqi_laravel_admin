<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExcelController extends BaseController
{
    //
    public function  import(Request $request)
    {
      return $this->display();

    }
}
