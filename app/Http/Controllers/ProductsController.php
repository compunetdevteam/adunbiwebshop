<?php

namespace App\Http\Controllers;

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
		$listproduct = App\Product::all();
		return view('findcat',compact('listproduct'));
		
	}
	
	// search products by products name
	public function searchproduct()
	{
	
		return view('searchproduct');
	}
	
	public function searchresult($name)
	{
		
		//$search = App\Product::find($name);
		
		return view('searchresult');
		
	}
	public function createProduct(Request $request)
	{
		
	}
}