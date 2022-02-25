<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Level;
use App\Position;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        return view('index', [
            'employees' => Employee::with(['currentMovement'])->get()
        ]);
    }

    public function add()
    {
        return view('add', [
            'departments' => Department::all(),
            'positions' => Position::all()
        ]);
    }

    public function edit($id)
    {
        $employee = Employee::find($id);

        if ($employee) {
            return view('edit', [
                'employee' => $employee,
                'positions' => Position::all(),
                'departments' => Department::all()
            ]);
        }
    }

    public function show($id)
    {
        $employee = Employee::find($id);

        if ($employee) {
            return view('blank', ['employee' => $employee, 'movements' => $employee->movements]);
        } else {
            abort(404);
        }
    }
}
