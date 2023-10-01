<?php

namespace App\Http\Controllers;

use App\Models\admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    //
    

    public function Login(){
        return view('auth.login');
    }
    
    public function login_check(Request $request){
        $request->validate(
            [
                'email'=>'required | email',
                'password' => 'required'
            ]
        );
        
        $user=admin::where("email",'=',$request->input('email') )->first();
       
        if($user){
            if($user->password==$request->password){
                $request->session()->put('LoginName',$user->name);
                return redirect()->route('Admin.Dashbroad');
            }
            else{
                return back()->with('fall_password','This password is wrong');
            }
        }
        else{
            return back()->with('fall_email','This email is wrong');
        }
        
    }

    public function Logout(){
        if(Session::has('LoginName')){
            Session::pull('LoginName');
            return redirect()->route('Admin.login');
        }
    }
}

