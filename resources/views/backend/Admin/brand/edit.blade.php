@extends('backend.master')
 @section('content')
  <div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <form action="{{url('/brand/update/'.$brand->id)}}" method="post" >
                    @csrf
                    <div class="form-group">
                      <label>Category Name</label>
                       <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                       </select>
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