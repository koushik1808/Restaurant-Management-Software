<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\gst;
use Illuminate\Http\Request;

class SattingController extends Controller
{
    //
    public function setting_view()
    {
        $gst = gst::all();
        $discount = Discount::all();
        $data=compact('gst','discount');
        return view('settings.setting')->with($data);
    }
    public function discountUpdate(Request $request){
        $discount = Discount::find(1);
        $discount->status = 1;
        $discount->discount = $request['dis'];
        $discount->save();
        return redirect()->route('Admin.setting_view');
    }

    public function gstUpdate(Request $request){
        $gst = gst::find(1);
        $gst->status = 1;
        $gst->gst = $request['gst'];
        $gst->gst_no = $request['gstno'];
        $gst->save();
        return redirect()->route('Admin.setting_view');
    }

    public function discountUpdate1(){
        $discount = Discount::find(1);
        $discount->status = 0;
        $discount->save();
        return redirect()->route('Admin.setting_view');
    }

    public function gstUpdate1(){
        $gst = gst::find(1);
        $gst->status =0;
        $gst->save();
        return redirect()->route('Admin.setting_view');
    }
}
