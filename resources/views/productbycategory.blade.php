<html>
<head>
	<title>Adunbi Test</title>
</head>


<body>

<h1>Find Product by Category</h1>
	
	<form action="{{url('productbycategoryResult')}}" method = "POST">
		{{csrf_field()}}
		<input type="text" name="name" value=""/>
		<input type="submit" value="Search"/>
	</form>
	

</body>
</html>