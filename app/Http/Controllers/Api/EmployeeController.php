<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = Employee::all();
        return response()->json([
            'data' => $employee,
            'message' => 'the employees has returned successfully',
        ]);
    }

    public function store(EmployeeRequest $request)
    {
        $request->validated();

        $employee = Employee::create($request->all());
        return response()->json([
            'data' => $employee,
            'message' => 'the employee has been created successfully',
        ]);
    }
}
