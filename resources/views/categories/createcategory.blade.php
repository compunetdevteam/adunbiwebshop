@extends('centaur.layout')

@section('content')
<h1>Add New Categories</h1>
<div class="form-group">
{!!Form::open(array('url'=>'categories/save','method'=>'POST'))!!}
</div>
<div class="form-group">
	{!!Form::label('Enter Category Name :')!!}
		{!!Form::text('name')!!} 
	</div>
		<div class="form-group">
		{!!Form::textarea('description')!!}
		</div>
		<div class="form-group">
		{!!Form::submit('Save Category')!!}
		</div>
		<div class="form-group">
{!!Form::close()!!}
</div>
@endsection