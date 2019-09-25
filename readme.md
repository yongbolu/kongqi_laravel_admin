### KongQi Laravel admin
集成了，图片上传，多图上传，批量Excel导入，批量插入，修改，添加，搜索，权限管理RBAC,验证码，插件一个综合完善后台，助你开发快人一步。     
准许协议MIT，允许你修改和包装，但需要注明版权。

作者:空气  
QQ:531833998  
QQ群：650547109  欢迎交流，也欢迎定制系统，全职在家提供技术。

后台演示地址 http://laravel.kongqikeji.com/admin  
账号:kongqi
密码:kongqi1688

### 更新日志
- 2019-09-25 增加插件附加搜索Service操作
- 2019-09-23 增加插件注册 Relation::morphMap关系
插件目录下，创建1个relation.php，键值对写完即可
```
<?php

//这里写键值对morphMap的使用
return [
    'plugin_website_case' => 'App\Plugin\Website\Models\PluginWebCase',
    'plugin_website_article' => 'App\Plugin\Website\Models\PluginWebArticle'
];
?>
```
## 关于后台管理系统

利用laravel框架，打造一款快速开发后台操作，内置了RBAC权限管理，集成了列表api,批量删除，批量增加，Excel批量导入，排序，列表编辑，图片上传，图片多图上传，编辑器，插件安装等。
- 界面采用Layui，简单方便，上手容易
- 对经常用到的一些功能，进行了封装和改造，让代码写的更少。
- 拿到就能快速开发，无需繁琐的搭建一个后台管理系统。
- 代码极少就能完成增删改查。
- 搜索功能进行了改变，减少一大堆的判断
- blade视图自动找到文件模板，免去写很多的视图定位文件，全部自动化。

### 系统说明

- PHP7.2以上版本
- Laravel 6.0,低于这个版本也可以，但不能低于5.2版本

## 安装

第一步：拉取代码
```
git clone  https://github.com/kong-qi/kongqi_laravel_admin.git


```
第二步：安装框架依赖
```
composer install
```

第三步：创建一个数据库，utf8mb4字符集

第四步：本地创建网站应用，绑定到网站目录/public下

第五步：重写
nginx 重写
```
location / {
	if (!-e $request_filename){
		rewrite  ^(.*)$  /index.php?s=$1  last;   break;
	}
}
```
apache 重写,默认public已经有了，可忽略
```
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Handle Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>

```
第六步拷贝您的.env,或者新建一个，内容如下
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:Fv0e0XTllfQQSWXfHbxd/lrqLlH9FCt41hRNLUAEpRo=
APP_DEBUG=1
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=a
DB_USERNAME=root
DB_PASSWORD=123456
DB_PREFIX=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=6379
REDIS_PORT=6379

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
KONGQI_SERVER=eyJob3N0Ijoid3d3LjIwMTlsdi5jb20iLCJpcCI6IjEyNy4wLjAuMSIsInBvcnQiOiI4MCJ9
DEBUGBAR_ENABLED=false

```

第七步:打开你的网站/admin/即可，自动判断进行安装
```
http://www.xx.com/admin

```
在线安装在第三步的时候，如果出现没有提示，请再次输入即可。

安装完成

### 插件库地址
https://github.com/kong-qi/kongqi-laravel-admin-plugin

### 无插件版本，精简版本
https://github.com/kong-qi/kongqi_laravel_admin_no_plugin.git ，其他都一样去除了插件加载

## 文件说明
除了本身是laravel框架的文件，就不说明了。自行查阅文档

#### app/Plugin 插件安装的模块目录，
```
app/Plugin/AdminBaseController.php 插件后台继承基本控制器
app/Plugin/AdminCurlController.php 插件后台继承增删改查控制器
app/Plugin/FrontBaseController.php 插件前台基本控制器
app/Plugin/PluginController.php 插件基本控制器

```
####  如果存在插件了，格式会如下,插件结构
```
app/Plugin/Vote/
    app/Plugin/Vote/Admin/ 后台控制器存放目录
    app/Plugin/Vote/adminRoute.php 后台路由
    app/Plugin/Vote/config.php 插件安装配置文件，固定格式
    app/Plugin/Vote/Front/ 前台控制器存放目录
    app/Plugin/Vote/frontRoute.php 前台路由文件
    app/Plugin/Vote/helper.php 帮助函数文件
    app/Plugin/Vote/Kernel.php 自定义中间件配置文件
    app/Plugin/Vote/Middleware/ 中间件存放目录
    app/Plugin/Vote/Migrations/ 安装数据库相关文件目录
    app/Plugin/Vote/Models/ 插件模型存放目录
```
#### Services目录
```
app/Services/DateServices.php 日期封装类
app/Services/SearchServices.php 搜索封装类
app/Services//WeiXinServices.php 微信相关封装类
```
#### TraitClass 目录trait类，方便多次使用
```
app/TraitClass/ApiTrait.php 接口输出格式trait类
app/TraitClass/BladeTrait.php 视图输出格式trait类
app/TraitClass/ModelCurlTrait.php 增删改查接口输出格式trait类
app/TraitClass/QueryWhereTrait.php 搜索查询的trait类
app/TraitClass/RouteTrait.php 路由信息的trait类
app/TraitClass/SearchScopeTrait.php 搜索范围的trait类
app/TraitClass/TreeTrait.php 树形 trait类
```
#### ExtendClass 目录
```
app/ExtendClass/AnyUpload.php 任意上传类
app/ExtendClass/UploadFile.php 上传配置和初始化
```
#### Facades 门面定义的类
```
app/Facades/AnyUpload.php
app/Facades/PhpTree.php
```
#### Providers 提供者
```
app/Providers/BladeServiceProvider.php 自定义blade模板指令

```

### 静态文件存储
```
public/static/admin 后台模板文件目录
public/static/install 安装样式目录
public/static/js 公用的JS文件目录
public/static/layui 框架目录
public/static/themify-icons 字体目录

```
### 插件静态目录
```
public/plugin
例如Vote这个插件，那么对应
public/plugin/vote

``` 
### 开发增删改查
生成一个控制器文件，自己创建一个也可以，
```
php artisan make:controller Admin\TextController
```
继承基本控制器
```
<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class TextController extends BaseDefaultController
{
    //
}

```
设置绑定对应要操作模型类
```
# 例如我这里操作管理员

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;

class TextController extends BaseDefaultController
{
    //绑定操作的模型
    public function setModel()
    {
        return $this->model=new Admin();
    }
    


//表单添加需要验证规则
/**
     * 表单验证规则
     * @param string $id 存在的时候表示更新
     * @return array
     */
    public function checkRule($id = '')
    {
        if (!$id) {
            return [

                'password' => 'required',
                'account' => 'required',

            ];
        }
        return [

            'account' => 'required',

        ];

    }
    
    //如果我们这个字段对应的验证没有翻译到，那么可以编写如下进行对应，这样如果账号没有必填，就会提示账号了
     public function checkRuleField()
        {
            return [
    
                'password' => '密码',
                'account' => '账号',
    
            ];
        }
    
  }  
```
这样就可以完成基本的简单的增删改查的控制器，当然现在还没完成，需要绑定路由
修改`route/admin.php`
```
$resource = [
        'AdminController',
        'AdminRoleController',
        'AdminPermissionController',
        'CategoryController',
        'PluginController'
    ];
    末尾增加刚才TextController
$resource = [
        'AdminController',
        'AdminRoleController',
        'AdminPermissionController',
        'CategoryController',
        'PluginController',
        'TextController'
    ];

```
路由加完了。那么左侧菜单也需要增加一下`config/admin_menu.php`，照着里面格式加一个即可。
```

```
这样就完成了一个后台的功能了。
这样首页，添加，修改，编辑，都已经全部写好了，具体的功能，查阅文件，都有说明，不一一讲。

### 经常用到的方法如下
```
//首页需要输出到模板里面的数据，返回数组
public function indexData()
{
    return ['hello'=>'你好'];//那样前端首页模板，就可以用{{ $hello }}这个变量取值
}
//添加和修改共享数据，返回数组，$show不为空时，表示修改，那么$show就是这个的编辑的实例查询数据
public function createEditData($show = '')
{
    return ['navs'=>[['id'=>'1','name'=>'熊猫'],['id'=>'2','name'=>'老虎']]];//那么在编辑和输出，可以使用变量{{ $nav }}
}
 //如果你需要去掉默认的编辑和删除按钮，就在这里面重写，最后要返回$item
 public function apiJsonItem($item)
 {
     $item->hello='你好';//首页输出字段就会多了个hello
     return $item;
 }
 //如果不需要去除”编辑和删除按钮“，那么就在里面重写列表输出的字段内容。需要返回$item
 public function apiJsonItemExtend($item)
 {
     $item->hello='你好';//首页输出字段就会多了个hello
     return $item;
 }
 //模型这个操作完之后，你还需要做的事情，可以在里面写，例如我更新缓存，更新日志等
     public function afterSave($model, $id = '')
     {
     }
  //创建，更新之前需要干的事情
     protected function beforeSave($model, $id = '')
     {
     }
 //开启事务,如果表单存在字段['begin_db'=>1]表示开启事务，或者是直接修改beginDb，返回1也表示开启，开启事务之后，afterSave就必须返回真才能正确提交
  /**
      * 是否开启事务
      * @return bool 真表示开启
      */
     protected function beginDb($data, $id = '')
     {
         return isset($data['begin_db']) ? $data['begin_db'] : 0;
     }
   
```
### 常用函数
app/Http/Helper.php
```
//静态资源加载
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
其他的自行查阅
```
### 路由前缀命名说明
>route/admin.php
```
默认前缀是"admin."
例如管理员
admin.admin.index

```
> 插件路由命名
```
admin.plugin.vote.vote.index
admin.plugin.这个是固定，vote是插件名字，后面才是控制器对应的路由名字
```
> 插件前端命名
```
plugin.vote.vote.index
plugin.是固定形式前缀。vote是插件名字，后面才是控制器对应的路由名字
```

### 前端Layui模块位置
```
\public\static\admin\modules\，所有的模块默认在这里，
引入的时候，都需要先调用index这个模块

layui.use(['index'], function () {



 })
 
 
```
> 重点模块我进行了封装
```
custorm.js 自定义JS内容
treetable.js 进行更改过
layerOpen.js 弹窗模块
uploader.js 上传模块
request.js 请求模块ajax
```
### 后续会出视频教程，待续。先分享再说。

### QQ群交流
650547109

### 如果你觉得帮助到你，不仿给我打赏。
![打赏](https://kqimage.oss-cn-shenzhen.aliyuncs.com/2221.jpg)

### 关于我
12年毕业，7年开发经验，10年接触编程，全职在家做技术支持。

简书主页
https://www.jianshu.com/u/fe36c46ae4d8  
黑白课堂
http://www.heibaiketang.com/blog  
...
其他待续分享

### 系统截图
系统演示
![系统演示](https://kqimage.oss-cn-shenzhen.aliyuncs.com/laraveladmin/1.png)
![系统演示](https://kqimage.oss-cn-shenzhen.aliyuncs.com/laraveladmin/2.png)
![系统演示](https://kqimage.oss-cn-shenzhen.aliyuncs.com/laraveladmin/3.png)
![系统演示](https://kqimage.oss-cn-shenzhen.aliyuncs.com/laraveladmin/4.png)
![系统演示](https://kqimage.oss-cn-shenzhen.aliyuncs.com/laraveladmin/5.png)
![系统演示](https://kqimage.oss-cn-shenzhen.aliyuncs.com/laraveladmin/6.png)
![系统演示](https://kqimage.oss-cn-shenzhen.aliyuncs.com/laraveladmin/7.png)
![系统演示](https://kqimage.oss-cn-shenzhen.aliyuncs.com/laraveladmin/8.png)
![系统演示](https://kqimage.oss-cn-shenzhen.aliyuncs.com/laraveladmin/9.png)
![系统演示](https://kqimage.oss-cn-shenzhen.aliyuncs.com/laraveladmin/10.png)
![系统演示](https://kqimage.oss-cn-shenzhen.aliyuncs.com/laraveladmin/11.png)


## 贡献

感谢laravel,Layui,Jquery


## License

MIT协议 [MIT license](https://opensource.org/licenses/MIT).
