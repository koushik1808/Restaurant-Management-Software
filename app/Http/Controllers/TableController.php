<?php

namespace App\Http\Controllers;

use App\Models\BillingSkack;
use App\Models\Manu;
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
        $ab=$table->billing_status;
        $data1=compact('table');
        //return $data1;
        $billing_stack=BillingSkack::where("billing_no",'=',$ab)->get();
        $data2=compact('billing_stack');
        return view('bill.bill')->with($data1)->with($data2);
    }
    public function addMenu( Request $request){

        $table=Table::find($request->tableno);
        if($table->billing_status==0){
            $table->billing_status=$request['InvoiceNumbe'];
            $table->save();
        }
        $menu=Manu::where("Manu_code",'=',$request->input('menu_code'))->first();
        if($menu){
            $billing_stack= new BillingSkack();
            $billing_stack->billing_no=$request['InvoiceNumbe'];
            $billing_stack->manu_code=$menu->Manu_code;
            $billing_stack->manu=$menu->Manu_name;
            $billing_stack->price=$menu->Manu_price;
            $billing_stack->save();
        return redirect()->route('Admin.Billing',['id'=>$request->tableno]);
        }else{
            return back()->with('fall_code','This Menu code is wrong');
        } 
    }
    public function delete_menu($id){
        $user = BillingSkack::find($id);
        if(! is_null( $user)){
            $user->delete();
        }
        return back();
    }
    public function count_add($id){
        $billing_stack = BillingSkack::find($id);
        $billing_stack->count=$billing_stack->count+1;
        $billing_stack->save();
        return back();
    }
    public function count_sub($id){
        $billing_stack = BillingSkack::find($id);
        if( $billing_stack->count<=1){
            $billing_stack->delete();
        }else{
            $billing_stack->count=$billing_stack->count-1;
            $billing_stack->save();
        }
        return back();
    }
}
