<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('payment_mode')->nullable();
            $table->string('source')->nullable();
            $table->string('category')->nullable();
            $table->string('brand')->nullable();
            $table->string('region')->nullable();
            $table->string('name')->nullable();
            $table->string('number')->nullable();
            $table->string('email')->nullable();
            $table->string('product')->nullable();
            $table->string('service')->nullable();
            $table->string('gross_sale')->nullable();
            $table->string('cash_in_hand')->nullable();
            $table->string('cash_in_gbp')->nullable();
            $table->string('sales_person')->nullable();
            $table->string('sales_date')->nullable();
            $table->string('account_manager')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
