<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\DeliveryMan;
use App\Models\Product;
use App\Models\Shop;
use App\Models\ShopImage;
use App\Models\Shopkeeper;
use App\Models\Slider;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    //Admin Login
    public function AdminLogin(Request $request){
        if(!Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember'))){
            return response()->json([
                'status'=>false,

                'message'=>"Invalid Admin!"
            ],200);
        }else{
            $admin = Admin::where('email',$request->email)->first();
            return response()->json([
                'data'=>$admin,
                'status'=>true
            ],200);
        }

    }

    //category api
    public function Category(){
        $category = Category::where('status',1)->select('id','category_name','category_image')->get()->toArray();
        if (!empty($category)){
            return response()->json([
                'data'=>$category,
                'status'=>true
            ],200);

        }else{
            return response()->json([
                'status'=>false,
                'message'=>"Category Not Found"
            ],200);
        }
    }

    //sub category api
    public function SubCategory(){
        $subcategory = Subcategory::with('Category')->where('status',1)->select('id','category_id','sub_category_name','sub_category_image')->paginate(15);
        if (!empty($subcategory)){
            return response()->json([
                'data'=>$subcategory,
                'status'=>true
            ],200);

        }else{
            return response()->json([
                'status'=>false,
                'message'=>"Sub Category Not Found"
            ],200);
        }
    }


    //CategoryWiseSubcategory
    public function CategoryWiseSubcategory($category_id){
        $sub_category = Subcategory::where('category_id',$category_id)->get()->toArray();
        if (!empty($sub_category)){
            return response()->json([
                'data'=>$sub_category,
                'status'=>true
            ],200);

        }else{
            return response()->json([
                'status'=>false,
                'message'=>"Category Wise Sub Category Not Found"
            ],200);
        }
    }


    //slider api
    public function Slider($category_id){
        $slider = Slider::where('category_id',$category_id)->where('status',1)->select('id','category_id','slider')->get()->toArray();
        if (!empty($slider)){
            return response()->json([
                'data'=>$slider,
                'status'=>true
            ],200);

        }else{
            return response()->json([
                'status'=>false,
                'message'=>"Slider Not Found"
            ],200);
        }
    }

    public function CustomerLogin(Request $request){
         
         //check phone length or not
         if(!isset($request['phone']) < 11 || $request['phone'] > 11){        
                $error_message = "Phone Number Length 11 Digit!";
         }

          //check Phone exits or not
          if(isset($request['phone'])){
            $customer_phone = User::where('phone',$request['phone'])->count();
            if ($customer_phone > 0){
                $error_message = "Phone already exits!";
            }
        }

        if (isset($error_message) && !empty($error_message)){

            return response()->json([
                "status"=>false,
                "message"=>$error_message,
            ],200);
        }else{
                $customer = User::where('phone',$request['phone'])->first();
                $code = rand(0, 999999);
                $customer->code = $code;
                $customer->save();

                $to = $request['phone'];
                $token = "5fe395aac73568229b46318e68515658";
                $message = "Hello Sir,  SopanBD OTP Is: ".$code;

                $url = "http://api.greenweb.com.bd/api.php?json";


                $data= array(
                'to'=>"$to",
                'message'=>"$message",
                'token'=>"$token"
                ); // Add parameters in key value
                $ch = curl_init(); // Initialize cURL
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_ENCODING, '');
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $smsresult = curl_exec($ch);

                //Result

                if(isset($smsresult)){
                    return response()->json([
                        'status'=> true,
                        'message'=>"OTP Sent Successfully"
                    ],200);
                }else{
                    return response()->json([
                        'status'=>false,
                        'message'=>"Invalid OTP"
                    ],200);
                }
            }else{
                $customer = new User;
                $code = rand(0, 999999);

                $customer->phone = $request['phone'];
                $customer->code = $code;
                $customer->save();

                $to = $request['phone'];
                $token = "5fe395aac73568229b46318e68515658";
                $message = "Hello Sir,  SopanBD OTP Is: ".$code;

                $url = "http://api.greenweb.com.bd/api.php?json";


                $data= array(
                'to'=>"$to",
                'message'=>"$message",
                'token'=>"$token"
                ); // Add parameters in key value
                $ch = curl_init(); // Initialize cURL
                curl_setopt($ch, CURLOPT_URL,$url);
                curl_setopt($ch, CURLOPT_ENCODING, '');
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $smsresult = curl_exec($ch);

                //Result

                if(isset($smsresult)){
                    return response()->json([
                        'status'=> true,
                        'message'=>"OTP Sent Successfully"
                    ],200);
                }else{
                    return response()->json([
                        'status'=>false,
                        'message'=>"Invalid OTP"
                    ],200);
                }
            }


        }
    }

    //VerifyCode
    public function VerifyCode(Request $request){
        if(!empty($request['code'])){
            $user = User::where('code',$request['code'])->count();
            if($user > 0){
                $customers = User::where('code',$request['code'])->select('id','name','email','phone','image')->first();
                $customers->status = 1;
                $customers->save();
                return response()->json([
                    'status'=> true,
                    'data'=> $customers
                ],200);
            }else{
                return response()->json([
                    'status'=> false,
                    'message'=>"Invalid OTP"
                ],200);
            }
        }else{
            return response()->json([
                'status'=> false,
                'message'=>"Invalid OTP"
            ],200);
        }
    }


    //All Shop
    public function allShop(){
    $shops = Shop::where('shop_status',1)->select('id','shopkeeper_id','category_id','shop_name','shop_address','shop_description','banner','shop_phone','shop_status')->paginate(15);
    if(!@empty($shops)){
        return response()->json([
            'status'=> true,
            'shop' => $shops,
        ],200);
    }else{
        return response()->json([
            'status'=> false,
            'message' => 'No Shop Found!',
        ],200);
    }
}



     //shop info 
     public function shopInfo($id){
        

        $shop = Shop::with('category')->where('id',$id)->select('id','category_id','shop_name','shop_address','shop_description','banner','shop_phone','shop_status')->first();
           


        if (!empty($shop)){
            return response()->json([
                'data'=>$shop,
                'status'=>true
            ],200);

        }else{
            return response()->json([
                'status'=>false,
                'message'=>"Shop Not Found"
            ],200);
        }
    }


    //shop Slider info
    public function shopCoverImage($id){

        $shopCover = ShopImage::select('id','shop_slider')->where('shop_id',$id)->get();

        if (!empty($shopCover)){
            return response()->json([
                'data'=>$shopCover,
                'status'=>true
            ],200);

        }else{
            return response()->json([
                'status'=>false,
                'message'=>"Shop Slider Not Found!"
            ],200);
        }
    }





    //shop cover upload
    public function shopCover(Request $request, $id){
        if(!$request->hasFile('shop_slider')) {
            return response()->json([
                'status'=>false,
                'message'=>'upload_file_not_found',
        ],200);
        }
        $images = $request->file('shop_slider');

        foreach ($images as $img) {
            $imageName = uniqid().'.'.$img->extension();
            $directory = 'shopkeeper/images/shop/slider/';
            $img->move($directory, $imageName);
            $uplodPath = $directory.$imageName;

            $save = new ShopImage();
            $save->shop_id = $id;
            $save->shop_slider = $uplodPath;
            $save->save();
        }
        if($save){
            return response()->json([
                'status'=>true,
                'message' => 'file_uploaded',
            ], 200);
            }else{


                return response()->json([
                'status'=>false,
                'message' =>'invalid_file_format',

                ], 200);

            }


    }



     //Shop Update
     public function shopUpdate(Request $request, $id)
     {

        $shop = Shop::where('id',$id)->first(); 
        if($shop){
            if(!empty($request['shop_name'])){
                $shop->shop_name = $request->shop_name;
            }
    
            if(!empty($request['category_id'])){
                $shop->category_id = $request->category_id;
            }
    
    
            if(!empty($request['shop_address'])){
                $shop->shop_address = $request->shop_address;
            }
    
            if(!empty($request['shop_phone'])){
                if($request['phone'] < 11 || $request['phone'] > 11){
                    return response()->json([
                        'message'=>'Phone Number Length 11 Digits',
                        'status'=>false
        
                    ],200);
                }
                $shop->shop_phone = $request->shop_phone;
            }
    
            if(isset($request['banner'])){
                     unlink($shop->banner);
                     $banner = $request->file('banner');
                     $bannerName = uniqid().'.'.$banner->extension();
                     $directory2 = 'shopkeeper/images/shop/';
                     $banner->move($directory2, $bannerName);
                     $bannerUrl = $directory2.$bannerName;
    
                     $shop->banner = $bannerUrl;
            }
    
            if(!empty($request['shop_description'])){
                $shop->shop_description = $request->shop_description;
            }
    
            $shop->save();
    
            if(!@empty($shop)){
                return response()->json([
                    'message'=>'Shop Updated Successfully',
                    'status'=>true
    
                ],200);

            }else{
                return response()->json([
                    'message'=>'Invalid Request!',
                    'status'=>false
                ],200);
            }   
        }else{
            return response()->json([
                'message'=>'Shop Not Found!',
                'status'=>false
            ],200);
            }      

    }


        //Specific Shop Status
        public function shopStatus($id){
        
            $shop = Shop::where('id',$id)->select('id','shop_status','banner')->first();
               
            
            if (!empty($shop)){
                return response()->json([
                    'data'=>$shop,
                    'status'=>true
                ],200);
    
            }else{
                return response()->json([
                    'status'=>false,
                    'message'=>"Shop Not Found!"
                ],200);
            }
        }
    
    
    
         //Specific Shop Status Update
         public function shopStatusUpdate(Request $request,$id){
            
            $shop = Shop::where('id',$id)->first();
               
    
            if (!empty($shop)){
                $shop->shop_status = $request->shop_status;
                $shop->save();
                return response()->json([
                    'message' => 'Shop Status Updated Successfully',
                    'status'=>true
                ],200);
    
            }else{
                return response()->json([
                    'status'=>false,
                    'message'=>"Shop Not Found!"
                ],200);
            }
        }


    //AddProduct
    public function AddProduct(Request $request){

    if(empty($request['category_id'])){
        $error_message = "Please Add Category Name!";
    }

    if(empty($request['product_name'])){
        $error_message = "Please Add Product Name!";
    }

    if(empty($request['sub_category_id'])){
        $error_message = "Please Add Sub Category!";
    }

    if(!isset($request['product_image'])){
        $error_message = "Please Add Product Image!";
    }

    if(empty($request['short_des'])){
        $error_message = "Please Add Product Short Description!";
    }

    if(empty($request['long_des'])){
        $error_message = "Please Add Product Long Description!";
    }

    if(empty($request['price'])){
        $error_message = "Please Add Product Price!";
    }

    if(empty($request['shop_id'])){
        $error_message = "Please Add Shop Name!";
    }

     if (isset($error_message) && !empty($error_message)){
        return response()->json([
            "status"=>false,
            "message"=>$error_message,
        ],200);
    }
  
    else{
             //image insert
        if(!empty($request['product_image'])){
            $image = $request->file('product_image');
            $imageName = uniqid().'.'.$image->extension();
            $directory = 'category/images/product_image/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;
            }else{
                $imageUrl="";
            }

            // return $request->all();
            $product = new Product;
            $product->category_id = $request['category_id'];
            $product->sub_category_id = $request['sub_category_id'];
            $product->shop_id = $request['shop_id'];
            $product->product_name = $request['product_name'];
            if(isset($imageUrl)){
                $product->image = $imageUrl;
            }
            $product->short_des = $request['short_des'];
            $product->long_des = $request['long_des'];
            $product->price = $request['price'];
            if(!empty($request['discount'])){
                $product->discount = $request['discount'];
            }else{
                $product->discount = 0;
            }

            //discounted price calculate
            $discounted_price = $request['price'] - ($request['price']*$request['discount']/100);

            if(isset($discounted_price)){
                $product->discounted_price = $discounted_price;
            }else{
                $product->discounted_price = $request['price'];
            }
            $product->status = 1;
            $product->save();

            if($product){
                return response()->json([
                    'status'=> true,
                    'message'=>"Product Added Successfully"
                ],200);
            }else{
                return response()->json([
                    'status'=> false,
                    'message'=>"Product Not Added"
                ],200);
            }

        }
    }


     //Specific Product information
     public function productInfo($id){
        
        $product = Product::with('shop','category')->where('id',$id)->select('id','sub_category_id','category_id','shop_id','product_name','price','image','discount','discounted_price','short_des','long_des','status')->first();
           
     if (!empty($product)){
            return response()->json([
                'data'=>$product,
                'status'=>true
            ],200);

        }else{
            return response()->json([
                'status'=>false,
                'message'=>"Product Not Found!"
            ],200);
        }
    }
  
    //SubcategoryWiseProduct
    public function SubcategoryWiseProduct($sub_category_id){
        $subcategory_wise_product = Product::where('sub_category_id',$sub_category_id)->where('status',1)->select('id','category_id','sub_category_id','shop_id','product_name','image','price','discount','discounted_price','short_des','long_des')->paginate(15);
        if($subcategory_wise_product){
            return response()->json([
                'status'=> true,
                "data"=>$subcategory_wise_product
            ],200);
        }else{
            return response()->json([
                'status'=> false,
                'message'=>"Product Not Found"
            ],200);
        }
    }

    //ProductDetails
    public function ProductDetails(){
        $product_details = Product::latest()->select('id','category_id','sub_category_id','shop_id','product_name','image','price','discount','discounted_price','short_des','long_des')->where('status',1)->paginate(15);
        if($product_details){
            return response()->json([
                'status'=> true,
                "data"=>$product_details
            ],200);
        }else{
            return response()->json([
                'status'=> false,
                'message'=>"Product Not Found"
            ],200);
        }
    }

    //CategoryWiseProduct
    public function CategoryWiseProduct($category_id){
        $category_wise_products = Product::where('category_id',$category_id)->where('status',1)->select('id','category_id','sub_category_id','shop_id','product_name','image','price','discount','discounted_price','short_des','long_des')->paginate(15);
        if($category_wise_products){
            return response()->json([
                'status'=> true,
                "data"=>$category_wise_products
            ],200);
        }else{
            return response()->json([
                'status'=> false,
                'message'=>"Product Not Found"
            ],200);
        }
    }

    //ShopWiseProducts
    public function ShopWiseProducts($shop_id){
        $shop_wise_products = Product::where('shop_id',$shop_id)->where('status',1)->select('id','category_id','sub_category_id','shop_id','product_name','image','price','discount','discounted_price','short_des','long_des')->paginate(15);
        if($shop_wise_products){
            return response()->json([
                'status'=> true,
                "data"=>$shop_wise_products
            ],200);
        }else{
            return response()->json([
                'status'=> false,
                'message'=>"Product Not Found"
            ],200);
        }
    }

    //SearchProduct
    public function SearchProduct(Request $request){
        $search = Product::where('product_name', 'LIKE', "%{$request['search_product']}%")->select('id','category_id','sub_category_id','shop_id','product_name','image','price','discount','discounted_price','short_des','long_des')->where('status',1)->paginate(15);
        if($search){
            return response()->json([
                'status'=> true,
                "data"=>$search
            ],200);
        }else{
            return response()->json([
                'status'=> false,
                'message'=>"Product Not Found"
            ],200);
        }
    }

        


    //Specific Product Status
    public function productStatus($id){
        
        $product = Product::where('id',$id)->select('id','status','image')->first();
           

        if (!empty($product)){
            return response()->json([
                'data'=>$product,
                'status'=>true
            ],200);

        }else{
            return response()->json([
                'status'=>false,
                'message'=>"Product Not Found!"
            ],200);
        }
    }



     //Specific Product Status Update
     public function productStatusUpdate(Request $request,$id){
        
        $product = Product::where('id',$id)->first();
           

        if (!empty($product)){
            $product->status = $request->status;
            $product->save();
            return response()->json([
                'message' => 'Product Status Updated Successfully',
                'status'=>true
            ],200);

        }else{
            return response()->json([
                'status'=>false,
                'message'=>"Product Not Found!"
            ],200);
        }
    }



    //Specific Product Information Update
     public function productInfoUpdate(Request $request, $id)
     {

    $product = Product::where('id',$id)->first(); 
    
    if(!empty($request['category_id'])){
        $product->category_id = $request->category_id;
    }

    if(!empty($request['product_name'])){
        $product->product_name = $request->product_name;
    }

    if(!empty($request['price'])){
        $product->price = $request->price;
    }

    if(!empty($request['sub_category_id'])){
        $product->sub_category_id = $request->sub_category_id;
    }

    if(isset($request['product_image'])){
        unlink($product->image);
        $image = $request->file('product_image');
        $imageName = uniqid().'.'.$image->extension();
        $directory = 'category/images/product_image/';
        $image->move($directory, $imageName);
        $imageUrl = $directory.$imageName;
        $product->image = $imageUrl;
    }

    if(!empty($request['short_des'])){
        $product->short_des = $request->short_des;
    }

    if(!empty($request['long_des'])){
        $product->long_des = $request->long_des;
    }

    if(!empty($request['discount'])){
        $product->discount = $request->discount;
    }

    if(empty($request['discounted_price'])){
        $product->discounted_price = $request->discounted_price;
    }

    $product->save();

    if(!@empty($product)){
        return response()->json([
            'message'=>'Product Updated Successfully',
            'status'=>true

        ],200);
    }else{
        return response()->json([
            'message'=>'Invalid Request!',
            'status'=>false
        ],200);
        }   
    }
   

     //Delivery Man Login
     public function deliveryManLogin(Request $request){
        $delMan = DeliveryMan::where('phone',$request['phone'])->first();
        if(@empty($delMan)){
            return response()->json([
                   'status'=>false,
                   'message'=>'Delivery man not found!'
               ],200);
       }
        $pass = Hash::check($request['password'], $delMan['password']);
        if(@empty($request->phone) || @empty($request->password)){

                return response()->json([
                    'status'=>false,
                    'message'=>'Fill All the field!'
                ],200);

        }else{
            if(!$pass){
                return response()->json([
                    'status'=>false,
                    'message'=>'Invalid Password!'
                ],200);
            }
            $deliveryMan = DeliveryMan::where('phone',$request['phone'])->select('id','name','phone','image','document_image','document_no','address','status')->first();
            if($deliveryMan){
                if($deliveryMan->status == 0){
                    return response()->json([
                        'message'=> 'You are currently invalid! Please contact with admin',
                        'status'=>false
                    ],200);
                }else{
                    return response()->json([
                        'data'=>$deliveryMan,
                        'status'=>true
                    ],200);
                }
            }else{
                return response()->json([
                    'status'=>false,
                    'message'=>'Invalid Delivery Man!'
                ],200);
            }
            
            
        }

    }


    //Delivery Man Image View
    public function deliveryManImage($id){
        $deliveryMan = DeliveryMan::where('id',$id)->select('image')->first();
        if($deliveryMan){
            return response()->json([
                'data'=> $deliveryMan,
                'status'=>true
            ],200);
        }else{
            return response()->json([
                'message'=>'Delivery Man Not Found!',
                'status'=>false
            ],200);
        }

    }


     //Delivery Man Image Update
     public function deliveryManImageUpdate(Request $request,$id){
        $deliveryMan = DeliveryMan::where('id',$id)->first();
        if($deliveryMan){
            if(!@empty($request->image)){

                unlink( $deliveryMan->image);
                $image = $request->file('image');
                $imageName = uniqid().'.'.$image->extension();
                $directory = 'delivery/images/deliveryman/';
                $image->move($directory, $imageName);
                $imageUrl = $directory.$imageName;
                
                $deliveryMan->image = $imageUrl;

                $deliveryMan->save();
                if($deliveryMan){
                    return response()->json([
                        'message'=> 'Profile Image Uploaded Successfully',
                        'status'=>true
                    ],200);
                }else{
                    return response()->json([
                        'message'=> 'Unable to upload profile image!',
                        'status'=>true
                    ],200);
                }
                
            }else{
                return response()->json([
                    'message'=> 'Image Required!',
                    'status'=>true
                ],200);
            } 
        }else{
            return response()->json([
                'message'=>'Delivery Man Not Found!',
                'status'=>false
            ],200);
        }

    }


     //Delivery Man Information View
     public function deliveryManInfo($id){
        $deliveryMan = DeliveryMan::where('id',$id)->select('id','name','image','phone','document_image','document_no','address')->first();
       
        if($deliveryMan){
            return response()->json([
                'data'=> $deliveryMan,
                'status'=>true
            ],200);
        }else{
            return response()->json([
                'message'=>'Delivery Man Not Found!',
                'status'=>false
            ],200);
        }

    }



//Delivery Man Information Update
        public function deliveryManInfoUpdate(Request $request,$id){
            $deliveryMan = DeliveryMan::where('id',$id)->first();
            if($deliveryMan){

                if(!empty($request['name'])){
                    $deliveryMan->name = $request->name;  
                }
            
                if(!empty($request['address'])){
                    $deliveryMan->address = $request->address;  
                }
            
                if(!empty($request['phone'])){
                    if($request['phone'] < 11 || $request['phone'] > 11 ){
                        return response()->json([
                            "status"=>false,
                            "message"=>'Phone Length 11 Digits!',
                        ],200);
                    }else{
                        $deliveryMan->phone = $request->phone; 
                    }
                }

                if($request->document_image){
                    if($deliveryMan->document_image){
                        unlink($deliveryMan->document_image);
                    } 
                    $docImage = $request->file('document_image');
                     $docImageName = uniqid().'.'.$docImage->extension();
                     $directory = 'delivery/images/documents/';
                     $docImage->move($directory, $docImageName);
                     $docImageUrl = $directory.$docImageName;

                     $deliveryMan->document_image = $docImageUrl;
                }
                                       
                $deliveryMan->save();
                if($deliveryMan){
                return response()->json([
                    'message'=>'Delivery Man Updated Successfully',
                    'status'=>true

                ],200);
                }else{
                    return response()->json([
                        'message'=>'Invalid Request!',
                        'status'=>false
                    ],200);
                }            
            }else{
                return response()->json([
                    'message'=>'Delivery Man Not Found!',
                    'status'=>false
                ],200);
            } 
        }

        //Delivery Man Password Change 
        public function deliveryManChangePassword(Request $request,$id){
           
            $password = $request->password;
            if($password < 8){
                return response()->json([
                    'message'=>'Password length : minimum 8',
                    'status'=>false
                ],200);
            }else{
                $delMan = DeliveryMan::where('id',$id)->first();
                if($delMan){
                    $delMan->password = Hash::make($password);
                    $delMan->save();

                    if($delMan){
                        return response()->json([
                            'message'=>'Password Changed Successfully',
                            'status'=>true
    
                        ],200);
                    }else{
                        return response()->json([
                            'message'=>'Invalid Request!',
                            'status'=>false
                        ],200);
                    } 
                }else{
                    return response()->json([
                        'message'=>'Delivery Man Not Found!',
                        'status'=>false
                    ],200);
                } 
                

            }
        }

}