<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends BaseModel
{
    protected $guarded = [];
    public static function add($data)
    {
        $m=new self();
        foreach ($data as $k=>$v)
        {
            $m->$k=$v;
        }
        $r=$m->save();
        if($r)
        {
            return true;
        }
        return false;
    }
}
