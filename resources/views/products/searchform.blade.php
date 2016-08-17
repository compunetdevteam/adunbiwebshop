@extends('Centaur::dashlayout')
@section('sidebar')
    @if(!Sentinel::getRoleRepository()->findBySlug('administrator'))
        @include('centaur.userside')
    @else
        @include('centaur.adminside')
    @endif
@endsection
@section('content')

        <h1 class="text-center">Search product by date</h1>
        <hr>
        {!! Form::open(['method'=>'GET','url'=>'products.datesearch','class'=>'form-horizontal'])  !!}


            <div class="form-group">
            <label for="Starting Date" class="labelcontrol col-xs-3">Start Date</label>
            <div class="col-xs-6"><input type="date" class="form-control" name="search" placeholder="Date begining...">
            </div>
            </div>

            <div class="form-group">
                <label for="Starting Date" class="labelcontrol col-xs-3">Start Date</label>
                <div class="col-xs-6"><input type="date" class="form-control" name="search" placeholder="Date ending..."></div>
            </div>

            <div class="col-md-offset-6"><input type="submit" value="Search" class="btn btn-primary"></div>


        {!! Form::close() !!}
@endsection
