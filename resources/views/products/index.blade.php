<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Products</title>
	
</head>
<center>
<body>
<h1> this is the product list</h1>
	
			<table border="1" width="20%">
			@foreach($products as $product)
			
				<tr>
				<td>{{$product->productname}}</td> 
				<td>{{$product->sellingprice}}</td>
				</tr>
				
			@endforeach
			</table>
</center>
			{{$products->links()}}
		
</body>

</html>