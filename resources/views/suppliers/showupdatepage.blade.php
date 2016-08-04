@extends('Centaur::dashlayout')
@section('content')
    <h2>List of all Suppliers</h2>
    <ol>
        @foreach($updatepage as $update)
            {!! Form::open(array('url'=>'','method'=>'')) !!}
            <li>Supplier Name: {{ $update->suppliername  }}</li><br>
            Supplier Address: {{$update->supplieraddress}}



            <hr/>
        @endforeach
    </ol>
@endsection