<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('title');
            $table->string('title_ar');
            $table->string('time');
            $table->enum('type', ['biology', 'applied']);
            $table->enum('type_ar', ['أحيائي', 'تطبيقي']);
            $table->float('price')->nullable();
            $table->float('price_offer')->nullable();
            $table->longText('description');
            $table->longText('description_ar');

            $table->unsignedBigInteger('stage_id');
            $table->foreign('stage_id')->references('id')->on('stages');

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
        Schema::dropIfExists('courses');
    }
}
