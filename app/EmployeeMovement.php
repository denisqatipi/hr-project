<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeMovement extends Model
{
    protected $table = 'hr_employee_movement';

    protected $fillable = [
        'hr_employee_id',
        'start_work',
        'end_work',
        'position_id',
        'department_id',
        'note',
        'hr_jp_level_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }



}