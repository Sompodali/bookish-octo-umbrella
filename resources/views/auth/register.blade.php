@extends('frontend.master')
@section('content')
  
				<!--login-->
			<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile form1">
					<h3>Register</h3>
					<form action="{{route('register')}}" method="post">
						@csrf
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<label>Name</label>
							<input type="text" name="name" class="form-control" placeholder="Enter name"/>
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<label>Email</label>
							<input type="email" name="email" class="form-control" placeholder="Enter email"/>
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<label>Phone</label>
							<input type="tel" name="phone" class="form-control" placeholder="Enter phone"/>
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<label>Address</label>
							<textarea type="text" name="address" class="form-control" placeholder="Enter name"></textarea>
							<div class="clearfix"></div>
						</div>
						 
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<label>Password</label>
							<input type="password" name="password" class="form-control" placeholder="Enter password"/>
							<div class="clearfix"></div>
						</div>
						 
						 <button type="submit" name="btn" class="btn btn-primary">Register</button>
					</form>
				</div>
				
			</div>
		</div>
				<!--login-->
	 
@endsection