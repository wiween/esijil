<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ic_number');
//            $table->string('training_group_number');
            $table->string('programme_name');
            $table->string('programme_code');
            $table->string('type')->nullable();
            $table->string('level')->nullable();
            $table->string('pb_name');
            $table->integer('state_id')->unsigned()->index();
            $table->foreign('state_id')->references('id')->on('states');
            $table->string('date_ppl')->nullable();
            $table->string('result_ppl');
            $table->string('batch_id');
            $table->string('address');
            $table->string('flag_printed')->default('N');
            $table->string('source')->nullable();
            $table->string('officer')->nullable();
            $table->string('certificate_number')->nullable();
            $table->dateTime('date_print')->nullable();
            $table->string('qrlink')->nullable();
            $table->text('remark')->nullable();
            $table->string('printed_remark')->default('cetakan pertama');
            $table->string('session')->nullable();
            $table->string('status')->default('active');
            $table->string('current_status')->default('dalam proses percetakan');
            $table->string('updated_by')->default('super.admin@gmail.com');
            $table->unique(['ic_number', 'batch_id']);
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
        Schema::dropIfExists('certificates');
    }
}
