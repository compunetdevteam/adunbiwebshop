@extends('Centaur::dashlayout')

@section('content')
		<h1> Add New Product </h1>
		{!!Form::open(array('url'=> 'products/create','method'=>'post'))!!}
			{!!Form::label('Product name')!!}
				{!!Form::text('productname',null)!!}
				{!!Form::label('Date of purchase')!!}
				{!!Form::text('dateofpurchase',null)!!}
				{!!Form::label('Batch number')!!}
				{!!Form::text('batchnumber',null)!!}
				{!!Form::label('Serial number')!!}
				{!!Form::text('serialnumber',null)!!}
				{!!Form::label('Cost price')!!}
				{!!Form::text('costprice',null)!!}
				{!!Form::label('Selling price')!!}
				{!!Form::text('sellingprice',null)!!}
				{!!Form::label('Product Description')!!}
				{!!Form::text('description',null)!!}
				{!!Form::label('Weight')!!}
				{!!Form::text('weight',null)!!}
			{!!Form::submit('Submit')!!}
		{!!Form::close()!!}
		<div>
		@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
		@endif
		</div>
@endsection