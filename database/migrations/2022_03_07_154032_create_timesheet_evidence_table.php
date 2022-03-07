<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesheetEvidenceTable extends Migration
{
    public function up()
    {
        Schema::create('timesheet_evidence', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('timesheet_id');
            $table->unsignedBigInteger('employee_id');
            $table->string('activity');
            $table->time('time_start');
            $table->time('time_end');
            $table->decimal('hour');
            $table->string('plan');
            $table->string('notes');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('timesheet_evidence');
    }
}