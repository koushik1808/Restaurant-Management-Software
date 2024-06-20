<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Discount;
use App\Models\gst;
use App\Models\Manu;
use App\Models\Table;
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

    public function user_lock_account1($id){
        $admin = user::find($id);
        $admin->status = 1;
        $admin->save();
        return redirect()->route('User.details');
    }

    public function user_unlock_account($id){
        $admin = user::find($id);
        $admin->status = 0;
        $admin->save();
        return redirect()->route('User.details');
    }

    public function user_Degrade_account1($id){
        $admin = user::find($id);
        $admin->user_roll = 2;
        $admin->save();
        return redirect()->route('User.details');
    }

    public function user_Upgrade_account($id){
        $admin = user::find($id);
        $admin->user_roll = 3;
        $admin->save();
        return redirect()->route('User.details');
    }

    public function User_register(){
        return view('auth.register');
    }

    public function  User_Profile(){
        $user = user::where("user_name", '=', Session::get('LoginName'))->first();
        $data=compact('user');
        return view('profile.profile')->with($data);
    }


    public function User_register_check(Request $request){
        $request->validate(
            [
                'username' => 'required',
                'email' => 'required | email',
                'password' => 'required'
            ]
        );

        $user = new user();
        $user->user_name = $request->username;
        $user->user_email = $request->email;
        $user->user_phone = $request->phonenumber;
        $user->Address = $request->Address;
        $user->Store = $request->Store;
        $user->user_password = Hash::make($request->password);
        $user->user_roll = 2;
        $user->status = 0;
        $user->save();

        $category=new category();
        $category->user = $request->username;
        $category->category="Test Category";
        $category->save();

        
        $category1 = category::where("user", '=', $request->username)->where("category", '=', "Test Category")->first();
        $menu = new Manu();
        $menu->Manu_code = 0;
        $menu->Manu_name = "Test Menu";
        $menu->category = "Test Category";
        $menu->category_id = $category1->id;
        $menu->Manu_dis = "Test Discription";
        $menu->user = $request->username;
        $menu->Manu_price =  100;
        $menu->save();

        for($i=0;$i<=4;$i++){
            $table = new Table();
            $table->table=$i;
            $table->user = $request->username;
            $table->save();
        }

        $gst = new gst();
        $gst->user = $request->username;
        $gst->save();

        $discount = new Discount();
        $discount->user = $request->username;
        $discount->save();
        
        return redirect()->route('User.login');
    }
}
