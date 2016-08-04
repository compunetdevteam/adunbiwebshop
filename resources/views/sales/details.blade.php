@extends('Centaur::dashlayout')
@section('content')

    <ul>
        @foreach($getsale as $sale)
            <li><b>Product's Name :</b>{{ $sale->productname }}</li>
            <li><b>Customer's Name :</b>{{ $sale->customername  }}</li>
            <li><b>Total Paid  :</b>{{ $sale->total }}</li>
            <li>Click <a href="action({{ $sale->id }}">here</a> to Edit</li>
        @endforeach
    </ul>

@endsection