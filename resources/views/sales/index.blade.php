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
            <h3>Sales Summary</h3>
            @foreach($sales as $sale)
                <p>Product Bought: <b>{{ $sale->products()->productname }}</b></p>
                <p>Customer Name: <b>{{ $sale->customername }}</b></p>
                <p>Product Price: <b>=N={{ $sale->sellingprice }}</b></p>
		</div>
	</div>
</body>
</html>