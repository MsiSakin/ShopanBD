<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Shop;
use App\Models\Shopkeeper;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShopkeeperController extends Controller
{
    //Shopkeeper Request
    public function vendorList(){
        $shopkeepers = Shopkeeper::where('status','0')->latest()->get();
        return view('shopkeeper.vendor_list',compact('shopkeepers'));
    }

     //Shopkeeper Request
     public function vendorDetails(){

        $shops = Shop::with('shopkeepers')->get();
        return view('shopkeeper.vendor_details',compact('shops'));
    }


    //Update Shopkeeper Percentage
    public function updatePercent(Request $request, $id){

        $shopkeeper = Shopkeeper::findorfail($id);
        $shopkeeper->percentage = $request['percentage_value'];
        $shopkeeper->varified_at = Carbon::now();
        $shopkeeper->save();

        return redirect()->back()->with('message','Percentage Updated Successfully');

    }

    //Destroy Shokeeper
    // public function destroy($id){
    //     $shopkeepers = Shopkeeper::findOrFail($id);
    //     $shopkeepers->delete();
    //     return redirect()->back()->with('message','Shopkeepers Deleted Successfully');
    // }

    //status-active
    public function StatusActive(Request $request,$id){

        $shop= Shop::where('shopkeeper_id',$id)->first();
        $shop->shop_status = 1;
        $shop->save();
        $shopkeepers = Shopkeeper::findOrFail($id);
        // return $shopkeepers;
        $shopkeepers->status = 1;
        $shopkeepers->varified_at = Carbon::now();
        $shopkeepers->save();
        return redirect()->back()->with('message','Shopkeepers Activated Successfully');

    }

    //status-inactive
    public function StatusInactive(Request $request,$id){

        $shop= Shop::where('shopkeeper_id',$id)->first();
        $shop->shop_status = 0;
        $shop->save();
        $shopkeepers = Shopkeeper::findOrFail($id);
        // return $shopkeepers;
        $shopkeepers->status = 0;
        $shopkeepers->varified_at = Carbon::now();
        $shopkeepers->save();
        return redirect()->back()->with('message','Shopkeepers Inactivated Successfully');

    }

    public function viewShop(Request $request,$id){

        $shop = Shop::with('category','shop_image')->findOrfail($id);

       return response()->json([
        'shop' =>$shop,
       ],200);
    }
}
