<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function categoryCreate()
   {
      return view('backend.Admin.category.create');
   }

   public function categoryStore(Request $request)
   {
            $this->validate($request, [
               'name' => 'required|string',
               'image' => 'required',
            ]);

            if($request->file('image')){
               $name = time().'.' .$request->image->extension();
               $request->image->move(public_path('/categor/'), $name);
            }

            $category = new Category();
            $category->name = $request->name;
            $category->slug = str_replace(' ','-',strtolower($request->name));
            $category->image = $name;
            $category->save();
            return redirect()->back()->with('message','Category has been Create');
   }

   public function categoryManage()
   {  

        $categories = Category::get();
      return view('backend.Admin.category.list',compact('categories'));
   }
   public function categoryDelete($id)
   {
       $categoryDelete = Category::find($id);
       $categoryDelete->delete();
       return redirect('/category/manage')->with('success','Category has been Delete');
   }
   public function categoryEdit($id)
   {
      $category = Category::find($id);
      return view('backend.Admin.category.edit',compact('category'));

   }
   public function categoryUpdate(Request $request, $id)
   {
      $this->validate($request, [
         'name' => 'required|string'
      ]);
        $category = Category::find($id);
        if(isset($request->image)){
          if($category->image && file_exists('categor/'.$category->image)){
             unlink('categor/'.$category->image);
         }
         $updateImage = time(). '.' .$request->image->extension();
         $request->image->move(public_path('/categor/'), $updateImage);
         $category->image = $updateImage;
      }
      $category->name = $request->name;
      $category->slug = str_replace(' ','-',strtolower($request->name));
      $category->save();
      return redirect()->back()->with('message','Category has been Update');
   }
}
