<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ Laravel快速后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------
namespace App\Models;

use App\TraitClass\SearchScopeTrait;


class Permission extends \Spatie\Permission\Models\Permission
{

    use SearchScopeTrait;

    protected $guarded = [];


}
