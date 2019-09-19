<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Permission;
use Validator;

class AdminPermissionController extends BaseDefaultController
{
   public $pageName='权限规则';

   public function indexData()
   {
       $item=[];
       $item['all_create_url'] = action($this->route['controller_name'] . '@allCreate');
       $item['all_post_url'] = action($this->route['controller_name'] . '@allCreatePost');
       return $item;
   }

    /**
     * 表单验证
     * @param string $id
     * @return array
     */
    public function checkRule( $id='')
    {
        if (!$id) {
            return [
                'name' => 'required|unique:permissions,name',
                'cn_name' => 'required'
            ];
        }
        return [
            'name' => 'required|unique:permissions,name,' . $id,
            'cn_name' => 'required',

        ];
    }

    /**
     * 设置检验对应字段的名字输出
     * @return array
     */
    public function checkRuleField(){
        $messages = [
            'cn_name' => '权限名称',
            'name'=>'权限路由名'

        ];
        return $messages;
    }

    /**
     * 设置模型
     * @return Permission|mixed
     */
    public function setModel()
    {
        return $this->model=new Permission();
    }

    /**
     * 添加提交附加数据
     * @param $model
     * @return mixed
     */
    public function addPostData($model){
        $model->guard_name=$this->guardName;
        return $model;
    }

    /**
     * 创建/更新共享数据
     * @param string $id
     * @return array
     */
    public function createEditData($id='')
    {
        $roles = $this->getRole();// 获取所有角色
        $cate=$this->getPermission()->toArray();

        $cate = $this->tree($cate);


        return ['roles' => $roles, 'permissions' => $cate];
    }
    public function getRole()
    {
        return Role::where('guard_name', $this->guardName)->pluck('name','id');
    }


    public function getPermission()
    {
        return Permission::where('guard_name', $this->guardName)->get();
    }
    /**
     * JSON 列表输出项目设置
     * @param $item
     * @return mixed
     */
    public function apiJsonItem($item)
    {
        $item['pid']=$item['parent_id'];
        $item['edit_url'] = action($this->route['controller_name'] . '@edit', ['id' => $item->id]);
        $item['edit_post_url'] = action($this->route['controller_name'] . '@update', ['id' => $item->id]);

        return $item;
    }

    /**
     * 批量操作
     * @return mixed
     */
    public function allCreate(Request $request){

        return $this->display($this->createEditData());
    }

    public function allCreatePost(Request $request){

        $cn_name=$request->input('cn_name');
        $name=$request->input('name');
        $menu_name=$request->input('menu_name');
        $icon=$request->input('icon');
        //检验表单
        $error = $this->checkForm($request->all(), $this->checkRule(''), $this->checkRuleMsg(), $this->checkRuleField());
        if (count($error) > 0) {
            return $this->checkFormErrorFormat($error);
        };


        if($cn_name=='' || $name=='')
        {
            return $this->returnErrorApi('缺少参数');
        }
        //批量数据出初始化
       $arr=[
           'create'=>$cn_name.'添加',
           'edit'=>$cn_name.'编辑',
           'destroy'=>$cn_name.'删除',
           'show'=>$cn_name.'详情'

       ];
        $all_data=[];
        //先添加index，然后其他放在这个ID的父级
        $pid=$request->input('parent_id');
        $p_data=[
            'cn_name'=>$cn_name,
            'name'=>$name.'.index',
            'parent_id'=>$pid,
            'menu_name'=>$menu_name,
            'guard_name'=>'admin',
            'icon'=>$icon
        ];
        DB::beginTransaction();
        $pid_obj=Permission::create($p_data);
        if($pid_obj)
        {
            $pid=$pid_obj->id;
        }
        foreach ($arr as $k=>$v)
        {


            $all_data[]=[
                'cn_name'=>$v,
                'name'=>$name.'.'.$k,
                'parent_id'=>$pid,
                'menu_name'=>$v,
                'guard_name'=>'admin'
            ];
        }

        $all_r=Permission::insert($all_data);
        if($all_r && $pid_obj)
        {
            DB::commit();
            $this->insertLog('批量插入成功');
            return $this->returnOkApi('批量插入成功');
        }else
        {
            DB::rollBack();
            $this->insertLog('批量插入失败');
            return $this->returnErrorApi('批量插入失败');
        }


    }



}
