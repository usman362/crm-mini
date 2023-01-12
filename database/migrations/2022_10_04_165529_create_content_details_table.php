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
        Schema::create('content_details', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('task_id')->nullable();
            $table->string('client')->nullable();
            $table->string('link')->nullable();
            $table->string('product_type')->nullable();
            $table->string('per_word_credit')->nullable();
            $table->string('expected_word_count')->nullable();
            $table->string('writer_word_count')->nullable();
            $table->string('writer_word_converted')->nullable();
            $table->string('writer_flag')->nullable();
            $table->string('editor_assigned')->nullable();
            $table->string('editor_word_count')->nullable();
            $table->string('editor_flag')->nullable();
            $table->string('plagiarism')->nullable();
            $table->string('approval')->nullable();
            $table->string('client_feedback')->nullable();
            $table->string('clarity_tab')->nullable();
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
        Schema::dropIfExists('content_details');
    }
};
