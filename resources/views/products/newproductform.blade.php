@extends('Centaur::dashlayout')
@section('sidebar')
	@if(!Sentinel::getRoleRepository()->findBySlug('administrator'))
		@include('centaur.userside')
	@else
		@include('centaur.adminside')
	@endif
@endsection
@section('content')
		<h1> Add New Product </h1>
		{!!Form::open(array('url'=> 'products/save','method'=>'post', 'role'=>'form'))!!}
			<div class="form-group">
			{!!Form::label('Product name')!!}
			{!!Form::text('productname',null, array('class' => 'form-control'))!!}
			</div>
			<div class="form-group">
			{!!Form::label('dateofpurchase','Date of purchase',['class'=>'label-control col-xs-3'])!!}
			<div class="col-xs-3">{!!Form::date('dateofpurchase',null,array('class' => 'form-control'))!!}</div>
			</div>
			<div class="form-group">
			{!!Form::label('batchnumber','Batch number',['class'=>'label-control col-xs-3'])!!}
			<div class="col-xs-3">{!!Form::text('batchnumber',null,array('class' => 'form-control'))!!}</div>
			</div>
			<div class="form-group">
			{!!Form::label('serialnumber','Serial number',['class'=>'label-control col-xs-3'])!!}
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
			{!!Form::label('weight','Weight',['class'=>'label-control col-xs-3'])!!}
			<div class="col-xs-3">{!!Form::text('weight',null,array('class' => 'form-control'))!!}</div>
			</div>
			<div class="form-group">
				{!!Form::label('stock','Stock :',['class'=>'label-control col-xs-3'])!!}
				<div class="col-xs-5">{!!Form::select('stock', $stocks, null,['class' => 'form-control'])!!}</div>
			</div>
			<div class="form-group">
			{!!Form::label('supplier','Supplier :',['class'=>'label-control col-xs-3'])!!}
			<div class="col-xs-5">{!!Form::select('Supplier', $suppliers, null,['class' => 'form-control'])!!}</div>
			</div>
			<div class="col-md-offset-6">{!!Form::submit('Submit')!!}</div>
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