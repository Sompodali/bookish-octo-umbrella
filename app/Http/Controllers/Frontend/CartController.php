<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderdete;
use Illuminate\Http\Request;

class CartController extends Controller
{
     public function addTOCart(Request $request)
     {
        $addTOCart = new Cart();
        $addTOCart->user_id = auth()->user()->id;
        $addTOCart->vendor_id = $request->vendor_id;
        $addTOCart->product_id =$request->product_id;
        $addTOCart->price =$request->price;
        $addTOCart->qty = $request->qty ?$request->qty :1;
        $addTOCart->total_price =1*$request->price;
        $addTOCart->save();
     }

     public function checkOUT()
     {
       $addTOCarts = Cart::with('product')->where('user_id', auth()->user()->id)->get();
      return view('frontend.checkout.index',compact('addTOCarts'));
     }
     public function cartprodUpdate(Request $request, $id)
     {
          $cart = Cart::find($id);
          $cart->qty = $request->qty;
          $cart->save();
     }
      
     public function customerOrder(Request $request)
     {
          $order = new Order();
          $order->product_id = $request->product_id;
          $order->vendor_id = $request->vendor_id;
          $order->user_id = auth()->check() ? auth()->user()->id:1;
          $order->total_price = $request->total_price;
          $order->total_qty = $request->total_qty;
          $order->save();

          if($order->save()){
               $orderDetails = new Orderdete();
               $orderDetails->order_id = $order->id;
               $orderDetails->name = $request->name;
               $orderDetails->email = $request->email;
               $orderDetails->phone = $request->phone;
               $orderDetails->address = $request->address;
               $orderDetails->save(); 

          } 

           $product = Product::where('id',$order->product_id)->first();
           $product->qty = $product->qty - $request->total_qty;
           $product->save();

          $cartEmpty = Cart::where('user_id',auth()->user()->id)->get();
          foreach($cartEmpty as $cart){
               $cart->delete();
          }
          return redirect('')->with('success','you order has been completed');
     }
     
}
