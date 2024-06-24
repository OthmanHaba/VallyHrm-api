<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $position = Position::all();
        return response()->json([
            'data' => $position,
            'message' => 'the positions has returned successfully',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'department_id' => 'required|exists:departments,id',
        ]);
        $position = Position::create($request->all());
        return response()->json([
            'data' => $position,
            'message' => 'the position has been created successfully',
        ]);
    }
}
