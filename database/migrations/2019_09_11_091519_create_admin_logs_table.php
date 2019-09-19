<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->index()->unsigned()->comment('所属管理员id');
            $table->string('name')->comment('所属管理员');
            $table->string('mark', 255)->comment('描述');
            $table->string('ip', 30)->comment('IP地址');
            $table->string('url', 150)->comment('操作地址');
            $table->timestamps();

        });
        $pifxed = Illuminate\Support\Facades\DB::connection()->getTablePrefix();
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE " . $pifxed . "admin_logs comment '管理员日志表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_logs');
    }
}
