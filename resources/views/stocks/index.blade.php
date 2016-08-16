@extends('Centaur::dashlayout')
@section('sidebar')
@if(!Sentinel::getRoleRepository()->findBySlug('administrator'))
	@include('centaur.userside')
@else
	@include('centaur.adminside')
@endif
@endsection
@section('content')
	<div id="container">
		<div class="row">
			<ul>
			@foreach($results as $result)
				<!-- <li> <span> <b>Stock Category</b>  </span> </li> -->
				<li><b>Category Name :</b>{{ $result->categories()->pluck('name') }}</li>
				<!--<li> <span> <b>Products In Stock</b>  </span> </li> -->
				<li><b>Product Name :</b>{{ $result->products()->pluck('productname') }}</li>
				<hr/>
			@endforeach
			{{ $results->links() }}
			</ul>
		</div>
	</div>
@endsection