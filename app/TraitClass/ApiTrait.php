<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ Laravel快速后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------

namespace App\TraitClass;

trait ApiTrait
{
    public $apiToArray = 0;//API将API转换成数组输出

    /**
     * 输出API格式
     * @param $code 业务代码
     * @param $msg 提示信息
     * @param $data 数据
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function returnApi($code, $msg, $data = [])
    {
        $json_data = [
            'code' => $code,//业务代码
            'msg' => $msg,
            'data' => $data
        ];
        if ($this->apiToArray == 1) {
            return $json_data;
        }
        return response()->json($json_data);
    }

    /**
     * 快速正确API返回格式
     * @param string $msg
     * @param array $data
     * @param int $code
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function returnOkApi($msg = '操作成功', $data = [], $code = 200)
    {
        return $this->returnApi($code, $msg, $data);
    }

    /**
     * 错误输出API格式
     * @param string $msg
     * @param array $data
     * @param int $code
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function returnErrorApi($msg = '操作失败', $data = [], $code = 1)
    {
        return $this->returnApi($code, $msg, $data);
    }


}