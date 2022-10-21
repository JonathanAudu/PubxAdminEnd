<?php

namespace App\Http\Controllers\mobile;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function signup(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|unique:users',
            'phone_number' => 'required|string|unique:users',
            'password' => 'required|string|min:3'
        ]);

        if ($validator->fails()) {
            $response = [
                'status' => 'failure',
                'status_code' => 400,
                'message' => 'Bad Request',
                'errors' => $validator->errors(),
            ];
            return response()->json($response, 400);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
                'user_role' => 2
            ]);
            if($user){
                    $token = $user->createToken('auth_token')->plainTextToken;
                    $response = [
                        'user' => $user,
                        'token' => $token
                    ];
                    return response($response, 200);
            }
        }
    }

    public function signin(Request $request)
    {
        $user = User::where('email', $request->user)->orWhere('phone_number', $request->user)->first();
        if(!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => 'incorrect signin details'
                ], 401);
        }else{
            $token = $user->createToken('myapptoken')->plainTextToken;
            return response([
                'user' => $user,
                'token' => $token
            ], 200);
        }
    }

    public function signout(Request $request)
    {
        $request->user()->token()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }


    public function forgotpassword(Request $request)
    {
        $user = User::where('email', $request->user)->orWhere('phone_number', $request->user)->first();
        if(!$user) {
                return response([
                    'message' => 'failed'
                ], 401);
        }else{
            $password = rand(100000, 999999);
            $user->update([
                'password' => Hash::make($password),
            ]);
            
            if($user){
                $email = $user->email;

                //TODO send password to email
                $parts = explode('@', $email);
                $new_mail = substr($parts[0], 0, min(1, strlen($parts[0])-1)) . str_repeat('*',max(1, strlen($parts[0]) - 1)) . '@' . $parts[1];
                
                return $new_mail;
            }
            
        }
    }
}
