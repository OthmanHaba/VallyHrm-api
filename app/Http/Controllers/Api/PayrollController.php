<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{

    public function index()
    {
        $payrolls = Payroll::with('employee')->get();

        return response()->json([
            'data' => $payrolls,
            'message' => 'the payrolls has returned successfully',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'month' => 'required|date_format:Y-m',
            'basic_salary' => 'required|numeric',
            'allowances' => 'nullable|numeric',
            'deductions' => 'nullable|numeric',
            'net_salary' => 'required|numeric',
        ]);

        $payroll = new Payroll();
        $payroll->employee_id = $request->employee_id;
        $payroll->date = $request->month . '-01';
        $payroll->basic_salary = $request->basic_salary;
        $payroll->allowances = $request->allowances;
        $payroll->deductions = $request->deductions;
        $payroll->net_salary = $request->net_salary;
        $payroll->notes = $request->notes ?? null;
        $payroll->save();

        return response()->json([
            'data' => $payroll,
            'message' => 'the payroll has been created successfully',
        ]);
    }

}
