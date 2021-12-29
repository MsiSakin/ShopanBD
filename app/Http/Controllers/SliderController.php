<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function sliderList(){
        $slider = Slider::with('Category')->latest()->get()->toArray();
        return view('slider.slider_list',compact('slider'));
    }

    //addSlider
    public function addSlider(){
        $category = Category::where('status',1)->get()->toArray();
        return view('slider.AddSlider',compact('category'));
    }

    //storeSlider
    public function storeSlider(Request $request){
        if ($request->hasFile('slider_image')){
            $images = $request->file('slider_image');
            foreach ($images as $key => $image){
                $slider = new Slider;
                $imageName = uniqid().'.'.$image->extension();
                $directory = 'category/images/slider_image/';
                $image->move($directory, $imageName);
                $imageUrl = $directory.$imageName;

                //save
                $slider->category_id = $request['category_id'];
                $slider->slider = $imageUrl;
                $slider->status = 1;
                $slider->save();
            }
            return redirect()->back()->with('message','Slider Created Successfully');
        }
    }

    //category status
    public function sliderStatus(Request $request){



        $data = $request->all();

        if($data['status'] == "Active"){
           $status = 0;
        }else{
           $status =1;
        }

        Slider::where('id',$data['slider_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'slider_id'=>$data['slider_id']]);

    }

    //catetgory edit
    public function sliderEdit($id){
        $slider = Slider::findOrFail($id);
        $category = Category::where('status',1)->get()->toArray();
        return view('slider.EditSlider',compact('slider','category'));
    }

    //update slider
    public function updateSlider(Request $request,$id){

        if(isset($request['slider_image'])){
            //image insert
                $image = $request->file('slider_image');
                $imageName = uniqid().'.'.$image->extension();
                $directory = 'category/images/slider_image/';
                $image->move($directory, $imageName);
                $imageUrl = $directory.$imageName;
        }


        $slider = Slider::findOrFail($id);

        unlink($slider->slider);

        $slider->slider = $request['slider_image'];
        $slider->category_id = $request['category_id'];
        if(isset($imageUrl)){
            $slider->slider = $imageUrl;
        }
        $slider->save();



        return redirect()->back()->with('message',"Slider Updated Successfully");
    }
}
