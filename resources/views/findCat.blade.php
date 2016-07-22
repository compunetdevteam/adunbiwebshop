<html>
<head>
	<title>Adunbi Test</title>
</head>


<body>

<h1>List of all Categories</h1>
	
	<ol>
	
@foreach($listproduct as $allproduct)
	<li>	{{ $allproduct['description']}}</li>
	@endforeach;
	
</ol>
</body>
</html>