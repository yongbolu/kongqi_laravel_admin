<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ Laravel快速后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\TraitClass\SearchScopeTrait;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class BaseModel extends Model
{
    use SearchScopeTrait;
    protected $guarded = [];


}
