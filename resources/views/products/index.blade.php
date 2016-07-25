<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Products</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div id="container">
		<div class="row">
			<ul>
			@foreach($products as $product)
				<li>{{  $product->productname }} || <b>{{  $product->sellingprice }}</b></li>
			@endforeach
			</ul>
			{{$products->links()}}
		</div>
	</div>
</body>
</html>