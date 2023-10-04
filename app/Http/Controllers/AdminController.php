<?php

namespace App\Http\Controllers;

use App\Models\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    //


    public function Login()
    {
        return view('auth.login');
    }

    public function login_check(Request $request)
    {
        $request->validate(
            [
                'email' => 'required | email',
                'password' => 'required'
            ]
        );

        $user = Admin::where("email", '=', $request->input('email'))->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('LoginName', $user->name);
                return redirect()->route('Admin.Dashbroad');
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
            return redirect()->route('Admin.login');
        }
    }
}