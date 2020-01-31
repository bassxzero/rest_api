<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {

        $validatedData = $request->validate([
            "name" => "required|max:55",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user' => $user, 'access_token' => $accessToken]);

    }

    public function login(Request $request)
    {

        $loginData = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid crediticals']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);

    }
}
