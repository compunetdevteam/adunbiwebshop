@extends('Centaur::layout')

@section('content')
<h1>List of all Categories</h1>
	<table border="2">
	
	@foreach($category as $cat)
		<th><b>Category Name:</b> {{$cat['name']}} </th> 
		<tr> <td><b>Categories Description:</b> {{$cat['description']}}</td></tr>
	@endforeach
	</ul>
	</table>
	
@endsection