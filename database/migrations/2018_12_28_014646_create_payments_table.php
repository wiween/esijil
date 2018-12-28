<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transaction_id');
            $table->string('receipt_no');
            $table->string('flag')->default('N');     // for admin to mark, like ... danger, warning
            $table->date('payment_date')->nullable();     // for admin to put remark on investigation
            $table->string('transaction_type');     // for admin to put remark on investigation
            $table->integer('replacement_id')->unsigned()->index();
            $table->foreign('replacement_id')->references('id')->on('replacements')->onDelete('restrict');
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
        Schema::dropIfExists('payments');
    }
}
