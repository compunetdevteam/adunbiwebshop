@extends('Centaur::layout')
@section('content')
    <h1>update this Record</h1>

    @foreach()
    {!! Form::open(array('url'=>'','method'=>'post')) !!}}
        {!! Form::label('Edit Supplier') !!}
        {!! Form::input('name',null,array()) !!}
        {!! Form::input('address',null,array()) !!}
    {!! Form::close !!}
    @endforeach
@endsection