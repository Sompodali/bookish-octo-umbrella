<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brandCreate()
    {
        $categories = Category::get();
        return view('backend.Admin.brand.create',compact('categories'));
    }
    public function brandManage()
    {
        $brands = Brand::with('category')->paginate(10);
        return view('backend.Admin.brand.list',compact('brands'));
    }
     
     public function brandStore(Request $request)
     {
         $this->validate($request,[
             'category_id' => 'required|integer',
             'name' => 'required|string'
         ]);
         $brands = new Brand();
         $brands->category_id = $request->category_id;
         $brands->name = $request->name;
         $brands->slug = str_replace(' ','-',strtolower($request->name));
         $brands->save();
         return redirect()->back()->with('success','brand has been Create');
    }
}
