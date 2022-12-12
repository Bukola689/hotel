<?php

namespace App\Http\Controllers\V1;

use App\Events\UserLoggedIn;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Notifications\LoginNotification;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $not = User::first();

        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $data['email'])->first();

        if(!$user || !Hash::check($data['password'], $user->password))
        {
            return response(['message'=>'invalid credentials'], 401);
        } else {
          $token  = $user->createToken('myapptoken')->plainTextToken;
  
          $response = [
              'user'=>$user,
              'token'=>$token,
          ];

        //  event(new UserLoggedIn($user));

          //$not->notify(new LoginNotification($user));
  
          return response($response, 200);
        }
    }
}
