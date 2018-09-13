<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->increments('id');
//            $table->integer('certificate_id')->unsigned()->index();
//            $table->foreign('certificate_id')->references('id')->on('certificates')->onDelete('restrict');
            $table->string('batch_id')->nullable();
            $table->string('finance_remark')->nullable();
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('finances');
    }
}
