<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espkms', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('name');
            $table->string('ic_number')->unique();
            $table->string('training_group_number');
            $table->string('programme_name');
            $table->string('programme_code');
            $table->string('type');
            $table->string('level');
            $table->string('pb_name');
            $table->integer('state_id')->unsigned()->index();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('restrict');
            $table->date('date_ppl');
            $table->string('result_ppl');
            $table->string('batch_id');
            $table->string('address');
            $table->string('flag_boarded')->default('N');
            $table->string('reason')->nullable();
            $table->text('remark')->nullable();
            $table->string('status')->default('active');
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
        Schema::dropIfExists('espkms');
    }
}
