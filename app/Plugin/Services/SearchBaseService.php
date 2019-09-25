<?php
/**
 * Created by PhpStorm.
 * User: kongqi
 * Date: 2019/9/25
 * Time: 13:57
 */

namespace App\Plugin\Services;

class SearchBaseService
{
    public static $where = [];
    public $model;
    public $wherePrefix = 'whereBy';
    public $timeType = '';
    public $param = [];
    protected $timeFields = [];
    public function __construct($model, $param = [], $time_type = '')
    {
        $this->model = $model;
        $this->timeType = $time_type;
        $this->param = [];
        $this->param = $param;
        $this->defaultWhere();
    }
    /**
     * 默认需要增加的搜索条件
     */
    public function defaultWhere()
    {

    }

    /*
       **
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
     * 完全移除搜索条件
     * @param array $param
     */
    public function unsetAllWhere($param = [])
    {
        self::$where = [];
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
     * 给model类型执行搜索范围
     * @return mixed
     */
    public function querySearch()
    {
        if (empty(self::$where)) {
            return $this->model;
        }
        return $this->model = $this->model->search(self::$where);
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


}