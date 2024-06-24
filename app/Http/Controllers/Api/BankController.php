<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BankResource;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::all();
        return response()->json([
            'data' => BankResource::collection($banks),
            'message' => 'the banks has returned successfully',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $bank = Bank::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'data' => $bank,
            'message' => 'the bank has been created successfully',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $bank = Bank::find($request->id);
        $bank->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'data' => $bank,
            'message' => 'the bank has been updated successfully',
        ]);
    }

    public function destroy(Request $request)
    {
        $bank = Bank::find($request->id);
        $bank->delete();

        return response()->json([
            'message' => 'the bank has been deleted successfully',
        ]);
    }
}
