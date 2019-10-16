<?php

namespace App\Console\Commands;

use App\Models\Plugin;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreatePlugin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plugin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建插件';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //$module = $this->argument('module');
        $module = $this->ask('请输入插件模块，必须首字母大写例如：Market');
        //转换大写
        $module = Str::studly($module);

        //判断插件模块是否存在了
        $has_plugin = Plugin::where('ename', $module)->exists();
        if ($has_plugin) {
            return $this->info($module . '：模块已经存在了');
        }
        //创建目录
        $create_dir = [
            'Admin', 'Front', 'Migrations', 'Services', 'Models', 'Middleware'
        ];
        $plugin_dir = app_path('Plugin') . '/' . $module . '/';
        $plugin_dir = linux_path($plugin_dir);
        foreach ($create_dir as $k => $v) {
            if (!mkdir($plugin_dir . $v, '0755', 1)) {
                return $this->info($v . '：目录创建失败');
            }
        }
        $this->createFrontController($module);

        //创建迁移文件
        $migration = [
            'Install'=>'创建数据库',
            'Remove'=>'移除数据库',
            'Seed'=>'填充',
            'Update'=>'更新数据库',
        ];
        //创建文件
        $php_file = [
            'frontRoute.php',
            'helper.php'
        ];
        foreach ($php_file as $k=>$v)
        {
            $r=file_put_contents($plugin_dir.$v.'',"<?php\n\n?>");
            if(!$r)
            {
                return $this->info($k.".php：文件创建失败");
            }
        }
        //创建后台路由
        $admin_route=$this->adminRoute();
        $r=file_put_contents($plugin_dir.'adminRoute.php',$admin_route);
        if(!$r)
        {
            return $this->info(plugin_dir."adminRoute.php：文件创建失败");
        }
        //创建迁移处理
        foreach ($migration as $k=>$v)
        {
            $html=$this->createMigrate($module,$k,$v);
            $r=file_put_contents($plugin_dir.'/Migrations/'.$k.'.php',$html);
            if(!$r)
            {
                return $this->info($k.".php：文件创建失败");
            }
        }
        //创建后台
        $create_admin_controller= $this->createAdminController($module);
        //
        $r=file_put_contents($plugin_dir.'Admin/BaseController.php',$create_admin_controller);
        if(!$r)
        {
            return $this->info($plugin_dir."Admin/BaseController.php：文件创建失败");
        }
        //创建前台
        $front_controller=$this->createFrontController($module);
        $r=file_put_contents($plugin_dir.'Front/BaseController.php',$front_controller);
        if(!$r)
        {
            return $this->info($plugin_dir."Front/BaseController.php：文件创建失败");
        }
        //创建Service
        $service=$this->createService($module);
        $r=file_put_contents($plugin_dir.'Services/Services.php',$service);
        if(!$r)
        {
            return $this->info($plugin_dir."Services/SearchService.php：文件创建失败");
        }
        //创建配置文件
        $tips = $this->ask('请输入插件名称?');
        $author = $this->ask('请输入插件作者?');
        $config=$this->createConfig($module,$tips,$author);
        file_put_contents($plugin_dir.'config.php',$config);
        if(!$r)
        {
            return $this->info($plugin_dir."config.php：文件创建失败");
        }

        //创建Kernel
        $create_kernel=$this->createKernel();
        file_put_contents($plugin_dir.'Kernel.php',$create_kernel);
        if(!$r)
        {
            return $this->info($plugin_dir."Kernel.php：文件创建失败");
        }

        //createRelation
        $relation=$this->createRelation();
        $r=file_put_contents($plugin_dir.'relation.php',$relation);
        if(!$r)
        {
            return $this->info($plugin_dir."/relation.php：文件创建失败");
        }

        //创建基本类
        $base_model=$this->createBaseModel($module);
        $r=file_put_contents($plugin_dir.'/Models/'.$module.'Base.php',$base_model);
        if(!$r)
        {
            return $this->info($plugin_dir."Models/{$module}Base.php：文件创建失败");
        }

    }


    public function createAdminController($module)
    {
        $php = <<<EOT
<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ Laravel快速后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------

namespace App\Plugin\\{$module}\\Admin;

use App\Plugin\AdminCurlController;
use App\Plugin\\{$module}\\Services\SearchService;

class BaseController extends  AdminCurlController
{

EOT;
        $php .= '    public function addSearchModel($model, $data,$type)' . "\n" . '
    {' . "\n" . '
        $model=new SearchService($model,$data,$type);' . "\n" . '
        $model=$model->returnModel();' . "\n" . '
        return $model;' . "\n" . '
    }' . "\n" . '
}';
        return $php;

    }

    public function createFrontController($module)
    {
        $php = <<<EOT
<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ Laravel快速后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------

namespace App\Plugin\\{$module}\\Front;

use App\Plugin\FrontBaseController;
use App\Plugin\\{$module}\\Services\SearchService;

class BaseController extends  FrontBaseController
{
    

}
EOT;
        return $php;
    }

    public function createMigrate($module, $name, $tips = '')
    {
        $php = <<<EOT
<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ Laravel快速后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------

namespace App\Plugin\\{$module}\\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * {$tips}
 * Class Seed
 * @package App\Plugin\\{$module}\\Migrations
 */
class {$name}
{
    public function up()
    {


    }
}
EOT;
        return $php;
    }

    public function createService($module)
    {
        $php = <<<EOT
<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ Laravel快速后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------

namespace App\Plugin\\{$module}\\Services;

use App\Plugin\Services\SearchBaseService;

class SearchService extends SearchBaseService
{

}
EOT;
        return $php;
    }

    public function createKernel()
    {
        $php = <<<EOT
<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ Laravel快速后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------
//组不允许再定义web,api，就算添加也无效
return [
    "middlewareGroups" => [
    ],
    "routeMiddleware" => [

    ]
];
EOT;
        return $php;
    }

    public function createRelation()
    {
        $php = <<<EOT
<?php
// +----------------------------------------------------------------------
// | KongQiAdminBase [ Laravel快速后台开发 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012~2019 http://www.kongqikeji.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: kongqi <531833998@qq.com>`
// +----------------------------------------------------------------------
//这里写键值对morphMap的使用
return [
   
];
EOT;
        return $php;
    }

    public function createConfig($module, $desc,$author='')
    {
        $arr = [
            'is_install ' => 0,//是否安装
            'name' => $desc,//插件名字
            'ename' => $module,//唯一标识符,根你的插件模块名字一致
            'intro' => $desc,
            'author' => $author?:'空气工作室',
            'author_desc' => '',//作者介绍

            'version' => '1.0.0',
            'domain' => '',
            'qq' => '',
            'weixin' => '',
            'mobile' => '',
            'email' => '',
            //插件地址
            'domain_plugin' => '',//带http地址
            //演示地址
            'domain_plugin_test' => '',//带http地址
            //演示多图
            'thumbs' => [
                // 'https://xxx.jpg', 'https://xxx2.jpg'
            ],
            //缩略图
            'thumb' => ('/plugin/' . $module . '/intro.jpg'),
            //后台菜单
            'admin_menu' => [
                'name' => $desc,
                'icon' => 'layui-icon layui-icon-website',//图标
                'router' => '',
                'limit' => '',
                'is_hide' => 0,
                'sub_menus' => [
                    [
                        'title' => '',
                        'router' => '',
                        'icon' => 'fa fa-circle-o',
                        'is_hide' => 0

                    ]
                ]
            ]
        ];
        $str='<?php return '.var_export($arr,true).';';
        return $str;
    }

    public function createBaseModel($model){
        $php=<<<EOT
<?php
/**
 * Created by PhpStorm.
 * User: kongqi
 * Date: 2019/10/4
 * Time: 13:16
 */

namespace App\Plugin\\{$model}\\Models;

use App\Models\BaseModel;

class {$model}Base extends BaseModel
{
   
}
EOT;
        return $php;

    }
  public function adminRoute(){
   $php="<?php\n".'Route::namespace(\'Admin\')->group(function ($route) {'."\n".'

    //增删改查之类，这里引入'."\n".'
    $resource = ['."\n".'
    
    ];'."\n".'
    //需要批量操作'."\n".'
    $more_add_controller = ['."\n".'
        
    ];'."\n".'
    //只需要首页'."\n".'
    $only_index_controller = ['."\n".'

    ];'."\n".'
    //只需要添加和首页'."\n".'
    $only_add_controller = ['."\n".'
      
    ];'."\n".'
    //需要表格导入'."\n".'
    $import_add_controller = ['."\n".'
        
    ];'."\n".'

    foreach ($resource as $c) {'."\n".'
        //自动获取
        $controller = str_replace(\'Controller\', \'\', $c);'."\n".'
        $controller_path = strtolower($controller);'."\n".'
        $route->group([\'prefix\' => $controller_path . \'/\'], function ($route) use ($c, $controller_path) {'."\n".'
            $route->get(\'/\', $c . \'@index\')->name($controller_path . ".index");'."\n".'
            $route->get(\'create\', $c . \'@create\')->name($controller_path . ".create");'."\n".'
            $route->get(\'show/{id}\', $c . \'@show\')->name($controller_path . ".show");'."\n".'
            $route->post(\'store\', $c . \'@store\')->name($controller_path . ".store");'."\n".'
            $route->get(\'edit/{id}\', $c . \'@edit\')->name($controller_path . ".edit");'."\n".'
            $route->put(\'update/{id}\', $c . \'@update\')->name($controller_path . ".update");'."\n".'
            $route->put(\'delete/\', $c . \'@destroy\')->name($controller_path . ".destroy");'."\n".'
            $route->post(\'edit_list/\', $c . \'@editTable\')->name($controller_path . ".edit_list");'."\n".'
        });'."\n".'
        $route->any($controller_path . \'/list\', [\'uses\' => $c . \'@getList\'])->name($controller_path . ".list");'."\n".'
        //增加批量操作'."\n".'
        if (in_array($c, $more_add_controller)) {'."\n".'
            $route->get($controller_path . \'/all/create\', [\'uses\' => $c . \'@allCreate\'])->name($controller_path . \'.all_create\');'."\n".'
            $route->post($controller_path . \'/all/create/post\', [\'uses\' => $c . \'@allCreatePost\'])->name($controller_path . \'.all_create_post\');'."\n".'
        }'."\n".'
        //导入操作
        if (in_array($c, $import_add_controller)) {'."\n".'
            $route->post($controller_path . \'/import/post\', [\'uses\' => $c . \'@importPost\'])->name($controller_path . \'.import_post\');'."\n".'
            $route->get($controller_path . \'/import/tpl\', [\'uses\' => $c . \'@importTpl\'])->name($controller_path . \'.import_tpl\');'."\n".'
        }'."\n".'
    }'."\n".'
    //只需要首页控制器'."\n".'
    foreach ($only_index_controller as $c) {'."\n".'
        $controller = str_replace(\'Controller\', \'\', $c);'."\n".'
        $controller_path = strtolower($controller);'."\n".'
        $route->group([\'prefix\' => $controller_path . \'/\'], function ($route) use ($c, $controller_path) {'."\n".'
            $route->get(\'/\', $c . \'@index\')->name($controller_path . ".index");'."\n".'
            $route->any($c . \'/list\', [\'uses\' => $c . \'@getList\'])->name($controller_path . ".list");'."\n".'
        });'."\n".'

    }'."\n".'
    //著需要添加和首页'."\n".'
    foreach ($only_add_controller as $c) {'."\n".'
        $controller = str_replace(\'Controller\', \'\', $c);'."\n".'
        $controller_path = strtolower($controller);'."\n".'
        $route->group([\'prefix\' => $controller_path . \'/\'], function ($route) use ($c, $controller_path) {'."\n".'
            $route->get(\'/\', $c . \'@index\')->name($controller_path . ".index");'."\n".'
            $route->post(\'store\', $c . \'@store\')->name($controller_path . ".store");'."\n".'
            $route->any($c . \'/list\', [\'uses\' => $c . \'@getList\'])->name($controller_path . ".list");'."\n".'
        });'."\n".'

    }'."\n".'
});'."\n".'';
   return $php;
  }
}