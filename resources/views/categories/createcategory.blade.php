@extends('Centaur::dashlayout')

@section('content')
<h1>Add New Categories</h1>
<div class="form-group">
{!!Form::open(array('url'=>'categories/save','method'=>'POST'))!!}
</div>
<div class="form-group">
	{!!Form::label('Enter Category Name :')!!}
		{!!Form::text('name',null,array('class' => 'form-control'))!!}
	</div>

<div class="form-group">
	{!!Form::label('Stock :')!!}
	{!!Form::select('categories', $categories, null,['class' => 'form-control'])!!}
</div>

		<div class="form-group">
			{!!Form::label('Enter Description :')!!}
		{!!Form::textarea('description',null,array('class' => 'form-control'))!!}
		</div>
		<div class="form-group">
		{!!Form::submit('Save Category')!!}
		</div>
		<div class="form-group">
{!!Form::close()!!}
</div>
@endsection