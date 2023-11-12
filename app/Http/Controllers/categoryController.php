<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Manu;
use Illuminate\Http\Request;


class categoryController extends Controller
{
    //
    public function add_category()
    {

        return view("catagory.addcatagory");
    }
    //
    public function view_category()
    {
        $category = category::all();
        $data = compact('category');
        return view("catagory.catagory")->with($data);
    }
    //
    public function added_category(Request $request){
        $category=new category();
        $category->category=$request['catagory'];
        $category->save();
        return redirect()->route('Admin.Dashbroad');
    }
    public function delete_category($id)
    {
        $category = category::find($id);
        $category->delete();
       
        return back();
    }
}