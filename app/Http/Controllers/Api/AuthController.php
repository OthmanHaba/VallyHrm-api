<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $req)
    {
        $req->authenticate();

        $user = Auth::user();

        return response()->json([
            'token' => $user->createToken('auth')->plainTextToken,
            'user' => $user
        ]);

    }
}
