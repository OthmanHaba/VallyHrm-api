<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function index()
    {
        $results = DB::table('attendances')
            ->join('employees', 'attendances.employee_id', '=', 'employees.id')
            ->selectRaw('
             attendances.employee_id,
              employees.name as employee_name,
               date,
               MIN(time) as \'clock-in\',
               MAX(time) as \'clock-out\'')
            ->groupBy('date', 'employee_id')
            ->get();
        return response()->json([
            'data' => $results,
            'message' => 'the attendances has returned successfully',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'type' => 'required|in:in,out',
        ]);

        $attendance = new Attendance();
        $attendance->employee_id = $request->employee_id;
        $attendance->date = $request->date;
        $attendance->time = $request->time;
        $attendance->type = $request->type;
        $attendance->notes = $request->notes ?? null;
        $attendance->save();

        return response()->json([
            'data' => $attendance,
            'message' => 'the attendance has been created successfully',
        ]);
    }

    public function bulkAdd(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'attendances' => 'required|array',
            'attendances.*.date' => 'required|date',
            'attendances.*.time' => 'required|date_format:H:i',
            'attendances.*.type' => 'required|in:in,out',
            'attendances.*.notes' => 'nullable|string',
        ]);

        $attendances = [];
        foreach ($request->attendances as $attendance) {
            $attendances[] = [
                'employee_id' => $request->employee_id,
                'date' => $attendance['date'],
                'time' => $attendance['time'],
                'type' => $attendance['type'],
                'notes' => $attendance['notes'] ?? null,
            ];
        }

        Attendance::insert($attendances);

        return response()->json([
            'message' => 'the attendances has been created successfully',
        ]);
    }


}
