<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OptionController extends Controller
{
    public function departments()
    {
        $options = DB::table('departments')
            ->select(
                DB::raw('id as value'),
                DB::raw('name as name'),
            )
            ->get();
        return response()->json([
            'data' => $options,
            'message' => 'the departments options has returned successfully',
        ]);

    }

    public function getOptions(Request $request)
    {
//        return $request->all();
//        $request->validate([
//            'table' => 'exists:options,id',
//        ])
        $options = DB::table($request->table)
            ->select(
                DB::raw('id as value'),
                DB::raw('name as name'),
            )->get();

        return response()->json([
            'message' => 'the options options have returned successfully',
            'data' => $options,
        ]);

    }
}
