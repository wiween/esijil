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
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('name');
            $table->string('email');
            $table->unique('email');;
            $table->string('password');
            $table->string('ic_number')->unique();
            $table->string('phone_number')->nullable();
            $table->string('avatar')->default('/images/user/default.png');
            $table->string('role')->default('user');
            $table->integer('access_power')->default(100);
            $table->string('user_type')->default('Tiada');
            $table->text('remark')->nullable();
            $table->string('status')->default('active');
            $table->string('updated_by')->default('super.admin@gmail.com');
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
