<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHrEmployeeTable extends Migration
{
    public function up()
    {
        Schema::create('hr_employee', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname');
            $table->string('gender');
            $table->string('insurance_id');
            $table->string('birthdate');
            $table->string('mobile');
            $table->string('address');
            $table->string('email');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hr_employee');
    }
}