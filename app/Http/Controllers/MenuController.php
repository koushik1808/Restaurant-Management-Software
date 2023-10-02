<?php

namespace App\Http\Controllers;

use App\Models\Manu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function view_menu(){
        $menu=Manu::all();
        $catagory= Manu::select('category')->distinct()->get();
        $cataData=compact('catagory');
        $data=compact('menu');
        return view('menus.menu',)->with($data)->with($cataData);
    }
}
