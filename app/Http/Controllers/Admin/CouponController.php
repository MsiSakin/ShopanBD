<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Coupon;
use App\Models\SetLocation;
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

    //set location
    public function SetLocation(){
        return view('location.area_detils');
    }

    //AddLocation
    public function AddLocation(){
        $areas = Area::latest()->get()->toArray();
        return view('location.setLocation',compact('areas'));
    }

    //AddArea
    public function AddArea(){
        return view('location.add_area');
    }

    //StoreArea
    public function StoreArea(Request $request){
        $area = new Area;
        $area->area_name = $request['area_name'];
        $area->save();
        return redirect()->back()->with('message',"Area Added Successfully");
    }

    //StoreLocation
    public function StoreLocation(Request $request){
        $location = new SetLocation;
        $location->area_id = $request['area_id'];
        $location->sub_area_name = $request['sub_area_name'];
        $location->delivery_charge = $request['delivery_charge'];
        $location->save();
        return redirect()->back()->with('message',"Sub Area Added Successfully");
    }

}
