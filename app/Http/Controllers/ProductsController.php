<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProductsController extends Controller
{

	protected $productDB;

	public function __construct(Product $product)
	{

		$this->productDB = $product;
	}


	public function index()
		{

			$products = $this->listProducts();
			return view('products.index',compact('products'));
			
		}
	/**
	 * Return collection of products
	 * @return collection of products
	 */
	public function listProducts()
	{
		$products = Product::paginate(15);
		return $products;
	}
	/**
	 * [doSearch description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function doSearch(Request $request)
	{
		$this->validate($request, ['name'=> 'required|min:3|alpha_dash']);
		$results = $this->productsearch($request);
		return view('products.productresult', compact('results'));
		//dd('products');
	}
	/**
	 * [search description]
	 * @param  display the result of the search
	 * @return product search result
	 */
	public function search($results = [])
	{
		return view('products.searchproducts',compact('results'));
	}


	/**
     * Load and find the products supplied by a supplier's name
     * @param string $name
     * @return Collection Products
     */
    public function productsearch(Request $request)
    {
    	$results = Product::where('productname','like', $request->input('name').'%')->get();
    	return $results;
       // return $this->product->with('supplier')->all()->find($name);
    } //$reques
		
	
}