<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Exceptions\AppException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SignInFormRequest;
use App\Http\Requests\SignUpFormRequest;
use App\Exceptions\RegisterFailedException;

class UserController extends Controller
{
    public static function signUp(SignUpFormRequest $request)
    {
        $requestData = $request->validated();

        try {
            UserService::signUp($requestData);
        } catch (RegisterFailedException $exception) {
            throw new AppException($exception->getMessage());
        }

        return ['success' => true, 'message' => 'Success', 'code' => 200];
    }

    public static function signIn(SignInFormRequest $request)
    {
        $requestData = $request->validated();
        $result = UserService::signIn($requestData);
        return ['success' => true,  'message' => 'Success', 'code' => 200, "data" => $result];
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }
}
