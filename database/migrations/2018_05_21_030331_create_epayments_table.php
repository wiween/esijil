<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epayments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('replacement_id')->unsigned()->index();
            $table->foreign('replacement_id')->references('id')->on('replacements')->onDelete('restrict');
            $table->string('updated_by')->default('super.admin@gmail.com');
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
        Schema::dropIfExists('epayments');
    }
}
