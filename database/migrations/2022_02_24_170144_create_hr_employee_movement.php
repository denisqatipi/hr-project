<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHrEmployeeMovement extends Migration
{
    public function up()
    {
        Schema::create('hr_employee_movement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hr_employee_id');
            $table->date('start_work');
            $table->date('end_work')->nullable();
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('hr_jp_level_id');
            $table->unsignedBigInteger('department_id');
            $table->string('note');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hr_employee_movement');
    }
}