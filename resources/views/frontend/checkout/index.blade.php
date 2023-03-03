@extends('frontend.master')
@section('content')
		<!--banner-->
		<div class="banner1">
			<div class="container">
				<h3><a href="index.html">Home</a> / <span>Checkout</span></h3>
			</div>
		</div>
	<!--banner-->

	<!--content-->
		<div class="content">
		<form action="{{url('/customer/details/order')}}" method="post">
			  @csrf
			<div class="cart-items">
				<div class="container">
					 <h2>My Shopping Bag</h2>
					 <div class="cart-header">
						  <table class="table table-bordered">
							<tr>
								<th>SL</th>
								<th>Name</th>
								<th>Price</th>
								<th>Qty</th>
								<th>Total Price</th>
								<th>Action</th>
							</tr>
							@php
							 $sum = 0;
							 $qty = 0;
							 @endphp
							@foreach($addTOCarts as $addTOCart)
							<tr>
								<td>{{$loop->index+1}}</td>
								<td>{{$addTOCart->product ? $addTOCart->product->name : 'No product found'}}</td>
								<input type="hidden" name="product_id" value="{{ $addTOCart->product_id }}"/>
								<input type="hidden" name="vendor_id" value="{{ $addTOCart->vendor_id }}"/>
								<td>{{$addTOCart->price}}</td>
								<td>
								<form action="{{url('/cart/product/update/'.$addTOCart->id)}}" method="post">
								@csrf
								   <input type="number" name="qty" value="{{$totalQty = $addTOCart->qty}}"/> <button type="submit" name="btn" class="btn btn-sm btn-success">Update</button>
                                   </form>
								</td>
								<td>{{$totalPrice = $addTOCart->price * $addTOCart->qty}}</td>
								<td>
								  <a href="#"class="btn btn-sm btn-danger">Delete</a>
								</td>
							</tr>
							@php 
							  $sum += $totalPrice;
							  $qty += $totalQty;
							 @endphp
							@endforeach
							<tr>
							<td colspan="3">Sub total</td>
							    <td colspan="1"></td>
								<td colspan="1">{{$sum}}</td>
								<td colspan="1"></td>
							</tr>
						  </table>						
                     </div>
					   <h2> <center>Shipping and Billing Information</center></h2>
					   <div class="col-md-12">
						<div class="row">
						   <div class="col-md-2"></div>

 
							 <input type="hidden" name="total_price" value="{{$sum}}"/>
							 <input type="hidden" name="total_qty" value="{{$qty}}"/>
							 <div class="col-md-8">
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" value="{{auth()->check() ? auth()->user()->name : old('name')}}" placeholder="Enter Customer name"/>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control" value="{{auth()->check() ? auth()->user()->email : old('email')}}"
								placeholder="Enter Customer email"/>
							</div>
							<div class="form-group">
								<label>Phone</label>
								<input type="tel" name="phone" class="form-control"value="{{auth()->check() ? auth()->user()->phone: old('phone')}}"  placeholder="Enter Customer phone"/>
							</div>
							<div class="form-group">
								<label>Address</label>
								<textarea type="text" name="name" class="form-control" placeholder="Enter Customer address">{{auth()->check() ? auth()->user()->address: old('address')}}</textarea>
							</div>
							<button type="submit" class="btn btn-block btn-primary">Submit</button>
						   </div>
						   <div class="col-md-2"></div>
						</div>
					   </div>
					</div>		
				</div>
				</form>
			</div>
	<!-- checkout -->	

@endsection