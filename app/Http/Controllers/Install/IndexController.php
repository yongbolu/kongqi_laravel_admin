<?php

namespace App\Http\Controllers\Install;

use App\Http\Controllers\Admin\BaseController;
use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class IndexController extends BaseController
{
    //
    public $module = 'Install';//模块名字

    public function index(Request $request)
    {


        $install_file = linux_path(base_path()) . '/install';
        if (file_exists($install_file)) {
            //跳转到根目录
            // return redirect()->to('/');
        }

        $step = $request->input('step', '');
        if ($step) {
            $this->setModelView('step' . $step);
            $method = 'step' . $step;
            $this->$method();

            if ($step == 3) {
                //判断环境是否有错误，如果有则返回第二步
                if (session('install_error')) {
                    return back()->with('message', '系统检验环境不通过');
                }

            }
            if ($step == 4) {
                //检验数据库
                try {
                    $bd_has = DB::select(DB::raw('SHOW DATABASES LIKE "' . $request->input('DB.DB_DATABASE') . '"'));
                    if (empty($bd_has)) {
                        return back()->with('message', '数据库不存在');
                    }
                } catch (\Exception $exception) {
                    return back()->with('message', '数据库配置错误，请重写' . $exception->getMessage());
                }
                $db_password = $request->input('DB.DB_PASSWORD');

                //判断环境是否有错误，如果有则返回第二步
                if ($db_password != env('DB_PASSWORD')) {
                    return back()->with('message', '数据库写入失败，请重试');
                }
                //20分钟
                ini_set('max_execution_time', 60 * 20);

                //执行数据库迁移
                Artisan::call('migrate');
                //填充数据
                Artisan::call('db:seed');
                //重新生成app key
                Artisan::call('key:generate');
                //写入安装文件
                file_put_contents(linux_path(base_path()) . '/install', date('Y-m-d H:i:s') . ' install');
                return redirect()->route('kongqi.install', ['step' => 5]);
            }

        }
        return $this->display(['index' => $step ? $step - 1 : 0]);
    }

    public function test(){
        //
        $a=Schema::table('vote_configs', function (Blueprint $table) {


            if(Schema::hasColumn('vote_configs','tongji_script2')){
              return   dump('存在了');
            }

            $table->text('tongji_script2')->nullable()->comment('统计脚本2');
        });

    }


    public function step2()
    {
        $this->shareView(['check_path' => $this->checkDirFile(), 'check_env' => $this->checkEnv(), 'ext' => $this->checkFuncExt()]);
    }

    public function step3()
    {

    }

    public function step4()
    {
        $env_file = linux_path(base_path()) . '/.env';
        $request = request();
        $post_data = $request->all();
        $env = $this->createEnv($post_data['DB'], $post_data['REDIS'],0);
        file_put_contents($env_file, $env);
    }

    public function step5()
    {

    }

    public function createEnv($db, $redis, $debug = 0, $app_key = "")
    {
        $is_debug = $debug;
        $app_key = $app_key ?: "base64:Az+lvZrXmg8cJkuNNilxAZQUu48rRGYYs2rA0b2cepM=";
        $db_host = $db['DB_HOST'];
        $db_name = $db['DB_DATABASE'];
        $db_prot = $db['DB_PORT'];
        $db_user = $db['DB_USERNAME'];
        $db_password = $db['DB_PASSWORD'];
        $db_prefix = $db['DB_PREFIX'];
        $db_type = $db['DB_CONNECTION'];
        $redis_host = $redis['REDIS_HOST'];
        $redis_prot = $redis['REDIS_PORT'] ?: null;
        $redis_pwd = $redis['REDIS_PASSWORD'] ?: 6379;
        $kongqi_key = base64_encode(json_encode(['host' => \request()->server('SERVER_NAME'), 'ip' => \request()->server('SERVER_ADDR'), 'port' => $_SERVER['SERVER_PORT']]));

        $env = <<<EOT
APP_NAME=Laravel
APP_ENV=local
APP_KEY=$app_key
APP_DEBUG=$is_debug
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=$db_type
DB_HOST=$db_host
DB_PORT=$db_prot
DB_DATABASE=$db_name
DB_USERNAME=$db_user
DB_PASSWORD=$db_password
DB_PREFIX=$db_prefix

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=$redis_host
REDIS_PASSWORD=$redis_prot
REDIS_PORT=$redis_pwd

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

LANG=zh-CN
KONGQI_SERVER=$kongqi_key
DEBUGBAR_ENABLED=false


EOT;
        return $env;
    }

    public function viewNotControllerBlade()
    {
        return 1;
    }

    /**
     * 目录，文件读写检测
     * @return array 检测数据
     * @author jry <598821125@qq.com>
     */
    protected function checkDirFile()
    {
        $items = [
            '0' => [
                'type' => 'dir',
                'path' => storage_path(),
                'title' => '可写',
                'icon' => 'layui-icon-ok',
            ],
            '1' => [
                'type' => 'dir',
                'path' => public_path() . '/upload/',
                'title' => '可写',
                'icon' => 'layui-icon-ok',
            ],
            '2' => [
                'type' => 'dir',
                'path' => base_path() . '/.env',
                'title' => '可写',
                'icon' => 'layui-icon-ok',
            ]

        ];

        foreach ($items as &$val) {
            $path = $val['path'];
            if ('dir' === $val['type']) {
                if (!is_writable($path)) {
                    if (is_dir($path)) {
                        $val['title'] = '不可写';
                        $val['icon'] = 'layui-icon-close text-danger';
                        session('error', true);
                    } else {
                        $val['title'] = '不存在';
                        $val['icon'] = 'layui-icon-close text-danger';
                        session('error', true);
                    }
                }
            } else {
                if (file_exists($path)) {
                    if (!is_writable($path)) {
                        $val['title'] = '不可写';
                        $val['icon'] = 'layui-icon-close text-danger';
                        session('error', true);
                    }
                } else {
                    if (!is_writable(dirname($path))) {
                        $val['title'] = '不存在';
                        $val['icon'] = 'layui-icon-close text-danger';
                        session('error', true);
                    }
                }
            }
        }
        return $items;
    }

    function checkEnv()
    {
        $items = [
            'os' => [
                'title' => '操作系统',
                'limit' => '不限制',
                'current' => PHP_OS,
                'icon' => 'layui-icon-ok text-success',
            ],
            'php' => [
                'title' => 'PHP版本',
                'limit' => '7.2.0+',
                'current' => PHP_VERSION,
                'icon' => 'layui-icon-ok text-success',
            ],
            'upload' => [
                'title' => '附件上传',
                'limit' => '不限制',
                'current' => ini_get('file_uploads') ? ini_get('upload_max_filesize') : '未知',
                'icon' => 'layui-icon-ok text-success',
            ],
            'gd' => [
                'title' => 'GD库',
                'limit' => '2.0+',
                'current' => '未知',
                'icon' => 'layui-icon-ok text-success',
            ],
            'disk' => [
                'title' => '磁盘空间',
                'limit' => '100M+',
                'current' => '未知',
                'icon' => 'layui-icon-ok text-success',
            ],
        ];

        //PHP环境检测
        if ($items['php']['current'] < 7.2) {
            $items['php']['icon'] = 'layui-icon-close text-danger';
            session('install_error', true);
        }

        //GD库检测
        $tmp = function_exists('gd_info') ? gd_info() : [];
        if (!$tmp['GD Version']) {
            $items['gd']['current'] = '未安装';
            $items['gd']['icon'] = 'layui-icon-close text-danger';
            session('error', true);
        } else {
            $items['gd']['current'] = $tmp['GD Version'];
        }
        unset($tmp);

        //磁盘空间检测
        if (function_exists('disk_free_space')) {
            $disk_size = floor(disk_free_space('./') / (1024 * 1024 * 1024)) . 'G';
            $items['disk']['current'] = $disk_size . '';
            if ($disk_size < 100) {
                $items['disk']['icon'] = 'layui-icon-close text-danger';
                session('install_error', true);
            }
        }

        return $items;
    }

    /**
     * 函数检测
     * @return array 检测数据
     */
    function checkFuncExt()
    {
        $items = [
            '0' => [
                'type' => 'ext',
                'name' => 'pdo',
                'title' => '支持',
                'current' => extension_loaded('pdo'),
                'icon' => 'layui-icon-ok text-success',
            ],
            '1' => [
                'type' => 'ext',
                'name' => 'pdo_mysql',
                'title' => '支持',
                'current' => extension_loaded('pdo_mysql'),
                'icon' => 'layui-icon-ok text-success',
            ],
            '2' => [
                'type' => 'func',
                'name' => 'file_get_contents',
                'title' => '支持',
                'icon' => 'layui-icon-ok text-success',
            ],
            '3' => [
                'type' => 'func',
                'name' => 'mb_strlen',
                'title' => '支持',
                'icon' => 'layui-icon-ok text-success',
            ]

        ];
        foreach ($items as &$val) {
            switch ($val['type']) {
                case 'ext':
                    if (!$val['current']) {
                        $val['title'] = '不支持';
                        $val['icon'] = 'layui-icon-close text-danger';
                        session('install_error', true);
                    }
                    break;
                case 'func':
                    if (!function_exists($val['name'])) {
                        $val['title'] = '不支持';
                        $val['icon'] = 'layui-icon-close text-danger';
                        session('install_error', true);
                    }
                    break;
            }
        }

        return $items;
    }

}
