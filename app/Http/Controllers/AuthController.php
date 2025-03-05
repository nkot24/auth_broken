<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = User::create($fields);
        $token = $user->createToken($request->name);
        return [
            'user' => $user,
            'token' => $token

        ];
    }
    public function login(Request $request){
        $fields = $request->validate([ 
            'email' => 'required|email|exists:users',
            'password' => 'required|confirmed'
        ]);
        $user = User::where('email', $reques->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)){
            return[
                'message' => 'incorect'
            ];
        }

    }
    public function logout(Request $request){
        return 'logout';
    }
}
