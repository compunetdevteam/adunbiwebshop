@extends('Centaur::dashlayout')
@section('sidebar')
	@if(!Sentinel::getRoleRepository()->findBySlug('administrator'))
		@include('centaur.userside')
	@else
		@include('centaur.adminside')
	@endif
@endsection
@section('content')
	<div class="panel1">
		<h3>  Products List  </h3>
		<a href="{{action('ProductsController@indexup')}}" class="btn btn-primary">Show Updated Products</a>
			
			<div class="table">
			  <div class="tr">
				<div class="th"><b>Stock ID</b></div>
				<div class="th"><b>ProductName</b></div>
				<div class="th"><b>Date of Puchase</b></div>
				<div class="th"><b>Batch No</b></div>
				<div class="th"><b>Serial No</b></div>
				<div class="th"><b>Cost Price</b></div>
				<div class="th"><b>Selling Price</b></div>
				<div class="th"><b>Weight</b></div>
				<div class="th"><b>Action</b></div>
		    
			  </div>
			  @foreach($products as $product)
			  <div class="tr1">
				<div class="td1">{{$product->id}}</div>
				<div class="td">{{ $product->productname}}</div>

				<div class="td">{{ $product->dateofpurchase }}</div>
				<div class="td">{{ $product->batchnumber }}</div>
				<div class="td">{{ $product->serialnumber}}</div>
				<div class="td">{{ $product->sellingprice }}</div>
				<div class="td">Row 2, Cell 3</div>
				<div class="td">Row  2, Cell 2</div>
				<div class="td"><a href="{{url('products/details/'.$product->id)}}"><i class="fa fa-fw fa-eye"></i></a>|
				<a href="{{url('products/edit/'.$product->id)}}"><i class="fa fa-fw fa-edit"></i></a>| <a href="{{url('products/delete/'.$product->id)}}"><i class="fa fa-fw fa-trash"></i></a>
				</div>
			  </div>


			@endforeach
			
			</div>
		<p>
		@if(Session::has('status'))
			<p class="alert-warning -warning">{{Session::get('status',5)}}</p>
			@endif
			</p>

			{{$products->links()}}

</div>

@endsection
