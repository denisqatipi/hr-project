<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    protected $table = 'timesheet';

    protected $fillable = [
        'date',
        'supervisor',
        'notes'
    ];

    public function supervisor()
    {
        return $this->belongsTo(Employee::class, 'supervisor');
    }

    public function evidence()
    {
        return $this->hasOne(TimesheetEvidence::class);
    }
}