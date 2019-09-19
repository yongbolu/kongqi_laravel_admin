<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('lang_id')->default(1)->comment('语言id');
            $table->integer('group_id')->default(0)->comment('所属分组id');
            $table->string('tmp', 255)->default('')->comment('原始名字');
            $table->string('type', 60)->default('image')->comment('文件类型:image,vedio,pdf,office,zip,rar,other');
            $table->string('filename', 255)->comment('新文件名');
            $table->integer('size')->default(0)->comment('文件大小');
            $table->string('path', 255)->comment('文件路径');
            $table->string('oss_type', 60)->default('local')->comment('存储位置');
            $table->string('user_type', 60)->comment('上传用户类型:平台|用户');
            $table->integer('user_id')->unsigned()->comment('所属用户id');
            $table->string('screen')->nullable()->comment('使用场景');
            $table->string('ext', 30)->nullable()->comment('后缀名');
            $table->timestamps();
            $table->index(['user_type', 'user_id']);
        });
        $pifxed = Illuminate\Support\Facades\DB::connection()->getTablePrefix();
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE " . $pifxed . "files comment '图片资源库'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
