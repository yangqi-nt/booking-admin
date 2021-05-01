<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookInit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('openid')->comment('微信openid');
            $table->string('nickname')->comment('昵称');
            $table->integer('phone')->nullable();
            $table->integer('credit')->default(0)->comment('积分');
            $table->string('avatar')->comment('头像');
            $table->integer('status')->default(1)->comment('状态');
        });

        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('small_title');
            $table->string('image')->comment('活动主图');
            $table->mediumText('content')->comment('活动内容');
            $table->timestamp('vote_start')->nullable()->comment('活动开始时间');
            $table->timestamp('vote_end')->nullable()->comment('活动结束时间');
            $table->integer('price')->default(0)->comment('活动金额');
            $table->integer('price_back')->default(0)->comment('结束后奖励金额');
            $table->integer('seats')->default(10)->comment('可报名席位');
            $table->timestamps();
        });

        Schema::create('movie_bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('movie_id');
            $table->integer('user_id');
            $table->tinyInteger('status')->comment('1-已报名 2-已确认 3-已取消');
            $table->integer('pay')->default(0)->comment('支付金额');
            $table->string('comment')->nullable()->comment('备注');
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
        Schema::dropIfExists('movies');
        Schema::dropIfExists('movies_booking');
    }
}
