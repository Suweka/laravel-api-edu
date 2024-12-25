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
    public function up(){
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('title'); // Course title
            $table->text('description'); // Course description
            $table->integer('duration')->nullable(); // Optional duration in hours
            $table->string('level')->default('Beginner'); // Course level (e.g., Beginner, Intermediate, Advanced)
            $table->timestamps(); // Created at and Updated at timestamps
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
