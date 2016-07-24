<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProductsController extends Controller
{
	protected $listproductDB;	
	
	public function __construct(App\ProductDataAccess $product)
	{
		$this->listproductDB = $product;
	}
	// method to list all products
	public function product()
	{
		$products = App\Product::with('images')->paginate(20);
		return view('findcat',compact('listproduct'));
		
	}

	// table creation method
	public function createProduct()
	{
		
	}
	
	// search products by products name
	public function searchproduct()
	{
	
		return view('searchproduct');
	}
	// method to search product by name
	public function searchresult($name)
	{
		
		//$search = App\Product::find($name);
		
		return view('searchresult');
		
	}
	public function createProduct(Request $request)
	{
		
	}
}