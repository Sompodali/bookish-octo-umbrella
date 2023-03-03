@extends('frontend.master')

@section('content')
			<!--content-->
            <div class="content">
			<!--banner-bottom-->
				<div class="ban-bottom-w3l">
					<div class="container">
						<div class="col-md-6 ban-bottom">
							<div class="ban-top">
								<img src="{{asset('/frontend/assets/')}}/images/p1.jpg" class="img-responsive" alt=""/>
								<div class="ban-text">
									<h4>Men’s Clothing</h4>
								</div>
								<div class="ban-text2 hvr-sweep-to-top">
									<h4>50% <span>Off/-</span></h4>
								</div>
							</div>
						</div>
						<div class="col-md-6 ban-bottom3">
							<div class="ban-top">
								<img src="{{asset('/frontend/assets/')}}/images/p2.jpg" class="img-responsive" alt=""/>
								<div class="ban-text1">
									<h4>Women's Clothing</h4>
								</div>
							</div>
							<div class="ban-img">
								<div class=" ban-bottom1">
									<div class="ban-top">
										<img src=" {{asset('/frontend/assets/')}}/images/p3.jpg" class="img-responsive" alt=""/>
										<div class="ban-text1">
											<h4>T - Shirt</h4>
										</div>
									</div>
								</div>
								<div class="ban-bottom2">
									<div class="ban-top">
										<img src=" {{asset('/frontend/assets/')}}/images/p4.jpg" class="img-responsive" alt=""/>
										<div class="ban-text1">
											<h4>Hand Bag</h4>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			<!--banner-bottom-->
			<!--new-arrivals-->
				<div class="new-arrivals-w3agile">
					<div class="container">
						<h2 class="tittle">New Arrivals</h2>
						<div class="arrivals-grids">
							@foreach($new_products as $product)
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
												<div class="grid-img">
													<img  src="{{asset('/product/'.$product->image)}}" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="{{asset('/product/'.$product->image)}}" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
									<div class="ribben1">
										<p>SALE</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<form action="{{url('/add/to/cart')}}"method="post">
                                      @csrf
									  <input type="hidden" name="vendor_id" value="{{$product->vendor_id}}"/>
									  <input type="hidden" name="product_id" value="{{$product->id}}"/>
									  <input type="hidden" name="price" value="{{$product->price}}"/>
									<div class="women">
										<h6><a href="#">{{$product->name}}</a></h6>
										<span class="size">{{$product->size->name}} </span>
										<p ><em class="item_price">${{$product->price}}</em></p>
										@if(auth()->check())
										<button class="btn btn-sm btn-primary">Add To Cart</button>
										@else
										<a href="{{url('/login')}}" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>

										@endif
									</div>
									</form>
									
								</div>
							</div>
							@endforeach
							<div class="clearfix"></div>
							</div>
					</div>
				</div>			 
			<!--new-arrivals-->
				<!--accessories-->
			<div class="accessories-w3l">
				<div class="container">
					<h3 class="tittle">20% Discount on</h3>
					<span>TRENDING DESIGNS</span>
					<div class="button">
						<a href="#" class="button1"> Shop Now</a>
						<a href="#" class="button1"> Quick View</a>
					</div>
				</div>
			</div>
			<!--accessories-->
			
			<!--Products-->
			<div class="new-arrivals-w3agile">
					<div class="container">
						<h2 class="tittle">New Products</h2>
						<div class="arrivals-grids">
							@foreach($hot_products as $product)
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
												<div class="grid-img">
													<img  src="{{asset('/product/'.$product->image)}}" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="{{asset('/product/'.$product->image)}}" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
									<div class="ribben1">
										<p>SALE</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">{{$product->name}}</a></h6>
										<span class="size">{{$product->size->name}} </span>
										<p ><em class="item_price">${{$product->price}}</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							@endforeach
							<div class="clearfix"></div>
							</div>
					</div>
				</div> 
			<!--Products-->
			<div class="latest-w3">
				<div class="container">
					<h3 class="tittle1">Latest Fashion Trends</h3>
					<div class="latest-grids">
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src=" {{asset('/frontend/assets/')}}/images/l1.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Men</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-50%</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src=" {{asset('/frontend/assets/')}}/images/l2.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Shoes</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-20%</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src=" {{asset('/frontend/assets/')}}/images/l3.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Women</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-50%</h4>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="latest-grids">
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src=" {{asset('/frontend/assets/')}}/images/l4.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Watch</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-45%</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src=" {{asset('/frontend/assets/')}}/images/l5.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Bag</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-10%</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src=" {{asset('/frontend/assets/')}}/images/l6.jpg" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Cameras</h4>
								</div>
								<div class="latest-text2 hvr-sweep-to-top">
									<h4>-30%</h4>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			
			<div class="new-arrivals-w3agile">
					<div class="container">
						<h2 class="tittle">Best Sellers</h2>
						<div class="arrivals-grids">
							@foreach($best_products as $product)
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
												<div class="grid-img">
													<img  src="{{asset('/product/'.$product->image)}}" class="img-responsive" alt="">
												</div>
												<div class="grid-img">
													<img  src="{{asset('/product/'.$product->image)}}" class="img-responsive"  alt="">
												</div>			
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
									<div class="ribben1">
										<p>SALE</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="single.html">{{$product->name}}</a></h6>
										<span class="size">{{$product->size->name}} </span>
										<p ><em class="item_price">${{$product->price}}</em></p>
										<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>
									</div>
								</div>
							</div>
							@endforeach
							<div class="clearfix"></div>
							</div>
					</div>
				</div>	 
			<!--new-arrivals-->
		</div>
		<!--content-->
        @endsection