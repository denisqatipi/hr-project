<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeMovement;
use App\Position;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeMovementController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate( $request, [
            'employee_id' => 'required',
            'position' => 'required',
            'department' => 'required'
        ]);

        $position = Position::find($request->position);

        $previous_movement = Employee::find($request->employee_id)->currentMovement;

        $movement = EmployeeMovement::create([
            'hr_employee_id' => $request->employee_id,
            'start_work' => Carbon::now()->toDate(),
            'end_work' => null,
            'position_id' => $request->position,
            'hr_jp_level_id' => $position->level->id,
            'department_id' => $request->department,
            'note' => $request->note ?: ''
        ]);

        if ($movement) {

            if ($previous_movement) {
                $previous_movement->end_work = $movement->start_work;
                $previous_movement->save();
            }

            return redirect()->back()->with('success',true);
        } else {
            return redirect()->back()->with('success',false);
        }
    }
}