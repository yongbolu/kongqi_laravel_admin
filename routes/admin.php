<?php
$admin_path = 'admin';
/*****************无需验证中间件**********************/
//无需验证权限，或者里面验证
Route::prefix($admin_path)->middleware(['install'])->name('admin.')->group(function ($route) {
    $route->get('/login', 'LoginController@showLoginForm')->name('login');
    $route->post('login', 'LoginController@login')->name('post.login');
    $route->get('logout', 'LoginController@logout')->name('logout');
});

/*****************验证中间件**********************/
Route::prefix($admin_path)->middleware(['install', 'admin_auth', 'admin_check'])->name('admin.')->group(function ($route) {
    $route->get('home', 'HomeController@console')->name('home.console');
    $route->get('clear/cache', 'HomeController@clearCache')->name('home.clear.cache');
    $route->get('/', 'HomeController@index')->name('home');
    $route->get('/admin_plugin/{ename}', 'HomeController@plugin')->name('home.plugin');

    $route->any('upload/{type}', ['uses' => 'FileUploadController@handle'])->name('upload');
    $route->any('icon', ['uses' => 'IconController@index'])->name('icon');
    $route->any('error/{code}', ['uses' => 'ErrorController@index'])->name('error');
    $route->any('excel/import', ['uses' => 'ExcelController@import'])->name('excel.import');

    //增删改查存放的控制器数组
    $resource = [
        'AdminController',
        'AdminRoleController',
        'AdminPermissionController',
        'CategoryController',
        'PluginController'
    ];
    //需要批量操作
    $more_add_controller = [
        'AdminPermissionController',
    ];
    //只需要首页
    $only_index_controller = [
        'AdminLogController',
    ];
    //
    $only_add_controller = [
        'ConfigController'
    ];

    //需要表格导入
    $import_add_controller = [
        'AdminPermissionController'
    ];
    //管理员修改密码
    $route->get('admin/password', 'AdminController@password')->name("admin.password");
    $route->post('admin/password', 'AdminController@passwordPost')->name("admin.password_post");
    foreach ($resource as $c) {
        //自动获取
        $controller = str_replace('Controller', '', $c);
        $controller_path = strtolower($controller);
        $route->group(['prefix' => $controller_path . '/'], function ($route) use ($c, $controller_path) {
            $route->get('/', $c . '@index')->name($controller_path . ".index");

            $route->get('create', $c . '@create')->name($controller_path . ".create");
            $route->get('show/{id}', $c . '@show')->name($controller_path . ".show");
            $route->post('store', $c . '@store')->name($controller_path . ".store");
            $route->get('edit/{id}', $c . '@edit')->name($controller_path . ".edit");
            $route->put('update/{id}', $c . '@update')->name($controller_path . ".update");
            $route->put('delete/', $c . '@destroy')->name($controller_path . ".destroy");
            $route->post('edit_list/', $c . '@editTable')->name($controller_path . ".edit_list");
        });

        $route->any($controller_path . '/list', ['uses' => $c . '@getList'])->name($controller_path . ".list");

        //增加批量操作
        if (in_array($c, $more_add_controller)) {
            $route->get($controller_path . '/all/create', ['uses' => $c . '@allCreate'])->name($controller_path . '.all_create');
            $route->post($controller_path . '/all/create/post', ['uses' => $c . '@allCreatePost'])->name($controller_path . '.all_create_post');
        }
        //导入操作
        if (in_array($c, $more_add_controller)) {
            $route->post($controller_path . '/import/post', ['uses' => $c . '@importPost'])->name($controller_path . '.import_post');
            $route->get($controller_path . '/import/tpl', ['uses' => $c . '@importTpl'])->name($controller_path . '.import_tpl');
        }

        //额外增加
        if(in_array($c,['PluginController']))
        {

            $route->post($controller_path . '/install/{ename}/{type}', ['uses' => $c . '@install'])->name($controller_path . '.install');
        }
    }

    foreach ($only_index_controller as $c) {
        $controller = str_replace('Controller', '', $c);
        $controller_path = strtolower($controller);
        $route->group(['prefix' => $controller_path . '/'], function ($route) use ($c, $controller_path) {
            $route->get('/', $c . '@index')->name($controller_path . ".index");
            $route->any($c . '/list', ['uses' => $c . '@getList'])->name($controller_path . ".list");
        });

    }
    foreach ($only_add_controller as $c) {
        $controller = str_replace('Controller', '', $c);
        $controller_path = strtolower($controller);
        $route->group(['prefix' => $controller_path . '/'], function ($route) use ($c, $controller_path) {
            $route->get('/', $c . '@index')->name($controller_path . ".index");
            $route->post('store', $c . '@store')->name($controller_path . ".store");
            $route->any($c . '/list', ['uses' => $c . '@getList'])->name($controller_path . ".list");
        });

    }

});