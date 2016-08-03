@extends('Centaur::dashlayout')
@section('content')

    <h1 class="panel-heading">this is the edit page</h1>
   @foreach($updatepage as $update)
        {!! Form::open(array('url'=>'', 'method'=>'post')) !!}

            {!! Form::label('Edit Supplier Name') !!}
            {!! Form::text('name',null) !!}
        {!! Form::close() !!}
        @endforeach

@endsection