@extends('Centaur::dashlayout')
@section('sidebar')
    @include('centaur.adminside')
@endsection
@section('content')

    <ul>
        @foreach($getsale as $sale)
            <li><b>Product's Name :</b>{{ $sale->productname }}</li>
            <li><b>Customer's Name :</b>{{ $sale->customername  }}</li>
            <li><b>Total Paid  :</b>{{ $sale->total }}</li>
            <li>Click <a href="{{ $sale->id }}">here</a> to Edit</li>
        @endforeach
    </ul>

@endsection