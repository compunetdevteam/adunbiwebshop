@extends('Centaur::dashlayout')
@section('sidebar')
	@include('centaur.adminside')
@endsection
@section('content')

	{!!Form::open(array('url' => 'suppliers/saveSupplier', 'method' => 'post')) !!}
	{!!Form::label('Supplier Name') !!}
	{!!Form::text('name',null,array('class'=>'form-control')) !!}

	{!!Form::label('Supplier Address') !!}
	{!!Form::text('address',null,array('class'=>'form-control')) !!}
	{!! Form::submit('Save Supplier')!!}
	{!!Form::close() !!}

	<p>
		@foreach($errors->all() as $error)
			{{$error }}
		@endforeach
	</p>
@endsection