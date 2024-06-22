<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Manu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        if(Session::get('LoginRoll') =='1'){
            $category = category::where("user", '=', "Admin")->get();
        }else{
            $category = category::where("user", '=', Session::get('LoginName'))->get();
        }
        $data = compact('category');
        return view("catagory.catagory")->with($data);
    }
    //
    public function added_category(Request $request){
        $category=new category();
        if(Session::get('LoginRoll') !='1'){
            $category->user = Session::get('LoginName');
        }
        $category->category=$request['catagory'];
        $category->save();
        if(Session::get('LoginRoll') =='1'){
            return redirect()->route('Admin.Dashbroad');
        }else{
            return redirect()->route('User.Dashbroad');
        }

        
    }
    public function delete_category($id)
    {
        $category = category::find($id);
        $category->delete();
       
        return back();
    }
}