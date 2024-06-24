<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::where('parent_id', 0)->get();
        return response()->json([
            'data' => DepartmentResource::collection($department),
            'message' => 'the departments has returned successfully',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $department = Department::create($request->all());
        return response()->json([
            'data' => $department,
            'message' => 'the department has been created successfully',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $department = Department::find($request->id);
        $department->update($request->all());
        return response()->json([
            'data' => $department,
            'message' => 'the department has been updated successfully',
        ]);

    }

    public function destroy($id)
    {
        $department = Department::find($id);

        try {
            DB::transaction(function () use ($department) {
                $this->deleteSubDepartments($department->id);
                $department->delete();
            });
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }

        return response()->json([
            'data' => $department,
            'message' => 'the department has been deleted successfully',
        ]);
    }

    protected function deleteSubDepartments($parent_id)
    {
        $departments = Department::where('parent_id', $parent_id)->get();
        foreach ($departments as $department) {
            $this->deleteSubDepartments($department->id);
            $department->delete();
        }
    }

}
