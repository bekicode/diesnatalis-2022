<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            //id_relation untuk menghubungkan dengan table lain seperti di table teams (id_teams)
            $table->integer('id_relation');
            $table->integer('order_id');
            $table->string('transaction_id');
            $table->string('payment_type');
            $table->integer('gross_amount');
            $table->string('transaction_status');
            $table->string('pdf_url')->nullable();
            $table->timestamp('transaction_time');
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
};
