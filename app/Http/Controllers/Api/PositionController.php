<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PositionRequest;
use App\Http\Resources\PositionResource;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $position = Position::with('department')->get();
        return response()->json([
            'data' => PositionResource::collection($position),
            'message' => 'the positions has returned successfully',
        ]);
    }

    public function store(PositionRequest $request)
    {

        $position = Position::create([
            'name' => $request->name,
            'description' => $request->description,
            'department_id' => $request->department,
        ]);


        return response()->json([
            'data' => $position,
            'message' => 'the position has been created successfully',
        ]);
    }
}
