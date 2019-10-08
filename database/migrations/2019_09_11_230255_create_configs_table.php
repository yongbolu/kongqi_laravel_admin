<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('group_type')->index()->default('config')->comment('分组');
            $table->string('ename', 50)->comment('调用英文名');
            $table->text('content')->nullable()->comment('值');
            $table->timestamps();
        });

        $pifxed = Illuminate\Support\Facades\DB::connection()->getTablePrefix();
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE " . $pifxed . "configs comment '配置表'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
