<?php

namespace App\Http\Controllers;

use App\Models\user;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //

    public function User_Login()
    {
        return view('auth.userLogin');
    }

    public function login_check(Request $request)
    {
        $request->validate(
            [
                'email' => 'required | email',
                'password' => 'required'
            ]
        );

        $user = user::where("user_email", '=', $request->input('email'))->first();

        if ($user) {
            if (Hash::check($request->password, $user->user_password)) {
                if ($user->status == 1) {
                    return back()->with('lock_status', 'This account is locked');
                }
                $request->session()->put('LoginName', $user->user_name);
                $request->session()->put('LoginRoll', $user->user_roll);
                return redirect()->route('User.Dashbroad');
            } else {
                return back()->with('fall_password', 'This password is wrong');
            }
        } else {
            return back()->with('fall_email', 'This email is wrong');
        }

    }

    public function Logout()
    {
        if (Session::has('LoginName')) {
            Session::pull('LoginName');
            Session::pull('LoginRoll');
            return redirect()->route('User.login');
        }
    }

    public function User_details(){
        $user=user::all();
        $data=compact('user');
        return view('viewUsers.user')->with($data);
    }
}
