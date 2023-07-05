<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_master', function (Blueprint $table) {
            $table->id();
            
            $table->string('student_f_name')->nullable();
            $table->string('student_m_name')->nullable();
            $table->string('student_l_name')->nullable();
            $table->bigInteger('student_state')->unsigned();
            $table->bigInteger('student_city')->unsigned();
            $table->foreign('student_state')->references('id')->on('state_master')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('student_city')->references('id')->on('city_master')->onDelete('cascade')->onUpdate('cascade');
            $table->string('gender')->nullable();
            $table->string('profile_photo_link')->nullable();
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
        //
    }
}
