<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class ProductsController extends Controller
{
<<<<<<< HEAD
	protected $productDB;
	
	public function __construct(App\ProductDataAccess $product)
	{
		$this->$productDB = $product; 
	}
	
	//method to return all product
	public function Products()
	{
		$listproduct = App\Product::all();
		//$listproduct = $this->productDB->ListProducts();
		return view('findproduct',compact('listproduct'));
	}
	
	public function productByName(App\ProductDataAccess $product_by_name)
	{
		
	}
	
	
	
=======
	//
>>>>>>> origin/dev
}
