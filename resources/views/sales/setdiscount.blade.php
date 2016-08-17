@extends('Centaur::dashlayout')
@section('userinfo')
    @include('centaur.userdetails',$user)
@endsection
@section('sidebar')
    @include('centaur.adminside')
@endsection
@section('content')
    <h1>this is the discount page</h1>



@endsection