<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Helpers\Helper;
use App\Models\User;
use Auth;
use Spatie\Permission\Models\Role;
use App\Http\Resources\UserResource;
use App\Http\Requests\RegisterRequest;
class RegisterController extends Controller
{
    public function register(RegisterRequest $request){
        $user=User::create([
            'name'=>$request->name,
             'email'=>$request->email,
              'password'=>bcrypt($request->password),
        ]);
        $user_role=Role::where(['name'=>'user'])->first();
   
        if($user_role){
   
              $user->assignRole($user_role);
        }
    
     return new  UserResource($user);
    }
}
