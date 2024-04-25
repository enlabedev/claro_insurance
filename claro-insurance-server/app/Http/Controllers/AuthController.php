<?php

namespace App\Http\Controllers;

use App\Helpers\Authentication;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * This method attempts to authenticate a user.
     *
     * @param UserLoginRequest $request The request object containing the user's credentials.
     * @return \Illuminate\Http\JsonResponse A JSON response containing the status of the login attempt and, if successful, the user's information and encrypted token.
     */

    public function register(UserRegisterRequest $request)
    {
        try {
            // Validate the request data.
            $request->validated();

            // Attempt to authenticate the user using the email and password received from the request.
            $register = Authentication::register($request);

            // Return a JSON response containing the status of the login attempt and, if successful, the user's information and encrypted token.
            return response()->json($register, $register['status'] ? 200 : 401);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }

    }

    public function login(UserLoginRequest $request, $type = 'admin')
    {
        try {
            // Validate the request data.
            $request->validated();

            // Add the user type to the request data.
            $request->merge(['type' => $type]);

            // Attempt to authenticate the user using the email and password received from the request.
            $login = Authentication::login($request);

            // Return a JSON response containing the status of the login attempt and, if successful, the user's information and encrypted token.
            return response()->json($login, $login['status'] ? 200 : 401);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }

    }

    public function logout()
    {
        try {
            // Attempt to log out the user.
            $logout = Authentication::logout();

            // Return a JSON response containing the status of the logout attempt.
            return response()->json($logout, $logout['status'] ? 200 : 401);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
