<?php

namespace App\Console\Commands;

use App\Models\Plugin;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreatePluginModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'plugin:model {module} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建插件模型 传递模块 模型名字';

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
        $module = $this->argument('module');
        $name= $this->argument('name');

        $plugin_model_dir='\Plugin\\'.$module.'\\Models\\';
        $plugin_model_dir=linux_path(app_path($plugin_model_dir));
        $model_html=$this->createModel($name,$module);
        $r=file_put_contents($plugin_model_dir.$name.'.php',$model_html);
        if($r)
        {

           return $this->info('创建成功');
        }
        if($m)
        {

        }
        return $this->error('创建失败');


    }




    public function createModel($name,$module){
        $php=<<<EOT
<?php
/**
 * Created by PhpStorm.
 * User: kongqi
 * Date: 2019/10/4
 * Time: 13:16
 */

namespace App\Plugin\\{$module}\\Models;


class {$name} extends {$module}Base
{
   
}
EOT;
        return $php;

    }

}