<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nickname', 50)->nullable()->comment('昵称');
            $table->string('thumb')->nullable()->comment('头像');
            $table->string('account', 120)->unique()->comment('账号');
            $table->string('session_token')->nullable()->comment('登录session_token');
            $table->string('password', 120)->nullable()->comment('密码');
            $table->string('email', 120)->nullable()->comment('邮箱');
            $table->string('qq', 30)->nullable()->comment('qq');
            $table->string('weixin', 100)->nullable()->comment('微信');
            $table->string('github', 100)->nullable()->comment('GitHub');
            $table->string('mobile', 11)->nullable()->comment('手机');
            $table->boolean('is_checked')->default(1)->comment('启用1，禁用0');
            $table->boolean('is_root')->default(0)->comment('是否超级管理员');
            $table->ipAddress('last_ip')->nullable()->comment('最后一次登录IP');
            $table->integer('login_numbers')->default(0)->comment('登录次数');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();

        });
        $pifxed = Illuminate\Support\Facades\DB::connection()->getTablePrefix();
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE ".$pifxed."admins comment '管理员表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
