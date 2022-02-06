<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;
use App\Exceptions\AppException;
use Illuminate\Support\Facades\Hash;

class UserService
{
   public static function signUp($userRequest)
   {
      $userRequest['password'] = Hash::make($userRequest['password']);
      $userRequest['remember_token'] = Str::random(10);
      User::saveUserDetails($userRequest);
   }

   public static function signIn($userRequest)
   {
      $userFilter['filters']['email'] = $userRequest['email'];
      $userDetails = User::getUserDetailsByEmail($userFilter);

      if (empty($userDetails)) {
         throw new AppException("User Not Found!.");
      }

      if (Hash::check($userRequest['password'], $userDetails['password'])) {
         $token = $userDetails->createToken('MyApp')->accessToken;
         $response = ['token' => $token];
         return $response;
      } else {
         $response = ["message" => "Password mismatch"];
         return $response;
      }
   }

}
