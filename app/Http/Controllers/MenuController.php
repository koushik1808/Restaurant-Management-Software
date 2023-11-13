<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Manu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function addNewMenu()
    {
        $category = category::all();
        $data = compact('category');
        return view('menus.addMenu')->with($data);
    }
    //
    public function view_menu()
    {
        $menu = Manu::all();
        $catagory = Manu::select('category')->distinct()->get();
        $cataData = compact('catagory');
        $data = compact('menu');
        return view('menus.menu', )->with($data)->with($cataData);
    }
    public function public_menu()
    {
        $menu = Manu::all();
        $catagory = Manu::select('category')->distinct()->get();
        $cataData = compact('catagory');
        $data = compact('menu');
        return view('publicMenu.menus', )->with($data)->with($cataData);
    }
    //
    public function public_menu_delete($id)
    {
        $menu = Manu::find($id);
        $menu->delete();
        return redirect()->route('Admin.public_menu');
    }
    //
    public function view_public_menu()
    {
        $menu = Manu::all();
        $catagory = Manu::select('category')->distinct()->get();
        $cataData = compact('catagory');
        $data = compact('menu');
        return view('publicMenu.publicView', )->with($data)->with($cataData);
    }
    //
    public function added_menu(Request $request)
    {
        $category = category::where("category", '=', $request->input('menu_category'))->first();
        $menu = new Manu();
        $menu->Manu_code = 0;
        $menu->Manu_name = $request['menu_name'];
        $menu->category = $request['menu_category'];
        $menu->category_id = $category->id;
        $menu->Manu_dis = $request['menu_dis'];
        $menu->Manu_price =  $request['menu_price'];
        $menu->save();
        return redirect()->route('Admin.Dashbroad');
    }
}