@extends('Centaur::dashlayout')
@section('sidebar')
        @if(!Sentinel::getRoleRepository()->findBySlug('administrator'))
                @include('centaur.userside')
        @else
                @include('centaur.adminside')
        @endif
@endsection
@section('content')

        <h1 class="text-center">Update Category</h1>
        <hr/>
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
                        <p class="alert-danger">{{$error }}</p>
                @endforeach
        </p>


@endsection