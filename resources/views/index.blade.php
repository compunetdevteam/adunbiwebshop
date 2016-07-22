<html>
<head>
	<title>Adunbi Test</title>
</head>


<body>

<h1>List of all Categories</h1>
	
	<ul>
	@foreach( $category as $c )
	<li>	{{ $c['name']}}</li>
	@endforeach
</ul>
	
	

</body>
</html>