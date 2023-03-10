@extends('backend.master')

 @section('content')
  <div class="container-fluid">
    
         <table class="table table-bordered">
            <tr>
                <th>SL</th>
                <th>Category Name</th>
                <th>Name</th> 
                <th>Action</th>
            </tr>
             @foreach($subcategories as $subcategory)
            <tr>
            <td>{{ $loop->index+1}}</td> 
                <td>{{$subcategory->category->name}}</td>
                <td>
                      {{$subcategory->name}}
                </td>
                <td>
                    <a href="{{url('/subcategory/edit/'.$subcategory->id)}}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{url('/subcategory/delete/'.$subcategory->id)}}"onclick="return confirm('Are you sure ??')" class="btn btn-sm btn-danger">Delete</a>

                </td>
                </tr>
             @endforeach
         </table>
         {{$subcategories->links()}}
     
  </div>
 @endsection