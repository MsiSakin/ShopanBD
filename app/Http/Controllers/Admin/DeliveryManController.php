<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryMan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeliveryManController extends Controller
{
    public function addDeliveryMan(){
        return view('deliveryMan.addDeliveryMan');
    }
 
    public function storeDeliveryMan(Request $request){
      

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'phone' => 'required|min:11|unique:delivery_men,phone',
            'image' => 'required',
            'address' => 'required',
        ]);
       
       

        // return $request->phone;
        $image = $request->file('image');
        
        $imageName = uniqid().'.'.$image->extension();
        $directory = 'delivery/images/deliveryman/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;

        $image2 = $request->file('docimage');
        $imageName2 = uniqid().'.'.$image2->extension();
        $directory2 = 'delivery/images/documents/';
        $image2->move($directory2, $imageName2);
        $imageUrl2 = $directory2.$imageName2;



         $deliveryMan = new DeliveryMan ;
         $deliveryMan->name = $request->name;
         $deliveryMan->phone = $request->phone;
         $deliveryMan->address = $request->address;
         $deliveryMan->image = $imageUrl;
         $deliveryMan->document_image = $imageUrl2;
         $deliveryMan->document_no = $request->idnumber;
         $deliveryMan->status = 1;
         $deliveryMan->varified_at = Carbon::now();
         $deliveryMan->save();

         return redirect()->back();


    }

    public function deliveryManList(){
        $deliveryMans = DeliveryMan::get();
        return view('deliveryMan.deliveryManList',compact('deliveryMans'));
    }


     //status-inactive
     public function StatusInactive(Request $request,$id){
        $shopkeepers = DeliveryMan::findOrFail($id);
        // return $shopkeepers;
        $shopkeepers->status = 0;
        $shopkeepers->varified_at = Carbon::now();
        $shopkeepers->save();
        return redirect()->back()->with('message','Delivery Man Inactivated Successfully');
        
    }

     //status-active
     public function StatusActive(Request $request,$id){
        $shopkeepers = DeliveryMan::findOrFail($id);
        // return $shopkeepers;
        $shopkeepers->status = 1;
        $shopkeepers->varified_at = Carbon::now();
        $shopkeepers->save();
        return redirect()->back()->with('message','Delivery Man Activated Successfully');
        
    }
}
