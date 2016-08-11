@extends('Centaur::dashlayout')
@section('sidebar')
	@include('centaur.adminside')
@endsection
@section('content')
<h1> this is the product list</h1>

	<p><a href="{{action('ProductsController@index')}}" class="btn btn-primary">Newly Created Products</a></p>
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
