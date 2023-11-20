<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use function Laravel\Prompts\password;

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
    public function logout()
    {
//        auth()->user()->tokens()->delete();
        auth()->logout();
        return response(["message"=>"logged out"]);
    }
//    public function authenticatedCheck(){
//        // Get the authenticated user
//        $user = Auth::user();
//
//// Check if the user has a token
//        if ($user->token()) {
//            // Get the expiration timestamp of the token
//            $tokenExpiration = $user->token()->expires_at;
//
//            // Compare with the current time
//            if (now()->gt($tokenExpiration)) {
//                // Token is expired
//                echo "Token has expired.";
//            } else {
//                // Token is still valid
//                echo "Token is still valid.";
//            }
//        } else {
//            // User doesn't have a token
//            echo "User doesn't have a token.";
//        }
//    }

public function authenticatedCheck()
    {
//        dd(auth()->user()->tokens());
        if (auth()->user() === null){
            auth()->logout();
            return response()->json(["message" => "user logged out"], 401);
        }
        return response(["message"=>"still logged in"]);
        }

}



