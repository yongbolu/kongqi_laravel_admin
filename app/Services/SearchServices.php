<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ 快速PHP后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------

namespace App\Services;

/**
 * 设置搜索条件的类，使用流程
 * $search = new SearchServices($model, $data, $type);//$model =new User();$data=['user_id'=>22]
 * $search->returnModel();
 * Class SearchServices
 * @package App\Services
 */
class SearchServices
{
    public static $where = [];
    public $model;
    public $wherePrefix = 'whereBy';
    public $timeType = '';
    public $param = [];
    protected $timeFields = [];
    use QueryWhereTrait;

    public function __construct($model, $param = [], $time_type = '')
    {
        $this->model = $model;
        $this->timeType = $time_type;
        $this->param = [];
        $this->param = $param;
        $this->defaultWhere();
    }

    /**
     * 执行渲染输出
     */
    public function render()
    {
        //清空查询键值对
        $this->unsetAllWhere();
        //设置搜索条件
        $this->setWhere($this->param);
        //执行搜索范围赋值
        $this->querySearch();
    }

    /**
     * 完全移除搜索条件
     * @param array $param
     */
    public function unsetAllWhere($param = [])
    {
        self::$where = [];
    }

    /**
     * 默认需要增加的搜索条件
     */
    public function defaultWhere()
    {

    }

    /**
     * 设置搜索条件
     * @param array $where
     * @return bool
     */
    public function setWhere(array $where)
    {

        foreach ($where as $k => $v) {
            if ($v === NULL && $v != 0) {
                return false;
            }

            $str = convert_under_line($k);
            $action = $this->wherePrefix . $str;
            // dump($action);
            if (method_exists($this, $action)) {
                if ($v !== '' && $v !== NULL) {
                    //执行方法

                    $this->$action($v);
                }
            }
        }
    }


    /**
     * 返回最后的模型
     * @return mixed
     */
    public function returnModel()
    {
        $this->render();
        return $this->model;
    }

    /**
     * 返回模型的统计总量
     * @param string $field
     * @return mixed
     */
    public function totalNumber($field = 'id')
    {
        $this->render();
        return $this->model->count($field);
    }

    /**
     * 返回模型的累积相加总理
     * @param string $field
     * @return mixed
     */
    public function totalSum($field = 'id')
    {
        $this->render();
        return $this->model->sum($field);
    }


    /**
     * 给model类型执行搜索范围
     * @return mixed
     */
    public function querySearch()
    {
        if (empty(self::$where)) {
            return $this->model;
        }
        return $this->model = $this->model->search(self::$where, 1);
    }


    /**
     * 查询语句加入到搜索静态数组里面
     * @param $where
     * @return array
     */
    public function addWhere($where)
    {
        return self::$where = self::$where + $where;
    }


    /**
     * 输出查询语句
     * @return array
     */
    public function echoWhere()
    {
        return self::$where;
    }


}
