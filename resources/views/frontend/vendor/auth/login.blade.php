 
@extends('frontend.master')
@section('content')
  
				<!--login-->
			<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile form1">
					<h3>Register</h3>
					<form action="{{url('/vendor/loging')}}" method="post">
						@csrf
						 
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<label>Email</label>
							<input type="email" name="email" class="form-control" placeholder="Enter email"/>
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