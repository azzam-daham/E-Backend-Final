<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return $users;
    }

    public function store(){

    }

    public function show(string $id){
        $user = User::find($id);
        return UserResource::make($user);
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return response()->json(['data'=>'Done Delete']);
    }

    public function update(){

    }
}
