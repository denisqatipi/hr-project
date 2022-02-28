<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\EmployeeMovement;
use App\Level;
use App\Position;
use Carbon\Carbon;
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'surname' => 'required',
            'insurance' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'position' => 'required',
            'department' => 'required'
        ]);

        $employee = Employee::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'gender' => $request->gender,
            'insurance_id' => $request->insurance,
            'birthdate' => $request->birthday,
            'mobile' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'active' => true
        ]);

        if ($employee) {
            $position = Position::find($request->position);

            EmployeeMovement::create([
                'hr_employee_id' => $employee->id,
                'start_work' => Carbon::now()->toDate(),
                'end_work' => null,
                'position_id' => $request->position,
                'department_id' => $request->department,
                'note' => '',
                'hr_jp_level_id' => $position->level->id
            ]);

            return redirect()->route('index')->with('success');

        }
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'surname' => 'required',
            'insurance' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'position' => 'required',
            'department' => 'required'
        ]);

        $employee->name = $request->name ?: $employee->name;
        $employee->surname = $request->surname ?: $employee->surname;
        $employee->gender = $request->gender ?: $employee->gender;
        $employee->insurance_id = $request->insurance ?: $employee->insurance_id;
        $employee->birthdate = $request->birthday ?: $employee->birthdate;
        $employee->mobile = $request->phone ?: $employee->mobile;
        $employee->address = $request->address ?: $employee->address;
        $employee->email = $request->email ?: $employee->email;

        $employee->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $employee = Employee::find($id);

        $employee->delete();

        return redirect()->route('index');
    }
}
