<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    
    public function up()
    {
         Schema::create('students', function (Blueprint $table) {
             $table->id(); // Primary Key
             $table->string('name'); // Student's full name
             $table->string('email')->unique(); // Unique email
             $table->integer('age'); // Age of the student
             $table->string('city'); // City where the student resides
             $table->string('phone_number')->nullable(); // Optional phone number
             $table->string('gender')->nullable(); // Gender (Male/Female/Other)
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
        Schema::dropIfExists('students');
    }
}
