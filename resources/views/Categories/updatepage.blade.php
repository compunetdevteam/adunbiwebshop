@extends('Centaur::dashlayout')
@section('sidebar')
    @include('centaur.adminside')
@endsection
@section('content')

        {!! Form::open(array('url'=>'categories/update','method'=>'post','class'=>'form-horizontal')) !!}

        <input type="text" readonly value="{{$result->id}}" name="id"/>
        {!! Form::label('Category Name') !!}
        <input type='text' name='name' value='{{$result->name}}' class="form-control" />
        {!! Form::label('Category Description') !!}

        <input type="textarea" name="description" value="{{$result->description}}" class="form-control" />
        <br/>
        {!! Form::submit('Save',array('class'=>'btn btn-primary')) !!}
                <hr/>

        {!! Form::close() !!}

        <p>
                @foreach($errors->all() as $error)
                        {{$error }}
                @endforeach
        </p>


@endsection