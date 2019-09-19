<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;

class TextController extends BaseDefaultController
{
    //绑定操作的模型
    public function setModel()
    {
        return $this->model=new Admin();
    }
    /**
     * 表单验证规则
     * @param string $id 存在的时候表示更新
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
    public function checkRuleField()
    {
        return [

            'password' => '密码',
            'account' => '账号',

        ];
    }
    //首页需要输出到模板里面的数据，返回数组
    public function indexData()
    {
        return ['hello'=>'你好'];//那样前端首页模板，就可以用{{ $hello }}这个变量取值
    }
    //添加和修改共享数据，返回数组，$show不为空时，表示修改，那么$show就是这个的编辑的实例查询数据
    public function createEditData($show = '')
    {
        return ['navs'=>[['id'=>'1','name'=>'熊猫'],['id'=>'2','name'=>'老虎']]];//那么在编辑和输出，可以使用变量{{ $nav }}
    }
    //如果你需要去掉默认的编辑和删除按钮，就在这里面重写，最后要返回$item
    public function apiJsonItem($item)
    {
        $item->hello='你好';//首页输出字段就会多了个hello
        return $item;
    }
    //如果不需要去除”编辑和删除按钮“，那么就在里面重写列表输出的字段内容。需要返回$item
    public function apiJsonItemExtend($item)
    {
        $item->hello='你好';//首页输出字段就会多了个hello
        return $item;
    }
    //模型这个操作完之后，你还需要做的事情，可以在里面写，例如我更新缓存，更新日志等
    public function afterSave($model, $id = '')
    {
    }
    //创建，更新之前需要干的事情
    protected function beforeSave($model, $id = '')
    {
    }
    /**
     * 是否开启事务
     * @return bool 真表示开启
     */
    protected function beginDb($data, $id = '')
    {
        return isset($data['begin_db']) ? $data['begin_db'] : 0;
    }

}
