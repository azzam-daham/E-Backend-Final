<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $data = $request->validated();
        $user = User::create($data);
        return response()->json(['data' => $user]);
    }

    public function login(LoginRequest $request){
        $data = $request->validated();
        if (!Auth::attempt($data)) {
            return response()->json(["data" => ["massege" => "cradintials not correct"]]);
        }
        $user = Auth::user();
        $token = $user->createToken("auth_token")->accessToken;
        return response()->json(["data" => $user,"token"=>$token]);
    }

    public function logout(){

    }
}
