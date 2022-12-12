<?php

namespace App\Repository\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserRepository implements IUserRepository
{
    public function saveUser(Request $request, array $data)
    {
        $avatar = $request->avatar;
  
        $originalName = $avatar->getClientOriginalName();
  
        $image_new_name = 'avatar-' .time() .  '-' .$originalName;
  
        $avatar->move('users/avatar', $image_new_name);
  

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->d_o_b = $request->input('d_o_b');
        $user->gender = $request->input('gender');
        $user->join_date = $request->input('join_date');
        $user->phone_number = $request->input('phone_number');
        $user->avatar = 'users/avatar/' . $image_new_name;;
        $user->position = $request->input('position');
        $user->department = $request->input('department');
        $user->address = $request->input('address');
        $user->save();
    }

    public function updateUser(Request $request, User $user, array $data)
    {
        if( $request->hasFile('avatar')) {
  
            $avatar = $request->avatar;
  
            $originalName = $avatar->getClientOriginalName();
    
            $image_new_name = 'avatar-' .time() .  '-' .$originalName;
    
            $avatar->move('users/avatar', $image_new_name);
  
            $user->avatar = 'users/avatar/' . $image_new_name;
        }
      
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->d_o_b = $request->input('d_o_b');
        $user->gender = $request->input('gender');
        $user->join_date = $request->input('join_date');
        $user->phone_number = $request->input('phone_number');
        $user->position = $request->input('position');
        $user->department = $request->input('department');
        $user->address = $request->input('address');
        $user->update();
    }

    public function removeUser(User $user)
    {
        $user = $user->delete();
    }
}