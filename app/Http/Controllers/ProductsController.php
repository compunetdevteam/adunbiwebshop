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
	public function index()
	{
		$products = App\Product::with('images')->paginate(20);
		return view('products.index',compact('products'));
	}
}