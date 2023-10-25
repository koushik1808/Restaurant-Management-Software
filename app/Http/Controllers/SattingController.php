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
    public function discountUpdate($status){
        $discount = Discount::find(1);
        $discount->status = $status;
        $discount->save();
        return redirect()->route('Admin.setting_view');
    }

    public function gstUpdate($status){
        $gst = gst::find(1);
        $gst->status = $status;
        $gst->save();
        return redirect()->route('Admin.setting_view');
    }
}
