<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use Laratrust\Traits\LaratrustUserTrait;
use Validator;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    use LaratrustUserTrait;

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
                     'name' => 'required',
                     'email' => 'required|email',
                     'password' => 'required',
                     'c_password' => 'required|same:password',
           ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        $owner = Role::find(1);
        $user->attachRole($owner->id);
        dd($user);
        return $user;
       }



    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('token')-> accessToken;
            $role = DB::table('role_user')->where('user_id', '=', $user->id)->get();
            $data = DB::table('roles')->where('id', '=', $role[0]->role_id)->get();
            return response()->json(['user'=>$user,'role'=>$data[0]->name]);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out',
            'user' => $request->user()
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
