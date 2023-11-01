<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
//use Validator;

class AuthController extends Controller
{
//    manages user authentication
    public function login(Request $request)
    {
        $validateUser = $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);
        $credentials = request([
            'email',
            'password'
        ]);

        if(!Auth::attempt($credentials))
        {
            return response()->json(['message' => 'User does not exist'],401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal access token');
        $token = $tokenResult->plainTextToken;

        return response()->json([
            'accessToken' => $token,
            'token_type' => 'Bearer',
        ]);
    }

// manages user logout
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        auth()->logout();
        return response(["message"=>"logged out"]);
    }
}
