<?php

namespace App\Http\Controllers\V1\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;

    public function __constructor(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(5);

        return UserResource::Collection($users);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'd_o_b' => 'required',
            'gender' => 'required',
            'join_date' => 'required',
            'phone_number' => 'required',
            'avatar' => 'required',
            'position' => 'required',
            'department' => 'required',
            'address' => 'required',
        ]);

        $data = $request->all();

        $this->user->saaveUser($request, $data);

        return response()->json([
            'status' => 'User Saved Successfully'
        ]);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(Request $request, User $user)
    {
    

        $request->validate([
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

        $data = $request->all();

        $this->user->updateUser($request, $user, $data);

        return response()->json([
            'status' => 'User Saved Successfully'
        ]);
    }

    public function destroy(User $user)
    {
      
        $this->user->removeUser($user);

        return response()->json([
            'status' => 'User Deleted Successfully'
        ]);
    }

    public function searchUser($search)
    {
        $user = User::where('name', 'LIKE', '%' .$search. '%')->get();

        return response()->json([
            'status' => $user
        ]);
    }
}
