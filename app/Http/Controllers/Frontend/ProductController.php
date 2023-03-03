<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Size;
use App\Models\Color;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function vendors()
    {
        $vendores = Vendor::orderBy('created_at', 'desc')->get();
        return view('backend.admin.product.list',compact('vendores'));
    }

    public function vendorApproved($id)
    {
        $vendores = Vendor::find($id);
        $vendores->is_approved = 1;
        $vendores->save();
        return redirect()->back()->with('success','vendor has been approved');
    }
    public function vendorPending($id)
    {
        $vendores = Vendor::find($id);
        $vendores->is_approved = 0;
        $vendores->save();
        return redirect()->back()->with('success','vendor has been pending');
    }
    public function vendorProduct()
    {
         
        $products = Product::with('category','color','size')->get();
        return view('backend.admin.product.productlist',compact('products'));
    }
    public function vendorProductApproved($id)
    {
        $product = Product::find($id);
        $product->status = 1;
        $product->save();
        return redirect()->back()->with('success','Product has been approved');
    }
    public function vendorProductPending($id)
    {
        $product = Product::find($id);
        $product->status = 0;
        $product->save();
        return redirect()->back()->with('success','Product has been pending');
    }

}
