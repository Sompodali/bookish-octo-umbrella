@extends('backend.master')
 @section('content')
  <div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <form action="{{url('/subcategory/update/'.$subcategory->id)}}" method="post" >
                    @csrf
                    <div class="form-group">
                      <label>Subcategory Name</label>
                      <input type="text" name="name"value="{{$subcategory->name}}" class="form-control"placeholder="Enter category name"/>
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