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
        Schema::create('spread_sheets', function (Blueprint $table) {
            $table->id();
            $table->string('spreadsheet_name');
            $table->string('spreadsheet_link');
            $table->unsignedBigInteger('assign_to')->nullable();
            $table->foreign('assign_to')->references('id')->on('users');
            $table->unsignedBigInteger('assign_by')->nullable();
            $table->foreign('assign_by')->references('id')->on('users');
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
        Schema::dropIfExists('spread_sheets');
    }
};
