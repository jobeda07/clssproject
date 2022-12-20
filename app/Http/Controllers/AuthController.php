<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AuthController extends Controller
{
    public function register(){
        return view( "backendsecond.pages.auth.registerpage");
    }
    
    public function register_Submit(Request $request){
         User::create([
         'name'=>$request->name,
         'email'=>$request->email,
         'username'=>$request->username,
         'password'=>bcrypt($request->password)
         ]);
     return back();
    }

    public function login(){
        return view( "backendsecond.pages.auth.loginpage");
    }
    public function login_Submit(Request $request){
         
        $credentials=$request->except('_token');
        $authentication=auth()->attempt($credentials);
        if($authentication){
            return to_route('dashboardsecond');
   
        }
        else{
            return to_route('register');
        }
    }

    public function logout(){
        auth()->logout();
        return to_route('login');
    }


}
