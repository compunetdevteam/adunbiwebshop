@extends('Centaur::dashlayout')
@section('sidebar')
	@if(!Sentinel::getRoleRepository()->findBySlug('administrator'))
		@include('centaur.userside')
	@else
		@include('centaur.adminside')
	@endif
@endsection
@section('content')
<h1>Search For the Categories </h1>
	
	{!!Form::open(array('url' => 'categories/doSearch', 'method' => 'post')) !!}
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

@endsection


