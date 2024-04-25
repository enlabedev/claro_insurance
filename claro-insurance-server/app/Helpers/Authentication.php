<?php

namespace App\Helpers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Authentication
{

    public static function login(UserLoginRequest $request)
    {
        // Get the user's email and password from the request.
        $credentials = $request->only('email', 'password', 'type');

        //dd((['email' => $request->email, 'password' => $request->password]));

        // Attempt to authenticate the user using the email and password.
        if (!Auth::attempt($credentials)) {
            return [
                'status' => false,
                'data' => [
                    'message' => 'Unauthorized'
                ],
            ];
        }

        // Get the authenticated user.
        $user = Auth::user();

        // Generate a token for the authenticated user.
        $token = $user->createToken('auth_token')->plainTextToken;

        // Return the user's information and the token.
        return [
            'status' => true,
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ];
    }

    public static function register(UserRegisterRequest $request)
    {
        // Create a new user using the request data.
        $user = User::create($request->all());

        // Generate a token for the new user.
        $token = $user->createToken('auth_token')->plainTextToken;

        // Return the new user's information and the token.
        return [
            'status' => true,
            'data' => [
                'user' => $user,
                'token' => $token
            ]
        ];
    }

    public static function logout()
    {
        // Revoke the token for the authenticated user.
        Auth::user()->tokens()->delete();

        // Return a success message.
        return [
            'status' => true,
            'data' => [
                'message' => 'Logged out'
            ]
        ];
    }
}
