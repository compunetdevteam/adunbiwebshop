@extends('Centaur::dashlayout')

@section('content')
<h1>Search For the Categories </h1>
	
	{!!Form::open(array('url' => 'categories/doSearch', 'method' => 'get')) !!}
			{!!Form::label('Search For Category') !!}
				{!!Form::text('name',null,array('class'=>'form-control')) !!}
				{!! Form::submit('Search Category')!!}
	{!!Form::close() !!}

	<p>
		@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
	</p>


@include('categories.categoryresults')

@endsection


