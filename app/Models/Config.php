<?php

namespace App\Models;

class Config extends BaseModel
{
    //
    public static function config($field=''){
        $key='system_config';
        if($field)
        {
            $key=$key.'.'.$field;
        }
        return config_cache($key);

    }
    public static function field($fields=[]){
        if (sizeof($fields)>0){
            return self::whereIn('ename',$fields)->pluck('content','ename');
        }
        return self::pluck('content','ename');
    }
}
