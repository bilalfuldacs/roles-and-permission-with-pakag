<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Helpers\Helper;
use Auth;
use App\Http\Resources\UserResource;
use App\Http\Requests\LoginRequest;
class LoginController extends Controller
{
    public function login(LoginRequest $request){
     if(!Auth::attempt($request->only('email','password'))){
        Helper::SendErr('email or password is wrong');
     }
     return new  UserResource(Auth()->user());
    }
}
