<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    //
    public function Dashbroad(){
        $table=Table::all();
        $data=compact('table');
        return view('admin.dashbroad')->with($data);
    }
    //
    public function Billing($id){
        $table=Table::find($id);
        $table->status='1';
        $table->save();
        return $table;
    }
}
