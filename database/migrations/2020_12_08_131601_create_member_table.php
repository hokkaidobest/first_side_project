<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('account', 255)->comment('帳號:email');
            $table->string('password', 60)->comment('密碼');
            $table->string('login_token', 500);
            $table->string('name', 60)->comment('會員姓名')->nullable();
            $table->string('birthday', 10)->comment('生日:2000-01-01')->nullable();
            $table->enum('gender', ['MALE', 'FEMALE', 'THIRD'])->comment('MALE:男性 FEMALE:女性 THIRD:三性')->nullable();
            $table->timestamp('created_at')->useCurrent()->comment('建立時間');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('更新時間');
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
        Schema::dropIfExists('member');
    }
}
