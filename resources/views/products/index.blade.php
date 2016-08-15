@extends('Centaur::dashlayout')
@section('userinfo')
	@include('centaur.userdetails')
@endsection
@section('sidebar')
	@include('centaur.adminside')
@endsection
@section('content')
<h1> this is the product list</h1>
		<a href="{{action('ProductsController@indexup')}}" class="btn btn-primary">Show Updated Products</a>
	
			<table border="1" width="20%">
			@foreach($products as $product)
			
				<tr>
				<td>{{$product->productname}} : <a href="products/details/{{$product->id}}">details</a></td> 
				<td>{{$product->sellingprice}}</td>
					
				</tr>
				
			@endforeach
			</table>
</center>
			{{$products->links()}}
@endsection()
