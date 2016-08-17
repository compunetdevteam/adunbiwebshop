@extends('Centaur::dashlayout')
@section('sidebar')
	@if(!Sentinel::getRoleRepository()->findBySlug('administrator'))
		@include('centaur.userside')
	@else
		@include('centaur.adminside')
	@endif
@endsection
@section('content')
<h1> Product List</h1>

	<p><a href="{{action('ProductsController@index')}}" class="btn btn-primary">Newly Created Products</a></p>
			<table border="1" width="20%">
			@foreach($products as $product)

				<tr>
				<td>{{$product->productname}} : <a href="{{url('products/details/'.$product->id)}}">details</a> or <a
							href="{{url('products/edit/'.$product->id)}}">Edit</a> to edit the Product</td>
				<td>{{$product->sellingprice}}</td>

				</tr>
			@endforeach
			</table>
			<p>
			@if(Session::has('status'))
			<p class="alert-warning -warning">{{Session::get('status',5)}}</p>
			@endif
			</p>
</center>
			{{$products->links()}}
@endsection
