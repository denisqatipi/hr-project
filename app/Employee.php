<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'hr_employee';

    public function movements()
    {
        return $this->hasMany(EmployeeMovement::class, 'hr_employee_id');
    }

    public function currentMovement()
    {
        return $this->hasOne(EmployeeMovement::class,'hr_employee_id')->where('end_work', null);
    }
}