@extends('Centaur::dashlayout')

@section('content')
		<h1> Add New Product </h1>
		{!!Form::open(array('url'=> 'products/save','method'=>'post', 'role'=>'form'))!!}
			<div class="form-group">
			{!!Form::label('Product name')!!}
			{!!Form::text('productname',null, array('class' => 'form-control'))!!}
			</div>
			<div class="form-group">
			{!!Form::label('Date of purchase')!!}
			{!!Form::text('dateofpurchase',null,array('class' => 'form-control'))!!}
			</div>
			<div class="form-group">
			{!!Form::label('Batch number')!!}
			{!!Form::text('batchnumber',null,array('class' => 'form-control'))!!}
			</div>
			<div class="form-group">
			{!!Form::label('Serial number')!!}
			{!!Form::text('serialnumber',null,array('class' => 'form-control'))!!}
			</div>
			<div class="form-group">
			{!!Form::label('Cost price')!!}
			{!!Form::text('costprice',null,array('class' => 'form-control'))!!}
			</div>
			<div class="form-group">
			{!!Form::label('Selling price')!!}
			{!!Form::text('sellingprice',null,array('class' => 'form-control'))!!}
			</div>
			<div class="form-group">
			{!!Form::label('Product Description')!!}
			{!!Form::text('description',null,array('class' => 'form-control'))!!}
			</div>
			<div class="form-group">
			{!!Form::label('Weight')!!}
			{!!Form::text('weight',null,array('class' => 'form-control'))!!}
			</div>
			<div class="form-group">
				{!!Form::label('Stock :')!!}
				{!!Form::select('stock', $stocks, null,['class' => 'form-control'])!!}
			</div>
			<div class="form-group">
			{!!Form::label('Supplier :')!!}
			{!!Form::select('Supplier', $suppliers, null,['class' => 'form-control'])!!}
			</div>
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