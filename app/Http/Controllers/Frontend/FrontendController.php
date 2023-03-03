<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
       $new_products = Product::with('category','color','size')->where('type','new')->where('status',1)->get();
         $hot_products = Product::with('category','color','size')->where('type','hot')->where('status',1)->get();
        $best_products = Product::with('category','color','size')->where('type','best')->where('status',1)->get();
        return view('frontend.home.index',compact('new_products','hot_products','best_products')); 
    }

    public function userRegister()
    {
        return view('frontend.user.register');
    }
    public function userLogin()
    {
        return view('frontend.user.login');
    }

}
