<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
      $data=$request->validate([
        'name' => 'required|min:3|max:10',
        'email' => 'required|email|unique:users',
        'password' => 'required|string',
      ]);
      $user=User::create([
          'name'=>$data['name'],
          'email'=>$data['email'],
          'password'=>Hash::make($data['password']),
      ]);
      $token= $user->createToken('projectToken')->plainTextToken;
      $reponse=[
          'user'=>$user,
          'token'=>$token,
      ];
      return response($reponse,201);
    }
    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json(['message'=>'Logout Successfuly'],200);
    }
}
