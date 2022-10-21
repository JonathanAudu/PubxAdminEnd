<?php

namespace App\Http\Controllers\mobile;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function updateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|unique:user'
        ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'message' => 'Failed',
        //         'errors' => $validator->errors(),
        //     ], 422);
        // }
        $id = Auth::user()->id;

        $user = User::where('id', $id);
        $user->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
        ]);
        return 'yes';
        // return response()->json(User::where('id', $id), 200);
    }



    public function getUserDetails(Request $request){
        $user = Auth::user();
        return response()->json($user);
    }
}
