<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Product;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 
use Session;

class VendorController extends Controller
{
    public function vendorRegister()
    {
        return view('frontend.vendor.auth.register');
    }
    public function vendorRegistration(Request $request)
    {
        
        if($request->file('logo')){
            $name= time().'.'.$request->logo->extension();
            $request->logo->move(public_path('/avatar/'), $name);
        } 

        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->phone= $request->phone;
        $vendor->address = $request->address;
        $vendor->logo= $name;
        $vendor->password = bcrypt($request->password);
        $vendor->save();
        return redirect()->back()->with('success','you are registration has been successful');
    }
    
    public function vendorLog()
    {
        return view('frontend.vendor.auth.login');
    }
    public function vendorLoging(Request $request)
    {
          $vendor = Vendor::where('email',$request->email)->where('is_approved',1)->first();
          if(!$vendor){
            return redirect()->back()->with('error','you are not has been successful');
          }
          else{
            if(password_verify($request->password, $vendor->password)){
                 
                Session::put('vendorId', $vendor->id);
                Session::put('vendorName', $vendor->name);
                

                return redirect('/vendor/dashboard');
            }
            else{
                return redirect()->back()->with('error','password not matching');
            }
          }
    }
    public function vendorDashboard()
    {
         $products = Product::with('category','color','size')->where('vendor_id',session()->get('vendorId'))->get();
        return view('frontend.vendor.auth.dashboard',compact('products'));
    }

    public function vendorProductCreate()
    {
        $categories = Category::get();
        $colors = Color::get();
        $sizes = Size::get();
        return view('frontend.vendor.auth.create',compact('categories','colors','sizes'));
    }

    public function vendorProductStore(Request $request)
    {
         if($request->file('image')){
            $name = time().'.'.$request->image->extension();
            $request->image->move(public_path('/product/'),$name);
         }
         $product = new Product();
         $product->category_id = $request->category_id;
         $product->vendor_id = session()->get('vendorId');
         $product->color_id = $request->color_id;
         $product->size_id = $request->size_id;
         $product->name = $request->name;
         $product->price = $request->price;
         $product->qty = $request->qty;
         $product->type = $request->type;
         $product->image = $name;
         if($request->hasFile('multi_image')){
            foreach($request->file('multi_image') as $images){
                $imagesName = rand(999,9999).'.'.$images->extension();
                $images->move(public_path('/gallery'),$imagesName);
                $data[] = $imagesName;
            }
         }
           $product->multi_image = json_encode($data);
           $product->save();
           return redirect()->back()->with('success','product has been success');
        } 
        public function vendorLogout()
        {
            session()->flush();
            return redirect()->back()->with('success','vendor has been logout');
        }
}
