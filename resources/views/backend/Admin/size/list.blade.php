@extends('backend.master')

 @section('content')
  <div class="container-fluid">
    
         <table class="table table-bordered">
            <tr>
                <th>SL</th>
                <th>Category Name</th>
                <th>Size Name</th> 
                <th>Action</th>
            </tr>
            @foreach($sizes as $size)
            <tr>
            <td>{{$loop->index+1}}</td> 
             <td>{{$size->category->name}}</td>
            <td>
             {{$size->name}}
            </td>
            <td>
            <a href="{{url('/ /edit/'.$subcategory->id)}}" class="btn btn-sm btn-info">Edit</a>
             <a href="{{url('/subcategory/delete/'.$subcategory->id)}}"onclick="return confirm('Are you sure ??')" class="btn btn-sm btn-danger">Delete</a>

            </td>
            </tr>
             @endforeach
         </table>
         
         {{$sizes->links()}}
         
  </div>
 @endsection