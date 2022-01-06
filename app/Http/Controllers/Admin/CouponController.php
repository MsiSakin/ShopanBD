<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function CouponDetails(){
        $coupon = Coupon::latest()->get()->toArray();
        return view('coupon.coupon_details',compact('coupon'));
    }

    //CouponAdd
    public function CouponAdd(){
        return view('coupon.add_coupon');
    }

    //CouponStore
    public function CouponStore(Request $request){
        $coupon = new Coupon;
        $coupon->coupon_name = $request['coupon_name'];
        $coupon->discount = $request['discount'];
        $coupon->validity = $request['validity'];
        $coupon->save();
        return redirect('/admin/coupon-details')->with('success',"Coupon Created Successfully");
    }

     //Coupon status
     public function couponStatus(Request $request){



        $data = $request->all();

        if($data['status'] == "Active"){
           $status = 0;
        }else{
           $status =1;
        }

        Coupon::where('id',$data['coupon_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'coupon_id'=>$data['coupon_id']]);

}
}
