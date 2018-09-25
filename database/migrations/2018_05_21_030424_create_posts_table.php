<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->date('date_post');
            $table->string('post_company');
            $table->string('flag_received');
            $table->date('date_receive')->nullable();
            $table->string('receiver')->nullable();
            $table->string('tracking_number');
            $table->string('source')->default('dalaman');
            $table->text('remark')->nullable();
            $table->string('status')->default('active');
            $table->integer('certificate_id')->unsigned()->index();
            $table->foreign('certificate_id')->references('id')->on('certificates');
            $table->string('updated_by')->default('super.admin@gmail.com');
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
