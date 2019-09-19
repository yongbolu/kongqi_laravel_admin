<?php
return [
    'config' => [
        'name' => '系统配置',
        'icon' => 'layui-icon layui-icon-set',
        'router' => '',
        'limit' => 'admin.system',
        'is_hide' => 0,
        'sub_menus' => [
            [
                'title' => '基本设置',
                'icon' => 'fa fa-gear',
                'router' => 'admin.config.index',
                'param' => ['group_type' => 'base'],
                'is_hide' => 0,

            ]

        ]
    ],
    'system' => [
        'name' => '权限管理',
        'icon' => 'layui-icon layui-icon-user',
        'router' => '',
        'limit' => 'admin.pemission',
        'is_hide' => 0,
        'sub_menus' => [
            [
                'title' => '管理员',
                'router' => 'admin.admin.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 0

            ],
            [
                'title' => '管理组',
                'router' => 'admin.adminrole.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 0

            ],
            [
                'title' => '权限规则',
                'router' => 'admin.adminpermission.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 0

            ],
            [
                'title' => '操作日志',
                'router' => 'admin.adminlog.index',
                'icon' => 'fa fa-circle-o',
                'is_hide' => 0

            ],

        ]
    ],
    'plugin' => [
        'name' => '插件管理',
        'icon' => 'layui-icon layui-icon-user',
        'router' => 'admin.plugin.index',
        'limit' => 'admin.plugin',
        'is_hide' => 0,
        'sub_menus' => [

        ]
    ]

]
?>