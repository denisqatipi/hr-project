<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Timesheet;
use App\TimesheetEvidence;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TimesheetController extends Controller
{
    public function index()
    {
        return view('timesheet', [
            'employees' => Employee::all(),
            'timesheets' => Timesheet::with('supervisor')->get(),
            'evidences' => TimesheetEvidence::with(['employee','timesheet'])->get()
        ]);
    }

    public function search(Request $request)
    {
        $timesheets = Timesheet::where('date', $request->date)
                        ->orWhere('supervisor', $request->supervisor)
                        ->orWhere('notes', $request->notes)
                        ->with('evidence')
                        ->get();

//        dd($timesheets->jsonSerialize());

        $evidences = [];

        foreach ($timesheets as $sheet) {
            if ($sheet->evidence) {
                $evidences[] = $sheet->evidence;
            }
        }


        return view('timesheet', [
            'employees' => Employee::all(),
            'timesheets' => Timesheet::with('supervisor')->get(),
            'evidences' =>  $evidences
        ]);

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'supervisor' => 'required',
            'notes' => 'required',
            'activity' => 'required',
            'employee' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'plan' => 'required',
            'evidence_notes' => 'required'
        ]);

        $timesheet = Timesheet::create([
            'date' => $request->date,
            'supervisor' => $request->supervisor,
            'notes' => $request->notes,
        ]);

        $timesheet_evidence = TimesheetEvidence::create([
            'timesheet_id' => $timesheet->id,
            'employee_id' => $request->employee,
            'activity' => $request->activity,
            'time_start' => $request->time_start,
            'time_end' => $request->time_end,
            'hour' => Carbon::createFromTimeString($request->time_start)->diffInHours($request->time_end, true),
            'plan' => $request->plan,
            'notes' => $request->evidence_notes
        ]);

        return redirect()->route('timesheet.index');

    }
}