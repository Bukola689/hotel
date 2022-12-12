<?php

namespace App\Http\Controllers;

use App\Events\Auth\EmployeeProfile;
use App\Models\Employee;
use App\Notifications\EmployyeProfileNotification;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeProfileController extends Controller
{
    public function employeeProfile(Request $request)
    {

        $user = Employee::first();

        $data = Validator::make($request->all(),[
            'name' => 'required',
            'd_o_b' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'state' => 'required',
            'hire_date' => 'nullable|date',
            'phone_number' => 'required',
            'image' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

  
        if($data->fails()) {
            return response()->json([
                'message'=> 'please check your credentials and try again'
            ]);

        }
  
        $profile = $request->user();

        if( $request->hasFile('image')) {
  
            $image = $request->image;
  
            $originalName = $image->getClientOriginalName();
    
            $image_new_name = 'image-' .time() .  '-' .$originalName;
    
            $image->move('images/image', $image_new_name);
  
            $profile->image = 'images/image/' . $image_new_name;
      }

        $profile = new Employee();
        $profile->name = $request->input('name');
        $profile->d_o_b = $request->input('d_o_b');
        $profile->gender = $request->input('gender');
        $profile->nationality = $request->input('nationality');
        $profile->state = $request->input('state');
        $profile->join_date = Carbon::now();
        $profile->phone_number = $request->input('phone_number');
        $profile->email = $request->input('email');
        $profile->image = 'employees/image/' . $image_new_name;
        $profile->address = $request->input('address');

      $user->notify(new EmployyeProfileNotification($profile));

      event(new EmployeeProfile($profile));

        return response()->json([
            'message' => 'Employee Profile Update Successfully'
        ]);
    }

    public function change_password(Request $request)
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
}
