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

/**
 * [createproduct description]
 * @return \Illuminate\Http\RedirectResponse
 */
    public function createproduct()
    {
    	return view ('products.createproduct');
    }
		
	public function newproductform(Request $request)
	{
		$allfields = $request->all();
		$this -> validate($request, [
			'productname' => 'required',
			'dateofpurchase' => 'required',
			'batchnumber' => 'numeric',
			'serialnumber' => 'numeric',
			'costprice' => 'numeric',
			'sellingprice' => 'numeric',
			'description' =>'max:255|alpha_num|alpha_dash',
			'weight' =>'numeric'
		]);
		$product = new Product;
		$product->productname = $request->input('productname');
		$product->dateofpurchase = $request->input('dateofpurchase');
		$product->batchnumber = $request->input('batchnumber');
		$product->serialnumber = $request->input('serialnumber');
		$product->costprice = $request->input('costprice');
		$product->sellingprice = $request->input('sellingprice');
		$product->description = $request->input('description');
		$product->weight = $request->input('weight');

		$product->save();
		//$product = $this->createAProduct($allinput);
		//return redirect()->action(ProductsController@details);
	} 
	public function create()
	{
		return view('products.newproductform');
	}
	/**
	 * [delete products]
	 * @param  Product $product [description]
	 * @return [type]           [description]
	 */
	public function delete(Product $product)
	{
		return view('Product.delete', compact('product'));
	}

	public function confirmDelete($id)
	{
		$results = $this->DeleteAProduct($id);
		if($results === 0)
		{
			//throw an exception and handle
			echo" No product to delete";
		}
		return redirect()->action('ProductsController', 'index');
	}

	/**public function makeAproduct($productarray = array(),$product_id)
	{
		$product = new Product;
		$results = $product->create($productarray)
	}
	*/
	 
} 