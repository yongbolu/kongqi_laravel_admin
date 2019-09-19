<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminLog extends BaseModel
{
    //
    public static function addLog($str){
        $table=new self();
        $table->admin_id=admin('id');
        $table->name=admin('nickname');
        $table->ip=request()->getClientIp();
        $table->mark=$str;
        $table->url=request()->path();//操作路径

        return $table->save();
    }
    public function users(){
        return $this->belongsTo('App\Models\Admin','admin_id','id');
    }
}
