@extends('Centaur::dashlayout')
@section('sidebar')
    @include('centaur.adminside')
@endsection
@section('content')

    <h1>List of all Categories</h1>


        @foreach($category as $cat)
           <b>Category Name:</b> {{$cat->name}}<br/>
            <b>Categories Description:</b> {{$cat->description}}<br/>
           <div>
           <a href="categories/{{$cat->id}}" class="btn btn-primary">Update</a>
           <a href="categories/delete/{{$cat->id}}" class="btn btn-primary">Delete</a>
               </div>
                   <hr/>
            @endforeach
            </ul>


@endsection