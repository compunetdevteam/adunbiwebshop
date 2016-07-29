
@extends('Centuar::layout')

@section('content')
<h1>Product search page</h1>
{!!Form::open(array('url'=> 'products/doSearch','method'=>'get'))!!}
	{!!Form::label('Search for products')!!}
		{!!Form::text('name',null)!!}
	{!!Form::submit('Search for products')!!}
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