<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('course_en_name');
            $table->string('course_nickname')->nullable();
            $table->string('course_code')->unique();
            $table->string('course_image')->nullable();
            $table->unsignedFloat('course_rating')->default(0);
            $table->bigInteger('category_id');
            $table->bigInteger('tutor_id');
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
