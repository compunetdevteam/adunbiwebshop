<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Stock Homepage</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div id="container">
		<div class="row">
			<ul>
			@foreach($results as $result)
				<!-- <li> <span> <b>Stock Category</b>  </span> </li> -->
				<li><b>Category Name :</b>{{ $result->categories()->pluck('name') }}</li>
				<!--<li> <span> <b>Products In Stock</b>  </span> </li> -->
				<li><b>Product Name :</b>{{ $result->products()->pluck('productname') }}</li>
			@endforeach
			{{ $results->links() }}
			</ul>
		</div>
	</div>
</body>
</html>