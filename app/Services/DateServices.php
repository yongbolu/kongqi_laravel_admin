<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ Laravel快速后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------

namespace App\Services;

class DateServices
{
    public static $is_debug = 0;
    public static $times = 1;

    /**
     * 返回日期的开始和结束
     *
     * @return array 返回格式['start_at'=>'2019-07-07 20:20:20','end_at'='2019-07-07 20:20:20']
     */
    public static function startEndFormat($data)
    {

        $data = self::addTimes($data);
        if (self::$is_debug) {
            dump($data);
        }
        return $data;
    }

    /**
     * 增加时间戳
     */
    public static function addTimes($data)
    {

        if (self::$times) {
            $data = [
                'start_at' => $data['start_at'] . ' 00:00:00',
                'end_at' => $data['end_at'] . ' 23:59:59'
            ];
        }
        return $data;
    }

    public static function timeStartEndFormat($date)
    {
        $data = [
            'start_at' => $date,
            'end_at' => $date
        ];
        return self::startEndFormat($data);
    }

    /**
     * 日期的周的开始时间和结束时间
     * @param $date
     * @return mixed ['start_at'=>'','end_at'=>'']
     */
    public static function weekStartEndFormat($date)
    {
        $timestamp = strtotime($date);
        $data['start_at'] = date('Y-m-d', strtotime("this week Monday", $timestamp));
        $data['end_at'] = date('Y-m-d', strtotime("this week Sunday", $timestamp));
        return self::startEndFormat($data);

    }

    /**
     * 今天开始日期时间和结束时间
     * @return array ['start_at','end_at'=>'']
     */
    public static function today()
    {
        $to_day = date('Y-m-d');
        return self::timeStartEndFormat($to_day);

    }

    /**
     * 加/减多少天,
     * @param $date
     * @param $day
     * @param $type
     * @return false|string 返回加/减的日期
     */
    public static function dayRender($date, $day, $type, $format = "Y-m-d")
    {
        return date($format, strtotime($type . $day . ' day', strtotime($date)));
    }

    /**
     * 加多少天
     * @param $date
     * @param int $day
     * @return false|string
     */
    public static function incrDay($day = 1, $date = '')
    {
        $date = $date ? $date : date('Y-m-d');
        return self::dayRender($date, $day, '+');
    }

    /**
     * 减多少天
     * @param $date
     * @param int $day
     * @return false|string
     */
    public static function decrDay($day = 1, $date = '')
    {
        $date = $date ? $date : date('Y-m-d');
        return self::dayRender($date, $day, '-');
    }

    /**
     * 多少天前到现在或多少天之后
     * @param $number 可传正负数
     * @param int $time
     * @return array
     */
    public static function dayToNow($number, $time = 1)
    {
        $source_day = $number > 0 ? self::incrDay($number) : self::decrDay(abs($number));

        $data = [
            'start_at' => $number > 0 ? self::incrDay(0) : $source_day,
            'end_at' => $number < 0 ? self::incrDay(0) : $source_day,
        ];
        return $time ? self::startEndFormat($data) : $data;
    }

    /**
     * 返回昨日开始和结束的日期
     *
     * @return array['start_at'=>'','end_at'=>'']
     */
    public static function yesterday()
    {
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        return self::timeStartEndFormat($yesterday);
    }

    /**
     * 返回周的开始日期和结束日期
     * @param string $date
     * @return mixed ['start_at'=>'','end_at'=>'']
     */
    public static function week($date = '')
    {

        $to_day = $date ? $date : date('Y-m-d');
        return self::weekStartEndFormat($to_day);

    }

    /**
     * 前/后几周
     * @param $number
     * @return mixed
     */
    public static function weekToDay($number)
    {
        $date = date('Y-m-d', strtotime($number . ' week'));
        return self::weekStartEndFormat($date);
    }

    /**
     * 返回上周开始和结束的日期
     *
     * @return array
     */
    public static function lastWeek($date = '')
    {
        $date = $date ? $date : date('Y-m-d');
        $timestamp = strtotime($date);
        $data['start_at'] = date('Y-m-d', strtotime("last week Monday", $timestamp));
        $data['end_at'] = date('Y-m-d', strtotime("last week Sunday", $timestamp));
        return self::startEndFormat($data);
    }


    /**
     * 取得月的开始和结束日期
     * @param $date
     * @param $number
     * @return mixed
     */
    public static function getMonthStartEnd($date, $number)
    {
        $date = $date ? $date : date('Y-m-d');
        $timestamp = strtotime($date);
        $firstday = strtotime(date('Y-m-01', $timestamp));
        $data['start_at'] = date('Y-m-d', strtotime($number . " month", $firstday));

        $data['end_at'] = date('Y-m-d', strtotime("+" . ($number + 1) . " month -1 day", $firstday));
        return $data;
    }

    /**
     * 取得本月月份或者是传入的日期的月开始和结束时间
     * @param string $date
     * @param int $time
     * @return array|mixed
     */
    public static function month($date = '', $time = 1)
    {

        $data = self::getMonthStartEnd($date, 0);
        return $time ? self::startEndFormat($data) : $data;

    }

    /**
     * 取得上个月或者是传入的上个月日期的月开始和结束时间
     * @param string $date
     * @param int $time
     * @return array|mixed
     */
    public static function lastMonth($date = '', $time = 1)
    {
        $data = self::getMonthStartEnd($date, -1);
        return $time ? self::startEndFormat($data) : $data;
    }

    /**
     * 取得之前月份到现在的日期
     * @param $number
     * @return mixed
     */
    public static function getBeforeMonthToNow($number, $time = 1, $date = '')
    {
        $date = $date ? $date : date('Y-m-d');
        $timestamp = strtotime($date);
        $firstday = strtotime(date('Y-m-01', $timestamp));
        $data['start_at'] = date('Y-m-d', strtotime($number . " month", $firstday));

        $data['end_at'] = $date;
        return $time ? self::startEndFormat($data) : $data;;
    }

    /**
     * 返回年开始和结束的时间戳
     *
     * @return array
     */
    public static function year($date = '', $time = 1)
    {
        $date = $date ? $date : date('Y-m-d');
        $timestamp = strtotime($date);
        $firstday = strtotime(date('Y-01-01', $timestamp));
        $data['start_at'] = date('Y-m-d', strtotime("0 year", $firstday));
        $data['end_at'] = date('Y-m-d', strtotime("+1 year -1 day", $firstday));
        return self::startEndFormat($data);
    }

    /**
     * 返回传入日期的去年开始和结束的日期
     * @param $date
     * @param int $time
     * @return array
     * [
     * "start_at" => "2017-01-01 00:00:00"
     * "end_at" => "2017-12-31 23:59:59"
     * ]
     */
    public static function lastYear($date, $time = 1)
    {
        $date = $date ? $date : date('Y-m-d');
        $timestamp = strtotime($date);
        $firstday = strtotime(date('Y-01-01', $timestamp));
        $data['start_at'] = date('Y-m-d', strtotime("-1 year", $firstday));

        $data['end_at'] = date('Y-m-d', strtotime("0 year -1 day", $firstday));
        return $time ? self::startEndFormat($data) : $data;
    }


    /**
     * 2个日期相减输出最后相差几天
     * @param $date1
     * @param string $date2
     * @return float|int
     */
    public static function diffDay($date1, $date2 = '')
    {

        $date2 = $date2 ? $date2 : date('Y-m-d');
        if ($date1 > $date2) {
            $startTime = strtotime($date1);
            $endTime = strtotime($date2);
        } else {
            $startTime = strtotime($date2);
            $endTime = strtotime($date1);
        }
        $diff = $startTime - $endTime;
        $day = $diff / 86400;

        return abs(intval($day));
    }


    /**
     * 获取几天前零点到现在/昨日/多少天结束的时间戳
     *
     * @param int $day 天数
     * @param bool $now 返回现在或者昨天结束时间戳
     * @return array
     */
    public static function dayToNowTimestamp($day = 1, $now = true)
    {
        $end = time();
        if (!$now) {
            list($foo, $end) = self::yesterday();
        }

        return [
            mktime(0, 0, 0, date('m'), date('d') - $day, date('Y')),
            $end
        ];
    }

    /**
     * 返回几天前的时间戳
     *
     * @param int $day
     * @return int
     */
    public static function daysAgoTimestamp($day = 1)
    {
        $nowTime = time();
        return $nowTime - self::daysToSecond($day);
    }

    /**
     * 返回几天后的时间戳
     *
     * @param int $day
     * @return int
     */
    public static function daysAfterTimestamp($day = 1)
    {
        $nowTime = time();
        return $nowTime + self::daysToSecond($day);
    }

    /**
     * 天数转换成秒数
     *
     * @param int $day
     * @return int
     */
    public static function daysToSecond($day = 1)
    {
        return $day * 86400;
    }

    /**
     * 周数转换成秒数
     *
     * @param int $week
     * @return int
     */
    public static function weekToSecondTimestamp($week = 1)
    {
        return self::daysToSecond() * 7 * $week;
    }

    /**
     * 取得传入日期的年的最开始一天和年的最后一天
     * @param string $date
     * @param int $time 是否增加时间后缀
     * @return array
     */
    public static function yearStartEnd($date = '', $time = 1)
    {
        if (!$date) {
            $date = date('Y-m-d', time());
        }
        $firstday = date('Y-01-01', strtotime($date));
        $lastday = date('Y-12-d', strtotime("$firstday +1 year -1 day"));
        $data = ['start_at' => $firstday, 'end_at' => $lastday];
        return $time ? self::startEndFormat($data) : $data;
    }

    /**
     * 每个月的开始第一天和最后一天
     * @param string $date
     * @param int $time
     * @param string $field
     * @return array|mixed
     */
    public static function monthStartEnd($date = '', $time = 1, $field = '')
    {
        if (!$date) {
            $date = date('Y-m-d', time());
        }
        $firstday = date('Y-m-01', strtotime($date));
        $lastday = date('Y-m-d', strtotime($firstday . " +1 month -1 day"));
        $arr = ['start_at' => $firstday, 'end_at' => $lastday];
        if ($time) {
            $arr = self::startEndFormat($arr);
        }

        if ($field) {
            return $arr[$field];
        }
        return $arr;
    }

}