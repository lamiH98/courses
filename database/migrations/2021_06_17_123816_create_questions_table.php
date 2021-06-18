<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('title');
            $table->string('title_ar');
            $table->string('note');
            $table->string('note_ar');
            $table->string('right_answer');
            $table->string('right_answer_ar');
            $table->string('mark');
            $table->string('option_1');
            $table->string('option_2');
            $table->string('option_3');
            $table->string('option_4');
            $table->string('option_1_ar');
            $table->string('option_2_ar');
            $table->string('option_3_ar');
            $table->string('option_4_ar');

            $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id')->references('id')->on('quizzes');

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
        Schema::dropIfExists('questions');
    }
}
