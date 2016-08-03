
<div>
<h1>Category Search Results</h1>
	<ul>
	@foreach($results as $result)
		<li><b>Name Of Category :</b> {{ $result['name'] }} </li>
		<li><b>Name Of Description :</b> {{ $result['description'] }} </li>
	@endforeach

	</ul>
</div>