<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id');
            
            $table->string('amount');
            $table->string('currency');
            $table->string('status');
            $table->string('channel');
            $table->string('message');
            
            $table->string('payment_refrence');
            $table->string('authorization_code');
            $table->string('customer_code');
            $table->string('customer_email');
            
            $table->date('transaction_date');
            $table->date('transaction_id');
            
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
        Schema::dropIfExists('transactions');
    }
}
