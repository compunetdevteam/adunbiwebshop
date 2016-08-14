@extends('Centaur::dashlayout')
@section('userinfo')
    @include('centaur.userdetails',$user)
@endsection
@section('sidebar')
    @include('centaur.adminside')
@endsection
@section('content')
	<div id="container">
		<div class="row">
            <h3>Sales Summary</h3>
            @foreach($sales as $sale)
                <p>Product Bought: <b>{{ $sale->products->pluck('productname') }}</b></p>
                <p>Customer Name: <b>{{ $sale->customername }}</b></p>
                <p>Product Price: <b>=N={{ $sale->total }}</b></p>
                <p><a href="sales/{{ $sale->id }}">details</a></p>
                <hr>
			@endforeach
		</div>
        <p>{{ $sales->links() }}</p>
	</div>
@endsection