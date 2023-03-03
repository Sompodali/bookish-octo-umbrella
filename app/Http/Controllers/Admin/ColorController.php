<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Models\Color;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function colorCreate()
    {
        $categories = Category::get();
       return view('backend.Admin.color.create',compact('categories'));
    }

   public function colorManage()
   {
    
       $colories = Color::with('category')->paginate(10);
        return view('backend.Admin.color.list',compact('colories')); 
   }
   public function colorStore(Request $request)
   {

       $color = new Color();
        
       $color->name = $request->name;
       
       $color->save();
       return redirect()->back()->with('success','Color has been Create');
  }
   public function colorDelete($id)
   {
    
       $colors = Color::find($id);
       return view('backend.Admin.color.edit',compact('colors'));
   }
   public function colorEdit($id)
    {
        $color = Color::find($id);
        return view('backend.Admin.color.edit',compact('color'));
    }
    public function colorUpdate(Request $request, $id)
    {
       $this->validate($request, [
          'name' => 'required|string'
       ]);
         
       $color->name = $request->name;
      
       $color->save();
       return redirect()->back()->with('message','Color has been Update');
    }

    
}
