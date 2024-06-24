<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BankBranchResource;
use App\Models\BankBranch;
use App\Models\Branch;
use Illuminate\Http\Request;

class BankBranchController extends Controller
{
    public function index(Request $request)
    {
        $branches = BankBranch::query();

        if ($request->has('bank_id')) {
            $branches = $branches->where('bank_id', $request->bank_id);
        }
        
        $branches = $branches->with('bank')->get();

        return response()->json([
            'data' => BankBranchResource::collection($branches),
            'message' => 'the branches has returned successfully',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'bank_id' => 'required|integer',
        ]);

        $branch = BankBranch::create([
            'name' => $request->name,
            'bank_id' => $request->bank_id,
        ]);

        return response()->json([
            'data' => $branch,
            'message' => 'the branch has been created successfully',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'bank_id' => 'required|integer',
            'address' => 'required|string',
        ]);

        $branch = Branch::find($request->id);
        $branch->update([
            'name' => $request->name,
            'bank_id' => $request->bank_id,
            'address' => $request->address,
        ]);

        return response()->json([
            'data' => $branch,
            'message' => 'the branch has been updated successfully',
        ]);
    }
}
