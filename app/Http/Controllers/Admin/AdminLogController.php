<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLogController extends BaseDefaultController
{
    public $pageName='操作日志';

    /**
     * JSON 列表输出项目设置
     * @param $item
     * @return mixed
     */
    public function apiJsonItem($item)
    {

        return $item;
    }


    public function setModel()
    {
        return $this->model=new AdminLog();
    }


}
