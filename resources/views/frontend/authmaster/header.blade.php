
    <div class="header">
			<div class="header-top">
				<div class="container">
					 <div class="top-left">
						<a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
					</div>
					<div class="top-right">
					<ul>
						<li><a href="#">Checkout</a></li>
						@if(auth()->check())
						<li><a href="#"class="badge badge-danger">{{auth()->user()->name}}</a></li>
						<li><a href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                        </form>						 
						</li>
						@else
						<li><a href="{{url('/user/login')}}">User Login</a></li>
						<li><a href="{{url('/user/register')}}">User Register</a></li>
						 @endif

						@if(session()->has('vendorId'))
						<li><a href="{{url('/vendor/dashboard')}}"class="badge badge-danger">{{session()->get('vendorName')}}</a></li>
						<li><a href="{{url('/vendor/logout')}}">Logout</a></li>
						@else
						<li><a href="{{url('/vendor/log/')}}">Vendor Login</a></li>
						<li><a href="{{url('/vendor/register')}}">Vendor Register</a></li>
						@endif
					</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="heder-bottom">
				<div class="container">
					<div class="logo-nav">
						<div class="logo-nav-left">
							<h1><a href="index.html">New Shop <span>Shop anywhere</span></a></h1>
						</div>
						<div class="logo-nav-left1">
							<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="{{url('/')}}" class="act">Home</a></li>	
									<!-- Mega Menu -->
								 
									<li class="dropdown">
										 
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="col-sm-3  multi-gd-img">
												 
													<ul class="multi-column-dropdown">
														  
												</div>
												<div class="clearfix"></div>
											</div>
										</ul>
									</li>
								 
								</ul>
							</div>
							</nav>
						</div>
						<div class="header-right2">
							@if($cartProducts >0)
							<div class="cart box_1">
								<a href="{{url('/checkout')}}">
									<h3> <div class="total">
										<span class=""></span> ({{$cartProducts}}items)</div>
										<img src="{{asset('/frontend/assets/')}}/images/bag.png" alt="" />
									</h3>
								</a> 
							</div>	
							@else
							<div class="cart box_1">
								<a href="#">
									<h3> <div class="total">
										<span class=""></span> (0 items)</div>
										<img src="{{asset('/frontend/assets/')}}/images/bag.png" alt="" />
									</h3>
								</a>
								<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
								<div class="clearfix"> </div>
							</div>	
							@endif
							
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
				<!--banner-->
				<div class="banner-w3">
			<div class="demo-1">            
				<div id="example1" class="core-slider core-slider__carousel example_1">
					<div class="core-slider_viewport">
						<div class="core-slider_list">
							<div class="core-slider_item">
								<img src="{{asset('/frontend/assets/')}}/images/b1.jpg" class="img-responsive" alt="">
							</div>
							 <div class="core-slider_item">
								 <img src="{{asset('/frontend/assets/')}}/images/b2.jpg" class="img-responsive" alt="">
							 </div>
							<div class="core-slider_item">
								  <img src="{{asset('/frontend/assets/')}}/images/b3.jpg" class="img-responsive" alt="">
							</div>
							<div class="core-slider_item">
								  <img src="{{asset('/frontend/assets/')}}/images/b4.jpg" class="img-responsive" alt="">
							</div>
						 </div>
					</div>
					<div class="core-slider_nav">
						<div class="core-slider_arrow core-slider_arrow__right"></div>
						<div class="core-slider_arrow core-slider_arrow__left"></div>
					</div>
					<div class="core-slider_control-nav"></div>
				</div>
			</div>
			<link href="{{asset('/frontend/assets/')}}/css/coreSlider.css" rel="stylesheet" type="text/css">
			<script src="{{asset('/frontend/assets/')}}/js/coreSlider.js"></script>
			<script>
			$('#example1').coreSlider({
			  pauseOnHover: false,
			  interval: 3000,
			  controlNavEnabled: true
			});

			</script>

		</div>
		<!--header-->