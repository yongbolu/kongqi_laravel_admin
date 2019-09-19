<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ErrorController extends BaseController
{
    //
    public function index($code)
    {
        $msg = '';
        switch ($code) {
            case '401':
                $msg = '没有权限';
                $this->setModelControllerView('401');
                break;
        }
        return $this->display(['message' => $msg]);
    }
}
