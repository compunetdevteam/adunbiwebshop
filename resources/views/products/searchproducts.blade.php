@extends('Centaur::dashlayout')
@section('sidebar')
	@if(!Sentinel::getRoleRepository()->findBySlug('administrator'))
		@include('centaur.userside')
	@else
		@include('centaur.adminside')
	@endif
@endsection
@section('content')
		<h1 class="text-center">Product Search</h1>
		<hr>
		{!!Form::open(array('url'=> 'products/doSearch','method'=>'get'))!!}

		<label for="Product Name" class="labelcontrol col-xs-3">Enter Product Name</label>
		<div class="form-group">
			{!!Form::text('name',null,array('class'=>'form-control'))!!}
		</div>
		<p></p>
			{!!Form::submit('Search for products',['class'=>'btn btn-danger'])!!} or click <a href="{{url('products/searchform')}}"
																							  class="btn btn-info">Here</a> to search by Date Range
		{!!Form::close()!!}
		<div>
		@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						{{$error}}
					@endforeach
				</ul>
			</div>
		@endif
		</div>
@endsection