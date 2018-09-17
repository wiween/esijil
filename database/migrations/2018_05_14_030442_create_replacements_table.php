<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplacementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replacements', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->date('date_replacement');
            $table->string('type_replacement');
            $table->string('reason');
            $table->string('old_certificate_number');
            $table->text('remark')->nullable();
            $table->string('status')->default('active');
            $table->integer('certificate_id')->unsigned()->index();
            $table->foreign('certificate_id')->references('id')->on('certificates');
            $table->string('printed_remark')->default('cetakan kedua');
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
        Schema::dropIfExists('replacements');
    }
}
