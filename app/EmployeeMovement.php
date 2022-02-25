<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeMovement extends Model
{
    protected $table = 'hr_employee_movement';

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