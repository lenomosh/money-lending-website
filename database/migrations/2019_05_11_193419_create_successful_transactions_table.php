<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuccessfulTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('successful_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('resultDesc', 250);
            $table->string('resultCode',250);
            $table->string('merchantRequestID', 250);
            $table->string('checkoutRequestID', 250);
            $table->string('amount',200);
            $table->string('balance', 250);
            $table->string('transactionDate',250);
            $table->string('phoneNumber',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('successful_transactions');
    }
}
