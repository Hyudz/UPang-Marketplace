<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_table;
use Illuminate\Support\Facades\Hash;

class user_controller extends Controller
{
    public function index(){
        return user_table::with('products')->get();
    }

    public function store(Request $request){
        $data['first_name'] = $request->input('first_name');
        $data['last_name'] = $request->input('last_name');
        $data['email'] = $request->input('email');
        $data['password'] = Hash::make($request->input('password'));
        $data['user_type'] = $request->input('user_type');
        $data['gender'] = $request->input('gender');
        $data['birthday'] = $request->input('birthday');
        $user = user_table::create($data);
        if ($user) {
            return response()->json([
                'status' => 'success',
                'message' => 'User created successfully',
                'data' => $user
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User not created'
            ]);
        }
    }

    public function update(Request $request, $id){
        $user = user_table::findOrFail($id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'contactNo' => 'required',
        ]);


        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'contactNo' => $request->contactNo,
        ]);
        return response()->json(['message' => 'User updated successfully']);

    }

    public function updateAccount(Request $request, $id){
        $request->validate([
            'email' => 'required|email|unique:user_table,email,'.$id,
            'newpassword' => 'required|confirmed',
            'newpassword_confirmation' => 'required',
        ]);

        $userProfile = user_table::find($id);
    
        $userProfile->update([
            'email' => $request->email,
            'password' => Hash::make($request->newpassword),
        ]);
        return response()->json(['message' => 'User account updated successfully']);
    }

    public function destroy($id){
        $user = user_table::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
