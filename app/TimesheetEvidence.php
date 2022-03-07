<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimesheetEvidence extends Model
{
    protected $table = 'timesheet_evidence';

    protected $fillable = [
        'timesheet_id',
        'employee_id',
        'activity',
        'time_start',
        'time_end',
        'hour',
        'plan',
        'notes'
    ];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function timesheet()
    {
        return $this->belongsTo(Timesheet::class);
    }

}