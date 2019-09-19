<?php
/**
 * 字符串转换驼峰峰式，默认第一个字符串大写
 * @param $str
 * @param bool $ucfirst
 * @return string
 */
function convert_under_line($str, $ucfirst = true)
{
    while (($pos = strpos($str, '_')) !== false)
        $str = substr($str, 0, $pos) . ucfirst(substr($str, $pos + 1));

    return $ucfirst ? ucfirst($str) : $str;
}

/**
 * 格式化日期
 * @param $str
 * @param string $format
 * @return false|string
 */
function format_date($str, $format = "Y-m-d")
{
    $datetime = strtotime($str);
    return date($format, $datetime);
}

/**
 * 金额格式化，默认2位数小数点
 * @param $number
 * @param int $decimals
 * @param string $dec
 * @param string $sep
 * @return array|string
 */
function money_str($number, $decimals = 2, $dec = ".", $sep = ",")
{
    if (is_array($number)) {
        $arr = [];
        foreach ($number as $k => $v) {
            $arr[] = number_format($v, $decimals, $dec, $sep);
        }
        return $arr;
    }
    return number_format($number, $decimals, $dec, $sep);
}

/**
 * 转换成linux路径
 * @param $path
 * @return mixed
 */
function linux_path($path)
{
    return str_replace("\\", "/", $path);
}

/**
 * 管理员信息
 * @param string $field
 * @return mixed
 */
function admin($field = '')
{
    try {
        $info = \Illuminate\Support\Facades\Auth::guard('admin')->user();
        return $field ? $info[$field] : $info;
    } catch (Exception $exception) {
        return false;
    }

}

/**
 * 链接设置，可以是控制器，也可以路径
 * @param $path
 * @param $method
 * @param $option
 */
function admin_url($path, $method = 'index', $option = [])
{
    $controller = 'Admin\\' . ucwords($path) . 'Controller@' . lcfirst(ucwords($method));
    try {
        $url = action($controller, $option);
    } catch (Exception $e) {

        return '<br/>提示:' . $controller . ' 这个路由没用定义<br/>';
    }
    return $url;
}

/**
 * 资源加载__
 * @param $path
 * @return string
 */
function ___($path)
{
    return asset('/static/' . $path);
}

/**
 * 插件样式
 * @param $path
 * @return string
 */
function plugin_res($path)
{
    return asset('/plugin/' . $path);
}

/**
 * 图片地址设置，
 * @param $str
 * @param array $option 控制图片的大小一写配置
 * @return mixed
 */
function picurl($str, $thumb = 'thumb')
{

    $is_oss = config('website.is_oss');

    if (!$str) return false;
    if ($is_oss) {

        if ($thumb == 'thumb') {
            $style = '@!thumb';
            $str = $str . $style;
        }
        if ($thumb == 'vedio') {
            $style = '@!vedio';
            $str = $str . $style;
        }
        if ($thumb == 'cate') {
            $style = '@!cate';
            $str = $str . $style;
        }
        if ($thumb == 'cover') {
            $style = '@!cover';
            $str = $str . $style;
        }
        if ($thumb == 'cont') {
            $style = '@!cont';
            $str = $str . $style;
        }
    }
    return config('website.is_oss') ? config('website.oss_domain') . $str : url($str);
}

/**
 * 配置缓存，永久，不更新则永久
 * @param $config_key
 * @param array $data
 * @return \Illuminate\Cache\CacheManager|mixed|string
 * @throws Exception
 */
function config_cache($config_key, $group_type = 'config', $data = [])
{
    $param = explode('.', $config_key);
    if (empty($param)) {
        return false;
    }

    if (empty($data)) {
        $config = cache($param[0]);
        //是否存在这个缓存
        if (empty($config)) {
            return false;
        }
        $config = unserialize($config);
        if (empty($config)) {
            //缓存文件不存在就读取数据库
            $res = \App\Models\Config::get()->toArray();
            if ($res) {
                foreach ($res as $k => $val) {
                    $config[$val['ename']] = $val['content'];
                }
                //存入缓存
                \Illuminate\Support\Facades\Cache::forever($param[0], serialize($config));
            }
        }

        if (count($param) > 0) {
            //判断获取值参数是否存在，如果存在的话，则去，没有存在返回数组
            if (isset($param[1])) {
                $config = is_array($config) ? $config : [];
                if (array_key_exists($param[1], $config)) {
                    return $config[$param[1]];
                }
            } else {
                return $config = is_array($config) ? $config : false;
            }
        } else {
            return $config;
        }
    } else {
        //添加/更新
        $newArr = [];
        $newData = [];
        $result = \App\Models\Config::get()->toArray();
        if (count($result) > 0) {

            foreach ($result as $val) {
                $temp[$val['ename']] = $val['content'];
            }
            foreach ($data as $k => $v) {
                $newArr = ['ename' => $k, 'content' => trim($v), 'group_type' => $group_type];
                if (!isset($temp[$k])) {

                    \App\Models\Config::create($newArr);//新key数据插入数据库
                } else {
                    if ($v != $temp[$k]) {
                        \App\Models\Config::where("ename", $k)->update($newArr);//缓存key存在且值有变更新此项
                    }

                }
            }
            //更新后的新的记录
            $newRes = \App\Models\Config::get()->toArray();
            foreach ($newRes as $rs) {
                $newData[$rs['ename']] = $rs['content'];
            }
        } else {
            foreach ($data as $k => $v) {
                $newArr[] = ['ename' => $k, 'content' => trim($v), 'group_type' => $group_type];
            }
            \App\Models\Config::insert($newArr);
            $newData = $data;
        }
        $newData = serialize($newData);
        \Illuminate\Support\Facades\Cache::forever($param[0], $newData);
    }
}

/**
 * 取得配置，可以设置默认值
 * @param $config_key
 * @param string $defualt
 * @param string $group_type
 * @return \Illuminate\Cache\CacheManager|int|mixed|string
 * @throws Exception
 */
function config_cache_default($config_key, $defualt = '', $group_type = 'config')
{
    $data = config_cache($config_key, $group_type);
    if ($data == '') {
        return $defualt ? $defualt : 0;
    }
    return $data;
}

/**
 * 后台菜单
 */
function admin_menu()
{
    $menu = \App\Models\Permission::orderBy('sort', 'desc')->get();
    $menu = tree($menu->toArray());
    return $menu;
}

function show_hide_menu_auth($route_name)
{


    $admin = admin();
    if ($admin['is_root']) {
        return true;
    }
    try {


        if ($admin->hasPermissionTo($route_name, 'admin')) {

            return true;
        }
    } catch (\Exception $exception) {
        return false;
    }

    return false;
}

/**
 * tree
 * @param array $list
 * @param string $pk
 * @param string $pid
 * @param string $child
 * @param int $root
 * @return array
 */
function tree($list = [], $pk = 'id', $pid = 'parent_id', $child = '_child', $root = 0)
{

    // 创建Tree
    $tree = [];
    if (is_array($list)) {
        // 创建基于主键的数组引用
        $refer = [];
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] =& $list[$key];
        }
        //转出ID对内容
        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId = $data[$pid];
            if ($root == $parentId) {
                $tree[] =& $list[$key];

            } else {

                if (isset($refer[$parentId])) {

                    $parent =& $refer[$parentId];

                    $parent[$child][] =& $list[$key];
                }
            }
        }
    }
    return $tree;
}

/**
 *
 * @param $data
 * @param string $key
 * @return array
 */
function array_to_key($data, $key = 'id')
{
    if (empty($data)) {
        return [];
    }
    $arr = [];
    foreach ($data as $k => $v) {
        $arr[$v[$key]] = $v;
    }
    return $arr;
}

/**
 * 微信分享
 * @param $mc_id
 * @param $url
 * @param int $debug
 * @return mixed
 */
function wx_share($mc_id, $url, $debug = 0)
{

    $config = '';
    if ($mc_id) {
        $config = \App\Models\WxMerchant::find($mc_id);
    } else {
        $config = \App\Models\WxMerchant::first();
    }
    /* dump($config->toArray());
     dump($url);*/

    \App\Services\WeiXinServices::config($config['app_id'], $config['app_secret']);
    $data = \App\Services\WeiXinServices::share(['updateAppMessageShareData', 'updateTimelineShareData', 'onMenuShareAppMessage', 'onMenuShareTimeline'], $url, $debug);
    return $data;
}

function get_dir($path, $abs_path = 0, $type = 'dir')
{
    $path_file = scandir($path);
    if (empty($path_file)) {
        return false;
    }
    $path_arr = [];
    $file_arr = [];
    foreach ($path_file as $k => $v) {
        if (in_array($v, ['.', '..'])) {
            continue;
        }
        if (is_dir($path . $v)) {
            $path_arr[] = $abs_path ? $path . $v : $v;
        } elseif (is_file($path . $v)) {
            $file_arr[] = $abs_path ? $path . $v : $v;
        }
    }
    if ($type == 'dir') {
        return $path_arr;
    } else {
        return $file_arr;
    }
}

/**
 * 插件路由
 * @param $name
 * @param array $para
 * @return string
 */
function plugin_route($name, $para = [])
{
    try {
        return route('plugin.' . $name, $para);
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}
function nroute($name, $para = [])
{
    try {
        return route( $name, $para);
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}

/**
 * 插件控制器地址
 * @param $path
 * @param string $method
 * @param array $option
 * @return string
 */
function plugin_url($path, $method = 'index', $option = [])
{
    $controller = '\App\Plugin\\' . ucwords($path) . 'Controller@' . lcfirst(ucwords($method));
    try {
        $url = action($controller, $option);
    } catch (Exception $e) {

        return '<br/>提示:' . $controller . ' 这个路由没用定义<br/>';
    }
    return $url;
}



/**
 * 取得插件目录数组
 * @return array
 */
function get_plugin_path_arr(){
    $plugin_path=get_plugin_path();
    $plugin_path_dir =get_dir($plugin_path,0);
    if(empty($plugin_path_dir))
    {
        return [];
    }
    $plugin_arr=[];
    foreach ($plugin_path_dir as $k=>$v)
    {
        $path_path=$plugin_path.$v;
        //判断这个文件是否存在，如果存在则进行读取
        if(is_dir($path_path))
        {
            $plugin_arr[]=$v;
        }

    };
    return $plugin_arr;
}

/**
 * 取得插件位置
 * @return string
 */
function get_plugin_path(){
    $app=dirname((__DIR__));
    $plugin_path=linux_path($app) . '/Plugin/';
    return $plugin_path;
}

/**
 * 加载插件中间件
 * @return array|bool
 */
function load_plugin_middleware(){
    $plugin_path=get_plugin_path();
    $plugin_path_dir =get_dir($plugin_path,0);
    if(empty($plugin_path_dir))
    {
        return false;
    }
    $m_arr=[];
    foreach ($plugin_path_dir as $k=>$v)
    {
        $route_path=$plugin_path.$v.'/Kernel.php';
        //判断这个路由文件是否存在，如果存在则进行读取
        if(file_exists($route_path))
        {
            $m_arr[$v]=require $route_path;

        }

    };
    return $m_arr;
}
//加载插件函数


function get_plugins_data(){
    $plugin_key='plugin_install';
    $data=[];
    if (\Illuminate\Support\Facades\Cache::has($plugin_key)) {
        //
        $data=\Illuminate\Support\Facades\Cache::get($plugin_key);

    }else
    {
        $data=\App\Models\Plugin::where('is_checked',1)->get()->toArray();
        //永久写入缓存
        \Illuminate\Support\Facades\Cache::forever($plugin_key,$data);
    }
    return $data;
}
//插件菜单
function plugin_admin_menu(){

    $data=get_plugins_data();
    if(empty($data))
    {
        return false;
    }

    $menus=[];
    foreach ($data as $k=>$v)
    {
        $menu=json_decode(unserialize($v['admin_menu']),1);

        if(empty($menu))
        {
            continue;
        }
        if(!is_array($menu))
        {
            continue;
        }

        $key='plugin.'.strtolower($v['ename']);
        $menus[$key]=['show_type'=>$v['menu_show'],'data'=>$menu];
    }
    return $menus;
}
function plugin_cache_forever_update(){

    $plugin_key='plugin_install';
    $data=\App\Models\Plugin::where('is_checked',1)->get()->toArray();
    //永久写入缓存
    cache()->forever($plugin_key,$data);

}