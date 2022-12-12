<?php

namespace App\Http\Controllers\V1;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\RegisteredNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $data = User::first();

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->pasword);
        $user->save();

        event(new Registered($user));

        $data->notify(new RegisteredNotification($user));

        event(new UserRegistered($user));

        $token = $user->createToken('mytoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response([$response, 201]);
    }
}
