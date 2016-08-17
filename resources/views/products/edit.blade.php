@extends('Centaur::dashlayout')
@section('sidebar')
    @if(!Sentinel::getRoleRepository()->findBySlug('administrator'))
        @include('centaur.userside')
    @else
        @include('centaur.adminside')
    @endif
@endsection
@section('content')

    h1.text-center{Update ProductPage

@endsection