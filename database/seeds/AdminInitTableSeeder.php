<?php

use Illuminate\Database\Seeder;

class AdminInitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $permissions = [
            ['id' => '1', 'name' => 'admin.system', 'sort' => '10', 'parent_id' => '0', 'icon' => 'layui-icon layui-icon-set-sm', 'cn_name' => '系统配置', 'menu_name' => '系统配置', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => '2019-09-12 06:44:04', 'updated_at' => '2019-09-12 07:24:31'],
            ['id' => '2', 'name' => 'admin.pemission', 'sort' => '0', 'parent_id' => '0', 'icon' => 'layui-icon layui-icon-user', 'cn_name' => '权限管理', 'menu_name' => '权限管理', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => '2019-09-12 06:46:08', 'updated_at' => '2019-09-12 06:46:08'],
            ['id' => '3', 'name' => 'admin.config.index', 'sort' => '0', 'parent_id' => '1', 'icon' => '', 'cn_name' => '基本配置', 'menu_name' => '基本配置', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => '2019-09-12 06:51:26', 'updated_at' => '2019-09-12 06:51:26'],
            ['id' => '7', 'name' => 'admin.admin.index', 'sort' => '0', 'parent_id' => '2', 'icon' => '', 'cn_name' => '管理员', 'menu_name' => '管理员', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => '2019-09-12 07:20:08', 'updated_at' => '2019-09-12 07:20:17'],
            ['id' => '8', 'name' => 'admin.admin.create', 'sort' => '0', 'parent_id' => '7', 'icon' => NULL, 'cn_name' => '管理员添加', 'menu_name' => '管理员添加', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => '9', 'name' => 'admin.admin.edit', 'sort' => '0', 'parent_id' => '7', 'icon' => NULL, 'cn_name' => '管理员编辑', 'menu_name' => '管理员编辑', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => '10', 'name' => 'admin.admin.destroy', 'sort' => '0', 'parent_id' => '7', 'icon' => NULL, 'cn_name' => '管理员删除', 'menu_name' => '管理员删除', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => '11', 'name' => 'admin.admin.show', 'sort' => '0', 'parent_id' => '7', 'icon' => NULL, 'cn_name' => '管理员详情', 'menu_name' => '管理员详情', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => '12', 'name' => 'admin.adminrole.index', 'sort' => '0', 'parent_id' => '2', 'icon' => '', 'cn_name' => '管理组', 'menu_name' => '管理组', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => '2019-09-12 07:20:52', 'updated_at' => '2019-09-12 07:22:03'],
            ['id' => '13', 'name' => 'admin.adminrole.create', 'sort' => '0', 'parent_id' => '12', 'icon' => NULL, 'cn_name' => '管理组添加', 'menu_name' => '管理组添加', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => NULL, 'updated_at' => '2019-09-12 07:22:21'],
            ['id' => '14', 'name' => 'admin.adminrole.edit', 'sort' => '0', 'parent_id' => '12', 'icon' => NULL, 'cn_name' => '管理组编辑', 'menu_name' => '管理组编辑', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => NULL, 'updated_at' => '2019-09-12 07:22:11'],
            ['id' => '15', 'name' => 'admin.adminrole.destroy', 'sort' => '0', 'parent_id' => '12', 'icon' => NULL, 'cn_name' => '管理组删除', 'menu_name' => '管理组删除', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => NULL, 'updated_at' => '2019-09-12 07:22:18'],
            ['id' => '16', 'name' => 'admin.adminrole.show', 'sort' => '0', 'parent_id' => '12', 'icon' => NULL, 'cn_name' => '管理组详情', 'menu_name' => '管理组详情', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => NULL, 'updated_at' => '2019-09-12 07:22:14'],
            ['id' => '17', 'name' => 'admin.adminpermission.index', 'sort' => '0', 'parent_id' => '2', 'icon' => '', 'cn_name' => '权限规则', 'menu_name' => '权限规则', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => '2019-09-12 07:21:53', 'updated_at' => '2019-09-12 07:26:33'],
            ['id' => '18', 'name' => 'admin.adminpermission.create', 'sort' => '0', 'parent_id' => '17', 'icon' => NULL, 'cn_name' => '权限规则添加', 'menu_name' => '权限规则添加', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => '19', 'name' => 'admin.adminpermission.edit', 'sort' => '0', 'parent_id' => '17', 'icon' => NULL, 'cn_name' => '权限规则编辑', 'menu_name' => '权限规则编辑', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => '20', 'name' => 'admin.adminpermission.destroy', 'sort' => '0', 'parent_id' => '17', 'icon' => NULL, 'cn_name' => '权限规则删除', 'menu_name' => '权限规则删除', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => '21', 'name' => 'admin.adminpermission.show', 'sort' => '0', 'parent_id' => '17', 'icon' => NULL, 'cn_name' => '权限规则详情', 'menu_name' => '权限规则详情', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => '22', 'name' => 'admin.adminlog.index', 'sort' => '0', 'parent_id' => '2', 'icon' => '', 'cn_name' => '操作日志', 'menu_name' => '操作日志', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => '2019-09-12 07:23:01', 'updated_at' => '2019-09-12 07:23:06'],
            ['id' => '23', 'name' => 'admin.other', 'sort' => '0', 'parent_id' => '0', 'icon' => '', 'cn_name' => '其他', 'menu_name' => '其他', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => '2019-09-12 08:28:38', 'updated_at' => '2019-09-12 08:28:38'],
            ['id' => '24', 'name' => 'admin.icon', 'sort' => '0', 'parent_id' => '23', 'icon' => '', 'cn_name' => '图标选择器', 'menu_name' => '图标选择器', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => '2019-09-12 08:29:01', 'updated_at' => '2019-09-12 08:29:01'],
            ['id' => '25', 'name' => 'admin.upload', 'sort' => '0', 'parent_id' => '23', 'icon' => '', 'cn_name' => '文件上传', 'menu_name' => '文件上传', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => '2019-09-12 08:29:34', 'updated_at' => '2019-09-12 08:29:34'],
            ['id' => '26', 'name' => 'admin.admin.password', 'sort' => '0', 'parent_id' => '7', 'icon' => '', 'cn_name' => '修改自己密码', 'menu_name' => '修改自己密码', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => '2019-09-12 08:33:46', 'updated_at' => '2019-09-12 08:33:46'],
            ['id' => '27', 'name' => 'admin.plugin.index', 'sort' => '0', 'parent_id' => '0', 'icon' => NULL, 'cn_name' => '插件管理', 'menu_name' => '插件管理', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => '2019-09-20 03:31:51', 'updated_at' => '2019-09-20 03:31:51'],
            ['id' => '28', 'name' => 'admin.plugin.create', 'sort' => '0', 'parent_id' => '27', 'icon' => NULL, 'cn_name' => '插件管理添加', 'menu_name' => '插件管理添加', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => '29', 'name' => 'admin.plugin.edit', 'sort' => '0', 'parent_id' => '27', 'icon' => NULL, 'cn_name' => '插件管理编辑', 'menu_name' => '插件管理编辑', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => '30', 'name' => 'admin.plugin.destroy', 'sort' => '0', 'parent_id' => '27', 'icon' => NULL, 'cn_name' => '插件管理删除', 'menu_name' => '插件管理删除', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => '31', 'name' => 'admin.plugin.show', 'sort' => '0', 'parent_id' => '27', 'icon' => NULL, 'cn_name' => '插件管理详情', 'menu_name' => '插件管理详情', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => NULL, 'updated_at' => NULL],
            ['id' => '32', 'name' => 'admin.plugin.install', 'sort' => '0', 'parent_id' => '27', 'icon' => '', 'cn_name' => '插件安装', 'menu_name' => '插件安装', 'menu_show' => '1', 'guard_name' => 'admin', 'created_at' => '2019-09-20 03:32:44', 'updated_at' => '2019-09-20 03:32:44']
        ];

        DB::table('permissions')->insert($permissions);

        $admins = [
            ['id' => '1', 'nickname' => '超级管理员', 'thumb' => '', 'account' => 'kongqi', 'session_token' => '2uKZYdXMapsmUvTCvqbNin4yNCbOpGvMk8LstseA', 'password' => bcrypt('kongqi1688'), 'email' => NULL, 'qq' => NULL, 'weixin' => NULL, 'github' => NULL, 'mobile' => NULL, 'is_checked' => '1', 'is_root' => '1', 'last_ip' => '127.0.0.1', 'login_numbers' => '3', 'remember_token' => NULL, 'deleted_at' => NULL, 'created_at' => '2019-09-12 06:41:23', 'updated_at' => '2019-09-12 07:38:07']
        ];
        DB::table('admins')->insert($admins);

    }
}
