<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\Size;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function sizeCreate()
    {
        $categories = Category::get();
       return view('backend.Admin.size.create',compact('categories'));
    }
    public function sizeStore(Request $request)
    {

        $sizes = new Size();

        
        $sizes->name = $request->name;
        
        $sizes->save();
        return redirect()->back()->with('success','size has been Create');
   }

   public function sizeManage()
   {
    
        $sizes = Size::with('category')->paginate(10);
        return view('backend.Admin.size.list',compact('sizes')); 
   }
}
