<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    

    public function Login(){
        return view('AdminLogin.login');
    }
    
    public function login_check(Request $request){
        $request->validate(
            [
                'email'=>'required | email',
                'password' => 'required'
            ]
        );
        
       return $request;
        
    }

    
}
