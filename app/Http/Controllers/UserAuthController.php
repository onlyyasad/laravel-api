<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    //

    function signup (Request $request){
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $user['name'] = $user->name;
        return ["success" => true, 'result' => $success, 'message' => 'User signed up successfully', "user" => $user];
    }

    function login(Request $request){
        $input = $request->all();
        return ["message" => "Login api called"];
    }
}
