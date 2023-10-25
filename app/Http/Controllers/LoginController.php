<?php
//
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Validation\ValidationException;
//
//class LoginController extends Controller
//{
//    public function login(Request $request)
//    {
//        $request->validate([
//            'email' => 'required|email',
//            'password' => 'required',
//        ]);
//
//        if (Auth::attempt($request->only('email', 'password'))) {
//            $user = Auth::user();
//            dd($user);
//            $token = $user->createToken('token-name')->plainTextToken;
//
//            return response()->json(['access_token' => $token]);
//        }
//
//        throw ValidationException::withMessages([
//            'email' => ['The provided credentials are incorrect.'],
//        ]);
//    }
//}


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class LoginController extends Controller
{
    public function check(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return response()->json(['status' => true,
                'message' => "Success"
            ]);
        }
        return response()->json(['status' => false,
            'message' => "Fail"

        ]);
    }

}
