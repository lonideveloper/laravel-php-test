<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(RegisterRequest $request){

        $data = $request->validated();


        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        $token = $user->createToken($user->email.'_Token')->plainTextToken;

        return response([
           
            'status'=>200,
            'user' => $user->name,
            'token' => $token,
            'message'=>'Registered Successfully',
            
        ]);  

    }

    public function login(LoginRequest $request){

        $credentials = $request->validated();


        $user = User::where('email', $credentials["email"])->first();
        if(! $user || ! Hash::check($credentials["password"], $user->password))
        {
            return response()->json([
                'status'=>401,
                'message'=>'Invalid Credentials',
            ]);
        }
         else
         {
             if($user->role_as == 1)
             {
                $role = 'admin';
                $token = $user->createToken($user->email.'_AdminToken', ['server:admin'])->plainTextToken;
             }
             else
             {
                $role = '';
                $token = $user->createToken($user->email.'_Token', [''])->plainTextToken;
             }
           

            return response()->json([
                'status'=>200,
                'username'=>$user->name,
                'token'=>$token,
                'message'=>'Logged In Successfully',
                'role'=>$role,
            ]);
         }
    }

    }

