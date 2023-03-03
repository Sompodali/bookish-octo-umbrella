<?php

namespace App\Http\Controllers\Admin;
use App\Models\Subcategory;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
  
    public function subcategoryCreate()
    {
        $categories = Category::get();
        return view('backend.Admin.subcategory.create',compact('categories'));
    }
    public function subcategoryManage()
    {
        $subcategories = Subcategory::with('category')->paginate(10);
        return view('backend.Admin.subcategory.list',compact('subcategories'));
    }
     
     public function subcategoryStore(Request $request)
     {
         $this->validate($request,[
             'category_id' => 'required|integer',
             'name' => 'required|string'
         ]);
         $subcategory = new Subcategory();
         $subcategory->category_id = $request->category_id;
         $subcategory->name = $request->name;
         $subcategory->slug = str_replace(' ','-',strtolower($request->name));
         $subcategory->save();
         return redirect()->back()->with('success','Subcategory has been Create');
    }
    public function subcategoryDelete($id)
    {
        $subcategory = Subcategory::find($id);
        return view('backend.Admin.subcategory.edit',compact('subcategory'));
    }

    public function subcategoryEdit($id)
    {
        $subcategory = Subcategory::find($id);
        return view('backend.Admin.subcategory.edit',compact('subcategory'));
    }
    public function subcategoryUpdate(Request $request, $id)
    {
       $this->validate($request, [
          'name' => 'required|string'
       ]);
         
       $subcategory->name = $request->name;
       $subcategory->slug = str_replace(' ','-',strtolower($request->name));
       $subcategory->save();
       return redirect()->back()->with('message','Subcategory has been Update');
    }
}
