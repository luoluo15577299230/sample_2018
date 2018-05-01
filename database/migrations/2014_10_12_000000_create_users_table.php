<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()        //创建Users表
    {
        Schema::create('users', function (Blueprint $table) {   //字段名称      字段类型
            $table->increments('id');                           // id           integer(自增id)
            $table->string('name');                             // name         string
            $table->string('email')->unique();                  // email        string
            $table->string('password',60);                      // password     string
            $table->rememberToken();                            // remenber_token   string(保存“记住我”的相关信息)
            $table->timestamps();                               // created_at / updated_at     datetime (保存用户创建时间 和 更新时间)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()      //删除Users表
    {
        Schema::dropIfExists('users');
    }
}
