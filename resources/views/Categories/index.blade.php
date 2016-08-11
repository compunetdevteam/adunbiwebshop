@extends('Centaur::dashlayout')
@section('sidebar')
    @include('centaur.adminside')
@endsection
@section('content')

    <h1>List of all Categories</h1>

    {{--this is a session message--}}
    @if(Session::has('message'))
        <p class="alert-success">{{Session::get('message')}}</p>
    @endif
    {{--end of session message--}}

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