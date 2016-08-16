@extends('Centaur::dashlayout')
@section('sidebar')
    @include('centaur.adminside')
@endsection

@section('content')
    <div id="container">
        <div class="panel1">
            <h3><center> Sales Summary </center></h3>

            @foreach($sales as $sale)
                <div class= "panel-purple" ><h4>Customer Name: {{ $sale->customername }} </h4> </div>
                <div class= "panel-purple1" ><b class="b">Product Bought:</b> {{ $sale->products->pluck('productname') }} </div>
                <div class= "  panel-purple2" >Product Price: =N={{ $sale->total }}</div>
                <a href="sales/{{ $sale->id }}">...view-details...</a>
                <p></p>
                <hr/>
            @endforeach

        </div>
        <p>{{ $sales->links() }}</p>
    </div>
@endsection