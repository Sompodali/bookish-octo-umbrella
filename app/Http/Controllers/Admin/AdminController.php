<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminLogin()
    {
        return view('backend.admin.auth.login');
    }
    public function adminLoginfrom(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();
         if(!$admin){
            return redirect()->back()-with('error','Email or password nt maching');
         }
         else{
             if(password_verify($request->password,$admin->password)){
                return redirect('/admin/dashboard/');
             }
         }
    }

    public function adminDashboard(){
        return view('backend.Admin.home.index');
    }
    public function adminLogout()
    {
        session()->flush();
        return redirect('/');
    }
}
