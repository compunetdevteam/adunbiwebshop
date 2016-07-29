@extends('Centaur::layout')
@section('content')
<h1> this is the product list</h1>
	
			<table border="1" width="20%">
			@foreach($products as $product)
			
				<tr>
				<td>{{$product->productname}}</td> 
				<td>{{$product->sellingprice}}</td>
				</tr>
				
			@endforeach
			</table>
</center>
			{{$products->links()}}
		@endsection()
