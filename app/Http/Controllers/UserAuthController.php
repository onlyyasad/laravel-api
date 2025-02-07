<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return ['success' => false, 'message'=>'Invalid email/password.'];
        }else{
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $user['name'] = $user->name;
            return ["success" => true, 'result' => $success, 'message' => 'User logged in successfully', "user" => $user];
        }
        
    }
}
