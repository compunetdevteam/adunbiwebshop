@extends('Centaur::dashlayout')
@section('sidebar')
    @include('centaur.adminside')
@endsection
@section('content')

    <h1>List of all Categories</h1>


        @foreach($category as $cat)
           <b>Category Name:</b> {{$cat['name']}}
            <b>Categories Description:</b> {{$cat['description']}}<br/>
           <a href="{{$cat->id}}">Update</a>
           <a href="{{$cate->id}}">Delete</a>
                   <hr/>
            @endforeach
            </ul>


@endsection