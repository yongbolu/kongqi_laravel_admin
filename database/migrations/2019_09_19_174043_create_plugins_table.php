<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePluginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plugins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('插件名称');
            $table->string('ename')->index()->comment('插件标识符');
            $table->string('version')->comment('版本号');
            $table->string('author')->nullable()->comment('插件作者');
            $table->string('intro')->comment('插件简介');
            $table->string('author_desc')->nullable()->comment('作者介绍');
            $table->string('qq')->nullable()->comment('qq');
            $table->string('email')->nullable()->comment('email');
            $table->string('weixin')->nullable()->comment('weixin');
            $table->string('mobile', 30)->nullable()->comment('手机号码');
            $table->string('thumb')->comment('缩略图')->nullable();
            $table->string('thumbs', 5000)->comment('多图演示')->nullable();
            $table->string('domain')->nullable()->comment('插件作者域名');
            $table->string('domain_plugin')->comment('插件地址')->nullable();
            $table->string('domain_plugin_test')->comment('插件演示地址')->nullable();
            $table->text('admin_menu')->comment('后台菜单导航')->nullable();
            $table->integer('sort')->default(0)->comment('排序');
            $table->boolean('is_install')->comment('是否安装')->default(0);
            $table->boolean('is_checked')->comment('是否启用')->default(1);
            $table->string('source')->comment('插件来源')->default('local:本地,cloud:云插件');
            $table->tinyInteger('menu_show')->comment('显示位置:0插件入库进入，1菜单进入')->default(1);
            $table->tinyInteger('db_migrate')->comment('数据库迁移是否允许过')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plugins');
    }
}
