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
}