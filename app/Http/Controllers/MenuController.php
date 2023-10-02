<?php

namespace App\Http\Controllers;

use App\Models\Manu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function view_menu(){
        $menu=Manu::all();
        $data=compact('menu');
        return  $data;
    }
}
