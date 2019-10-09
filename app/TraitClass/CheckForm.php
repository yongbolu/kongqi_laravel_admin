<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ Laravel快速后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------
namespace App\TraitClass;

use Validator;

trait CheckFormTrait
{

    public $checkErrorSuffix = "<br/>";//输出验证表单的后缀连接符
    /**
     * 组定义验证验证表单
     * @param $request_data 来源数据
     * @param $check_data 验证规则
     * @param $message_data 验证规则对应提示
     * @param array $filed_name_data 全局字段名字对应关系名字
     * @return array 如果空数组，则表示无错误，
     */
    protected function checkForm($request_data, $check_data, $message_data = [], $filed_name_data = [])
    {
        $validator = Validator::make($request_data, $check_data, $message_data, $filed_name_data);
        if ($validator->fails()) {
            return $validator->errors();
        }

        return [];
    }

    /**
     * 错误输出表单转换格式
     * @param $error
     * @return array|\Illuminate\Http\JsonResponse
     */
    protected function checkFormErrorFormat($error)
    {
        $error = $error->all();
        if (empty($error)) {
            return [];
        }
        $error_str = '';
        $error_arr = [];
        foreach ($error as $k => $v) {

            $error_str .= $v . "*" . $this->formErrorSuffix();
            $error_arr[] = $v;

        }
        return (['msg' => $error_str, 'data' => $error_arr, 'code' => 55]);

    }
    public function formErrorSuffix(){
        return $this->checkErrorSuffix;
    }


}