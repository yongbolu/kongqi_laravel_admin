<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ Laravel快速后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------

namespace App\TraitClass;

use App\Services\SearchServices;
use Illuminate\Support\Facades\Schema;

trait SearchScopeTrait
{
    /**
     * 范围搜索查询设置
     * @param $query 查询句柄query
     * @param array $data 需要的查询的参数数组
     * @return bool
     */
    public function scopeSearch($query, array $data)
    {

        if (empty($data)) {
            return false;
        }

        foreach ($data as $k => $v) {

            if ($v['value'] == '' && $v['value'] != 0) {
                return false;
            }

            if ($v['type'] == '=') {
                $query->where($k, $v['value']);
            }
            if ($v['type'] == 'in') {
                $query->whereIn($k, $v['value']);
            }
            if ($v['type'] == '>') {
                $query->where($k, '>', $v['value']);
            }
            if ($v['type'] == '>=') {
                $query->where($k, '>=', $v['value']);
            }
            if ($v['type'] == '<>') {
                $query->where($k, '<>', $v['value']);
            }
            if ($v['type'] == '<') {
                $query->where($k, '<', $v['value']);
            }
            if ($v['type'] == '<=') {
                $query->where($k, '<=', $v['value']);
            }
            if ($v['type'] == 'between') {
                $query->whereBetween($k, $v['value']);
            }
            if ($v['type'] == 'raw') {
                $query->whereRaw($v['value'][0], [$v['value'][1]]);
            }
            if ($v['type'] == 'like') {
                $query->whereRaw($k . ' like ?', ["%" . $v['value'] . "%"]);
            }
            if ($v['type'] == 'like_sql') {
                $query->whereRaw($v['value']);
            }
        }
        return $query;
    }

    /**
     * 搜索模型实列化
     * @param $model
     * @param $data
     * @param string $type
     * @return mixed
     */
    public static function getSearchModel( $model,$data, $type = '')
    {
        $search = new SearchServices($model, $data, $type);
        $search->unsetAllWhere();
        return $search->returnModel();
    }

    /**
     * 取得这个模型的字段
     * @return mixed
     */
    public function getModelField()
    {
        $table = $this->getTable();
        $data = Schema::getColumnListing($table);
        return $data;

    }


}