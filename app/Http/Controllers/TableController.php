<?php

namespace App\Http\Controllers;

use App\Models\BillingSkack;
use App\Models\Manu;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    //
    public function Dashbroad()
    {
        $table = Table::all();
        $data = compact('table');
        return view('admin.dashbroad')->with($data);
    }
    //
    public function Billing($id)
    {
        $table = Table::find($id);
        $ab = $table->billing_status;
        $data1 = compact('table');
        //return $data1;
        $billing_stack = BillingSkack::where("billing_no", '=', $ab)->get();
        $data2 = compact('billing_stack');
        return view('bill.bill')->with($data1)->with($data2);
    }
    //
    public function Billing2($id)
    {
        $menu = Manu::all();
        $catagory = Manu::select('category')->distinct()->get();
        $cataData = compact('catagory');
        $data = compact('menu');

        $table = Table::find($id);
        $ab = $table->billing_status;
        $data1 = compact('table');

        $billing_stack = BillingSkack::where("billing_no", '=', $ab)->get();
        $data2 = compact('billing_stack');
        $stackCount = BillingSkack::where("billing_no", '=', $ab)->get()->count();

        return view('menus.menu')->with($data1)->with($data2)->with($data)->with($cataData)->with(compact('stackCount'))->with('c',1);
    }
    //
    public function addMenu2(Request $request)
    {
        $bill_no = rand(1000000, 9999999);

        $table = Table::find($request->tableno);
        if ($table->billing_status == 0) {
            $table->status = '1';
            $table->billing_status = $bill_no;
            $table->save();
        }
        $menu = Manu::find($request->menuid);
        if ($menu) {
            $billing_stack = new BillingSkack();
            $billing_stack->billing_no = $table->billing_status;
            $billing_stack->manu_code = $menu->Manu_code;
            $billing_stack->manu = $menu->Manu_name;
            $billing_stack->price = $menu->Manu_price;
            $billing_stack->save();
            return redirect()->route('Admin.Billing2', ['id' => $request->tableno]);
        } else {
            return back()->with('fall_code', 'This Menu code is wrong');
        }
    }
    public function Billing_print($id)
    {
        $table = Table::find($id);
        $data1 = $table->billing_status;
        $data3 = compact('table');
        $billing_stack = BillingSkack::where("billing_no", '=', $table->billing_status)->get();
        $data2 = compact('billing_stack');
        $table->status = '0';
        $table->billing_status = '0';
        $table->save();
        return view('invoice.invoice')->with($data2)->with('bill', $data1)->with($data3);
    }
    public function addMenu(Request $request)
    {

        $table = Table::find($request->tableno);
        if ($table->billing_status == 0) {
            $table->status = '1';
            $table->billing_status = $request['InvoiceNumbe'];
            $table->save();
        }
        $menu = Manu::where("Manu_code", '=', $request->input('menu_code'))->first();
        if ($menu) {
            $billing_stack = new BillingSkack();
            $billing_stack->billing_no = $request['InvoiceNumbe'];
            $billing_stack->manu_code = $menu->Manu_code;
            $billing_stack->manu = $menu->Manu_name;
            $billing_stack->price = $menu->Manu_price;
            $billing_stack->save();
            return redirect()->route('Admin.Billing', ['id' => $request->tableno]);
        } else {
            return back()->with('fall_code', 'This Menu code is wrong');
        }
    }
    public function delete_menu($id)
    {
        $user = BillingSkack::find($id);
        $ab = $user->billing_no;
        if (!is_null($user)) {
            $user->delete();
        }
        $billing_stack = BillingSkack::where("billing_no", '=', $ab)->get();
        $cout = $billing_stack->count();
        if ($cout == 0) {
            $table = Table::where("billing_status", '=', $ab)->first();
            $id = $table->id;
            $table = Table::find($id);
            $table->status = '0';
            $table->billing_status = '0';
            $table->save();
        }
        return back();
    }
    public function count_add($id)
    {
        $billing_stack = BillingSkack::find($id);
        $billing_stack->count = $billing_stack->count + 1;
        $billing_stack->save();
        return back();
    }
    public function count_sub($id)
    {
        $billing_stack = BillingSkack::find($id);
        $ab = $billing_stack->billing_no;
        if ($billing_stack->count <= 1) {
            $billing_stack->delete();
        } else {
            $billing_stack->count = $billing_stack->count - 1;
            $billing_stack->save();
        }
        $billing_stack = BillingSkack::where("billing_no", '=', $ab)->get();
        $cout = $billing_stack->count();
        if ($cout == 0) {
            $table = Table::where("billing_status", '=', $ab)->first();
            $id = $table->id;
            $table = Table::find($id);
            $table->status = '0';
            $table->billing_status = '0';
            $table->save();
        }
        return back();
    }
    //
    public function Kitchen($id){
        $table = Table::find($id);
        $data1 = compact('table');
        $billing_stack = BillingSkack::where("billing_no", '=', $table->billing_status)->where("status", '=','0')->get();
        foreach($billing_stack as $billing_stack1){
            $billing_stack1->status ='1';
            $billing_stack1->save();
        }
        $data2 = compact('billing_stack');
        return view('invoice.kitchenInvoice')->with($data2)->with( $data1);
    }

     //
     public function search_menu(Request $request)
     {
         $menu = Manu::where("Manu_name", 'like','%'.$request->input('menu_name').'%')->get();
         $catagory = Manu::select('category')->distinct()->get();
         $cataData = compact('catagory');
         $data = compact('menu');
 
         $table = Table::find($request->tableno);
         $ab = $table->billing_status;
         $data1 = compact('table');
 
         $billing_stack = BillingSkack::where("billing_no", '=', $ab)->get();
         $data2 = compact('billing_stack');
         $stackCount = BillingSkack::where("billing_no", '=', $ab)->get()->count();
 
         return view('menus.menu')->with($data1)->with($data2)->with($data)->with($cataData)->with(compact('stackCount'))->with('c',0);
     }
}