<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('title');
            $table->string('title_ar');
            $table->string('time');
            $table->string('note');
            $table->string('note_ar');
            $table->string('status')->nullable();;
            $table->longText('description');
            $table->longText('description_ar');

            $table->unsignedBigInteger('stage_id');
            $table->foreign('stage_id')->references('id')->on('stages');

            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');

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
        Schema::dropIfExists('quizzes');
    }
}
