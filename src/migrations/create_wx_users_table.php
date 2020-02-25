<?php
/**
 * Created by phpstorm.
 * User: yangliang
 * Date: 2020/2/24 0024
 * Time: 16:47
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wx_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('openid')->nullable()->comment('微信开放id');
            $table->string('nickname')->nullable()->comment('昵称');
            $table->string('head_image')->nullable()->comment('微信头像');
            $table->string('country')->nullable()->comment('国家');
            $table->string('province')->nullable()->comment('省份');
            $table->string('city')->nullable()->comment('所在城市');
            $table->string('language')->nullable()->comment('语言');
            $table->json('location')->nullable()->comment('当前地理信息');
            $table->enum('gender', ['1', '2'])->default('1')->comment('性别默认男');
            $table->string('phone')->nullable()->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wx_users');
    }
}
