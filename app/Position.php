<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'hr_job_positions';

    public function level()
    {
        return $this->hasOne(Level::class, 'position_id');
    }
}