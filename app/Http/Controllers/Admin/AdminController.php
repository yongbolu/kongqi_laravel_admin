<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends BaseDefaultController
{

    /**
     * 设置数据
     * @param string $id
     * @return mixed
     */
    public function postData($id = '')
    {
        $data = $this->rq->all();
        if ($id) {
            //编辑密码不填，不修改
            if (!$this->rq->input('password')) {
                unset($data['password']);
            }
        }
        return $data;
    }

    /**
     * 设置模型
     * @return mixed|void
     */
    public function setModel()
    {
        $this->model = new Admin();
    }

    /**
     * 编辑页面/创建页面共享数据
     * @param string $show
     * @return array
     */
    public function createEditData($show = '')
    {
        $permissions = Role::select(['name as route_name','id','cn_name as name'])->where('guard_name', $this->guardName)->get();

        return ['role' => $permissions];

    }

    /**
     * 表单验证规则
     * @param string $id
     * @return array
     */
    public function checkRule($id = '')
    {
        if (!$id) {
            return [

                'password' => 'required',
                'account' => 'required',

            ];
        }
        return [

            'account' => 'required',

        ];

    }

    public function afterSave($model, $id = '')
    {
        $roles = $this->rq->input('roles');
        //dd($roles);
        if ($id) {
            // 检查是否某个角色被选中
            if (isset($roles)) {
                $model->roles()->sync($roles);

            } else {
                $model->roles()->detach(); // 如果没有选择任何与用户关联的角色则将之前关联角色解除
            }
        } else {

            if (!empty($roles)) { // 如果选择了角色
                // 检查是否某个角色被选中
                $role_r = Role::whereIn('id', $roles)->pluck('id');
                $model->assignRole($role_r); //Assigning role to user
            }
        }

    }
    public function apiJsonItemExtend($item)
    {
       $item->roles_arr=$item->roles->pluck('cn_name')->toArray();
       return $item;
    }

    public function password()
    {
        return $this->display();
    }

    public function passwordPost(Request $request)
    {

        $error = $this->checkForm($request->all(), [
            'old_password' => 'required',
            'password' => 'required',
        ], [], ['old_password' => '旧密码']);
        if (count($error) > 0) {
            return $this->checkFormErrorFormat($error);
        };
        //检验密码是否正确
        $old_password=$request->input('old_password');
        $new_password=$request->input('password');
        $admin=admin();
        if(Hash::check($old_password,$admin->password)){
            //进行更新
            $admin->password=($new_password);
           $r= $admin->save();
           if($r)
           {
               $this->insertLog('修改密码成功');
               return $this->returnOkApi('修改密码成功');
           }
            $this->insertLog('修改密码失败');
            return $this->returnErrorApi('修改密码失败');
        }
        $this->insertLog('修改密码,旧密码不正确');
        return $this->returnErrorApi('旧密码不正确');
    }

}
