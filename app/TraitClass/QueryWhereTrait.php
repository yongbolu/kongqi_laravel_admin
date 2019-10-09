<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ Laravel快速后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------

namespace App\Services;
/** 查询字段类Trait
 * Trait QueryWhereTrait
 */
trait  QueryWhereTrait
{
    public static $where = [];
    public $timeType = '';
    protected $timeFields = [];

    /**
     * 检索字段model_id的查询，whereBy这个是前缀，后面的才是查询字段
     * 参数：['model_id'=>1],则查询model_id=1的SQL语句
     * @param $value
     */
    public function whereByModelId($value)
    {
        $data = [
            'model_id' => [
                'type' => '=',
                'value' => $value
            ]
        ];
        $this->addWhere($data);
    }
    public function whereByGroupType($value)
    {
        $data = [
            'group_type' => [
                'type' => '=',
                'value' => $value
            ]
        ];
        $this->addWhere($data);
    }

    public function whereByModelType($value)
    {
        $data = [
            'model_type' => [
                'type' => '=',
                'value' => $value
            ]
        ];
        $this->addWhere($data);
    }
    public function whereByWxMerchantId($value)
    {
        $data = [
            'wx_merchant_id' => [
                'type' => '=',
                'value' => $value
            ]
        ];
        $this->addWhere($data);
    }
    public function whereByActiveId($value)
    {
        $data = [
            'active_id' => [
                'type' => '=',
                'value' => $value
            ]
        ];
        $this->addWhere($data);
    }
    public function whereByVoteConfigId($value)
    {
        $data = [
            'vote_config_id' => [
                'type' => '=',
                'value' => $value
            ]
        ];
        $this->addWhere($data);
    }
    public function whereByVoteThemeId($value)
    {
        $data = [
            'vote_theme_id' => [
                'type' => '=',
                'value' => $value
            ]
        ];
        $this->addWhere($data);
    }

    /**
     * 检索status in
     * 参数:['status_in'=>[1,4]] ,查询status in [xx,xx]
     * @param $value
     */
    public function whereByStatusIn($value)
    {
        $data = [
            'status' => [
                'type' => 'in',
                'value' => $value
            ]
        ];
        $this->addWhere($data);
    }
    public function whereById($value)
    {
        $data = [
            'id' => [
                'type' => '=',
                'value' => $value
            ]
        ];
        $this->addWhere($data);
    }
    public function whereByPhone($value)
    {
        $data = [
            'phone' => [
                'type' => '=',
                'value' => $value
            ]
        ];
        $this->addWhere($data);
    }

    /**
     * 检索name like SQL语句
     * ['name_like_query'=>'空气工作室']
     * @param $value
     */
    public function whereByNameLikeQuery($value)
    {
        $data = [
            'name' => [
                'type' => 'like',
                'value' => $value
            ]
        ];
        $this->addWhere($data);
    }
    /**
     * 检索name like SQL语句
     * ['name_like_query'=>'空气工作室']
     * @param $value
     */
    public function whereMarkLikeQuery($value)
    {
        $data = [
            'name' => [
                'type' => 'like',
                'value' => $value
            ]
        ];
        $this->addWhere($data);
    }
    /**
     * 检索name like SQL语句
     * ['name_like_query'=>'空气工作室']
     * @param $value
     */
    public function whereByNicknameLikeQuery($value)
    {

        $data = [
            'nickname' => [
                'type' => 'like',
                'value' => $value
            ]
        ];
        $this->addWhere($data);
    }

    /**
     * 前多少月份查询
     * @param int $value
     */
    public function whereByBeforeMonth(int $value)
    {
        $date = \App\Services\DateServices::getBeforeMonthToNow($value, 1);

        if (!empty($date)) {

            $this->setWhereTimeSql($date['start_at'], $date['end_at']);
        }
    }
    /**
     * 前或后多少天查询
     * @param int $value
     */
    public function whereByBeforeDay(int $value)
    {
        $date = \App\Services\DateServices::dayToNow($value, 1);

        if (!empty($date)) {

            $this->setWhereTimeSql($date['start_at'], $date['end_at']);
        }
    }

    //第几周查询
    public function whereByBeforeWeek(int $value)
    {
        $date = \App\Services\DateServices::dayToNow($value, 1);

        if (!empty($date)) {

            $this->setWhereTimeSql($date['start_at'], $date['end_at']);
        }
    }

    /**
     * 设置查询时间字段
     * @param $start_at
     * @param $end_at
     */
    public function setWhereTimeSql($start_at, $end_at)
    {
        $type = $this->timeType;
        $start_at = trim($start_at);
        $end_at = trim($end_at);
        if (in_array($type, $this->timeFields)) {
            $data = [
                $type => [
                    'type' => 'raw',
                    'value' => ["($type >= ? and $type <= ?) ", [$start_at, $end_at]]
                ]
            ];
        } else {
            $data = [
                'created_at' => [
                    'type' => 'raw',
                    'value' => ['(created_at>=? and created_at<=?) ', [$start_at, $end_at]]
                ]
            ];
        }
        $this->addWhere($data);
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
     * 完全移除搜索条件
     * @param array $param
     */
    public function unsetAllWhere($param = [])
    {
        self::$where = [];
    }

    /**
     * 移除某个查询语句数组
     * @param $key
     */
    public function unsetWhere($key)
    {
        if (array_key_exists($key, self::$where)) {
            unset(self::$where[$key]);
        }
    }
}