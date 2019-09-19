<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;

class AdminRoleController extends BaseDefaultController
{
    public $pageName = '权限角色';

    /**
     * 设置模型
     * @return mixed|void
     */
    public function setModel()
    {
        $this->model = new Role();
    }


    public function permissions($permissions, $role = '')
    {


       // dump($role->hasPermissionTo());
        $permissions = $this->tree($permissions);
        foreach ($permissions as $key1 => $item1) {
            $permissions[$key1]['own'] = $role ? $role->hasPermissionTo($item1['id']) ? 'checked' : false : false;
            if (isset($item1['_child'])) {
                foreach ($item1['_child'] as $key2 => $item2) {
                    $permissions[$key1]['_child'][$key2]['own'] = $role ? $role->hasPermissionTo($item2['id']) ? 'checked' : false : false;
                    if (isset($item2['_child'])) {
                        foreach ($item2['_child'] as $key3 => $item3) {
                            $permissions[$key1]['_child'][$key2]['_child'][$key3]['own'] = $role ? $role->hasPermissionTo($item3['id']) ? 'checked' : false : false;
                        }
                    }
                }
            }

        }
        return $permissions;
    }

    public function createEditData($show = '')
    {
        $permissions = Permission::where('guard_name', $this->guardName)->get()->toArray();
        $permissions = $this->permissions($permissions, $show);

        return ['permissions' => $permissions];

    }

    public function checkRule($id = '')
    {
        if (!$id) {
            return [
                'name' => 'required|unique:roles,name',
                'permissions' => 'required',
            ];
        }
        return [
            'name' => 'required|unique:roles,name,' . $id,
            'permissions' => 'required',

        ];
    }

    public function checkRuleField()
    {
        $messages = [
            'name' => '名称',
            'permissions' => '权限规则必填',
        ];
        return $messages;
    }

    public function getModel()
    {
        return new Role();
    }

    /**
     * 添加提交附加数据
     * @param $model
     * @return mixed
     */
    public function addPostData($model)
    {
        $model->guard_name = $this->guardName;
        return $model;
    }

    public function afterSave($model, $id = '')
    {
        $permissions = $this->rq->input('permissions');
        if ($id) {
            $p_all = Permission::where('guard_name', $this->guardName)->pluck('id');//获取所有权限
            $p = Permission::whereIn('id', $permissions)->pluck('id');

            //移除
            $model->revokePermissionTo($p_all);
            //附加
            $model->givePermissionTo($p);
        } else {

            $p = Permission::whereIn('id', $permissions)->pluck('id');
            $model->givePermissionTo($p);
        }

    }


}
