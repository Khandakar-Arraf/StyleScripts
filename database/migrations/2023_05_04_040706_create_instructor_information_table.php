<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructor_information', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->date('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('profession')->nullable();
            $table->string('subject');
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
        Schema::dropIfExists('instructor_information');
    }
}
