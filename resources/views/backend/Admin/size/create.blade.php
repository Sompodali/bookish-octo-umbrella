@extends('backend.master')
 @section('content')
  <div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <form action="{{url('/size/store/')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Category Name</label>
                      <select class="form-control" name="category_id">
                         <option selected disabled>Select A Category</option>
                         @foreach($categories as $category)
                         <option value="{{ $category->id}}">{{ $category->name}}</option>
                         @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Size Name</label>
                      <input type="text" name="name" class="form-control"/>
                    </div>
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="category_id">
                        <option value="1">Active</option>
                        <option value="0">INactive</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-block btn-success">Create</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
 @endsection