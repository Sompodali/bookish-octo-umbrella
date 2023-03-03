@extends('backend.master')
 @section('content')
  <div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <form action="{{url('/color/update/'.$color->id)}}" method="post" >
                    @csrf
                    <div class="form-group">
                      <label>Color Name</label>
                      <input type="text" name="name"value="{{$color->name}}" class="form-control"placeholder="Enter color name"/>
                    </div>
                    <label>Name</label>
                      <input type="text" name="name"  class="form-control"/>
                    </div>
                     
                    <button type="submit" class="btn btn-block btn-success">Update</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
 @endsection