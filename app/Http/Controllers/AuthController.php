<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid credentials.',
            ], 401);
        }
        /** @var \App\Models\User $user */
        $user  = Auth::user();
        $token = $user->createToken('mobile-app')->plainTextToken;
        
        return response()->json([
            'user'  => $user,
            'token' => $token,
        ]);
    }
}