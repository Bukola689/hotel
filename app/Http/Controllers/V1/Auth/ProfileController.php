<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {

        $data = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'd_o_b' => 'required',
            'gender' => 'required',
            'join_date' => 'required',
            'phone_number' => 'required',
            'avatar' => 'required',
            'position' => 'required',
            'department' => 'required',
            'address' => 'required'
        ]);

  
        if($data->fails()) {
            return response()->json([
                'message'=> 'please check your credentials and try again'
            ]);

        }

    
        $profile = $request->user();

        //dd($profile);

           if( $request->hasFile('avatar')) {
  
            $avatar = $request->avatar;
  
            $originalName = $avatar->getClientOriginalName();
    
            $image_new_name = 'avatar-' .time() .  '-' .$originalName;
    
            $avatar->move('profiles/avatar', $image_new_name);
  
            $profile->avatar = 'profiles/avatar/' . $image_new_name;
      }

      $profile->name = $request->input('name');
      $profile->email = $request->input('email');
      $profile->d_o_b = $request->input('d_o_b');
      $profile->gender = $request->input('gender');
      $profile->join_date = $request->input('join_date');
      $profile->phone_number = $request->input('phone_number');
      $profile->position = $request->input('position');
      $profile->department = $request->input('department');
      $profile->address = $request->input('address');
      $profile->update();

        return response()->json($profile);
    }

    public function changePassword(Request $request)
    {

       $validator = Validator::make($request->all(), [
        "old_password" => "required",
        "password" => "required",
        "confirm_password" => "required"
       ]);

       if($validator->fails()) {
        return response()->json(['message'=> 'check your password and try again']);
       }

       $user = $request->user();
       

        if( Hash::check($request->old_password, $user->password)){
            
            $user->update([
                'password' => Hash::make($request->password)
            ]);

           return response()->json([
              'message'=> 'Password Updated Successfully',
           ], 200);

        } else {
            return response()->json([
                'message' => 'check your password and try again later !'
            ]);
        }
    }

    public function viewProfile(Request $request)
    {
        $profile = $request->user();

        return response()->json($profile);


    }
}
