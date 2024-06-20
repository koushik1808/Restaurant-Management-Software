<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\BillingSkack;
use App\Models\Manu;
use App\Models\Table;
use App\Models\Discount;
use App\Models\gst;
use App\Models\user;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Session;

class TableController extends Controller
{
    //
    public function Dashbroad()
    {
        $table = Table::where("user", '=', 'Admin')->get();
        $data = compact('table');
        return view('admin.dashbroad')->with($data);
    }
    //
    public function User_Dashbroad()
    {
        $table = Table::where("user", '=', Session::get('LoginName'))->get();
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
    public function User_Billing($id)
    {
        if(Session::get('LoginRoll') =='1'){
            $menu = Manu::where("user", '=', "Admin")->get();
            $catagory = Manu::select('category')->where("user", '=', "Admin")->distinct()->get();
        }else{
            $menu = Manu::where("user", '=', Session::get('LoginName'))->get();
            $catagory = Manu::select('category')->where("user", '=', Session::get('LoginName'))->distinct()->get();

        }
        $cataData = compact('catagory');
        $data = compact('menu');

        $table = Table::where("table","=","0")->where("user", '=', Session::get('LoginName'))->first();
        $ab = $table->billing_status;
        $data1 = compact('table');

        $billing_stack = BillingSkack::where("billing_no", '=', $ab)->get();
        $data2 = compact('billing_stack');
        $stackCount = BillingSkack::where("billing_no", '=', $ab)->get()->count();

        return view('menus.menu')->with($data1)->with($data2)->with($data)->with($cataData)->with(compact('stackCount'))->with('c',1);
    }

    //
    public function Billing2($id)
    {
        if(Session::get('LoginRoll') =='1'){
            $menu = Manu::where("user", '=', "Admin")->get();
            $catagory = Manu::select('category')->where("user", '=', "Admin")->distinct()->get();
        }else{
            $menu = Manu::where("user", '=', Session::get('LoginName'))->get();
            $catagory = Manu::select('category')->where("user", '=', Session::get('LoginName'))->distinct()->get();

        }
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
            return redirect()->route('Admin.Billing2', ['id' => $table->id]);
        } else {
            return back()->with('fall_code', 'This Menu code is wrong');
        }
    }
    //
    public function Billing_print($id)
    {
        if(Session::get('LoginRoll') =='1'){
            $discount = Discount::where("user","=","Admin")->get();
            $gst = gst::where("user","=","Admin")->get();
            $user_data=0;
        }else{
            $discount = Discount::where("user","=",Session::get('LoginName'))->first();
            $gst = gst::where("user","=",Session::get('LoginName'))->first();
            $user = user::where("user_name", '=', Session::get('LoginName'))->get();
            $user_data = compact('user');

        }
        $data5=compact('discount');
        $data6=compact('gst');
        $date=new DateTime();
        $table = Table::find($id);
        $data1 = $table->billing_status;
        $data3 = compact('table');
        $count=BillingSkack::where("billing_no", '=',$table->billing_status)->get()->count();
        $billing_stack = BillingSkack::where("billing_no", '=', $table->billing_status)->get();
        $total=0;
        foreach($billing_stack as $billing_stack1){
            $total= $total+$billing_stack1->price*$billing_stack1->count ;
        }
        $data2 = compact('billing_stack');
        return view('invoice.invoice2')->with($data2)->with('bill', $data1)->with($data3)->with($user_data)->with($data6)->with($data5)->with('date', $date->format('y-m-d'));
    }
    //
    public function Billing_print2($id)
    {
        if(Session::get('LoginRoll') =='1'){
            $discount = Discount::where("user","=","Admin")->first();
            $gst = gst::where("user","=","Admin")->first();
            $user_data=0;
        }else{
            $discount = Discount::where("user","=",Session::get('LoginName'))->first();
            $gst = gst::where("user","=",Session::get('LoginName'))->first();
            $user = user::where("user_name", '=', Session::get('LoginName'))->get();
            $user_data = compact('user');

        }

        if(Session::get('LoginRoll') =='1'){
            $discount1 = Discount::where("user","=","Admin")->where("status","=","1")->first();
            $gst1 = gst::where("user","=","Admin")->where("status","=","1")->first();
        }else{
            $discount1 = Discount::where("user","=",Session::get('LoginName'))->where("status","=","1")->first();
            $gst1 = gst::where("user","=",Session::get('LoginName'))->where("status","=","1")->first();
        }

        $data5=compact('discount','gst');
        $date=new DateTime();
        $table = Table::find($id);
        $data1 = $table->billing_status;
        $data3 = compact('table');
        $count=BillingSkack::where("billing_no", '=',$table->billing_status)->get()->count();
        $billing_stack = BillingSkack::where("billing_no", '=', $table->billing_status)->get();
        $total=0;
        foreach($billing_stack as $billing_stack1){
            $total= $total+$billing_stack1->price*$billing_stack1->count ;
        }
        $data2 = compact('billing_stack');
        $billing=new Billing();
        $billing->bill_no=$table->billing_status;
        $billing->total_manu=$count;
        $billing->total=$total;
        if( is_null($gst1)){
            $billing->gst_no=0;
        }else{
            $billing->gst_no=$gst->gst;
        }
        if( is_null($discount1)){
            $billing->dis=0;
        }else{
            $billing->dis=$discount->discount;
        }

        $billing->name=$table->name;
        if(Session::get('LoginRoll') !='1'){
            $billing->user=Session::get('LoginName');
        }
        $billing->number=$table->number;
        $billing->ad=$table->ad;
        $billing->save();
        $billing = Billing::where("bill_no", '=', $table->billing_status)->first();
        $table->status = '0';
        $table->billing_status = '0';
        $table->name = '0';
        $table->number = '0';
        $table->ad = '0';
        $table->save();

        $data4 = compact('billing');
        return view('invoice.invoice')->with($data2)->with('bill', $data1)->with($user_data)->with($data3)->with($data5)->with($data4)->with('date', $date->format('y-m-d'));
    }
    //
    public function cancelBilling($id)
    {
        $table = Table::find($id);
        $table->status = '0';
        $table->billing_status = '0';
        $table->name = '0';
        $table->number = '0';
        $table->ad = '0';
        $table->save();
        if(Session::get('LoginRoll') =='1'){
            return redirect()->route('Admin.Dashbroad');
        }else{
            return redirect()->route('User.Dashbroad');
        }
    }
    //
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
    //
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
            $table->name = '0';
            $table->number = '0';
            $table->ad = '0';
            $table->save();
        }
        return back();
    }

    //
    public function count_add($id)
    {
        $billing_stack = BillingSkack::find($id);
        $billing_stack->count = $billing_stack->count + 1;
        if($billing_stack->status){
            $billing_stack->status ='0';
            $billing_stack->kot = 1;
        }else{
            $billing_stack->kot =$billing_stack->kot + 1;
        }
        $billing_stack->save();
        return back();
    }
    //
    public function count_add_item(Request $request)
    {
       
        $billing_stack = BillingSkack::find($request->id);
        $billing_stack->count = $request->count;
        if($billing_stack->status){
            $billing_stack->status ='0';
            $billing_stack->kot = $request->count;
        }else{
            $billing_stack->kot = $request->count;
        }
        $billing_stack->save();
        return back();
    }
    //
    public function count_sub($id)
    {
        $billing_stack = BillingSkack::find($id);
        $ab = $billing_stack->billing_no;
        if ($billing_stack->count <= 1) {
            $billing_stack->delete();
        } else {
            $billing_stack->kot =$billing_stack->kot + -1;
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
            $table->name = '0';
            $table->number = '0';
            $table->ad = '0';
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
        $user = user::where("user_name", '=', Session::get('LoginName'))->get();
        $user_data = compact('user');
        $data2 = compact('billing_stack');
        return view('invoice.kitchenInvoice')->with($data2)->with($user_data)->with( $data1);
    }
    //
    public function search_menu(Request $request){
            $menu = Manu::where("Manu_name", 'like','%'.$request->input('menu_name').'%')->where("user", '=', Session::get('LoginName'))->get();
            $catagory = Manu::select('category')->where("user", '=', Session::get('LoginName'))->distinct()->get();
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
    //
    public function todeyreport(){
        $date=new DateTime();
        $billing=Billing::where("created_at", 'like','%'.$date->format('y-m-d').'%')->where("user", '=', Session::get('LoginName'))->get();
        $data=compact('billing');
        return view('invoice.report')->with($data)->with('c',0)->with('b',1);
    }
    //
    public function monthreport(){
        $date=new DateTime();
        $billing=Billing::whereBetween("created_at", [Carbon::now()->subMonth(2)->startOfMonth(),Carbon::now()->subMonth(1)->endOfMonth()])->where("user", '=', Session::get('LoginName'))->get();
        $data=compact('billing');
        return view('invoice.report')->with($data)->with('c',0)->with('b',1);
    }
     //
     public function customreport(){
        $date=new DateTime();
        $billing=Billing::where("user", '=', Session::get('LoginName'));
        $data=compact('billing');
        return view('invoice.report')->with($data)->with('c',1)->with('b',0);
    }
     //
     public function customdate(Request $request){
        $billing=Billing::whereBetween("created_at",[$request->input('FromDate'),$request->input('ToDate')])->where("user", '=', Session::get('LoginName'))->get();
        $data=compact('billing');
        return view('invoice.report')->with($data)->with('c',1)->with('b',1);
    }
    //
    public function MenuRepoet($id){
        $discount = Discount::find(1);
        $gst = gst::find(1);
        $data5=compact('discount','gst');
        $date=new DateTime();
        $table = Table::find(0);
        $data1 = $id;
        $data3 = compact('table');
        $billing_stack = BillingSkack::where("billing_no", '=',$id)->get();
        $data2=compact('billing_stack');
        $billing = Billing::where("bill_no", '=', $id)->first();
        $data4 = compact('billing');
        return view('invoice.invoice')->with($data2)->with('bill', $data1)->with($data3)->with($data5)->with($data4)->with('date', $date->format('y-m-d'));
    }
    //
    public function Add_Client(Request $request){
        $table = Table::find($request->tableno);
        $table->name = $request['ClientName'];
        $table->number = $request['ClientPhone'];
        $table->ad = $request['ClientAddress'];
        $table->save();
        return redirect()->route('Admin.Billing2', ['id' => $request->tableno]);
    }

    public function Add_table(){
        $count=Table::where("user", '=', Session::get('LoginName'))->get()->count();
        $table = new Table();
        $table->table=$count+1;
        if(Session::get('LoginRoll') !='1'){
            $table->user = Session::get('LoginName');
        }
        $table->save();
        return redirect()->route('User.Dashbroad');
    }
}
