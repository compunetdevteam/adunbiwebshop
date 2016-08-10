@extends('Centaur::dashlayout')
@section('sidebar')
    @include('centaur.adminside')
@endsection
@section('content')

<h1>Add New Categories</h1>
<hr />

<form action="{{url('categories/save')}}" method="post" class="form-horizontal" role="form" >
    <div class="form-group"><b>Category Name :</b>
    <input type="text" placeholder="Name of Category" name="name" class="form-control">
    </div>
    <div class="form-group"><b>Description :</b>
        <input type="text" class="form-control" placeholder="Type a brief Description of the Category">
    </div>

    <div class="form-group"><input type="submit" class="btn btn-primary"></div>
</form>

@endsection