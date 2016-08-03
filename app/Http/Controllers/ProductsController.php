<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProductsController extends Controller
{
	public function index()
	{
		$products = $this->ListProducts();
		return view('products.index',compact('products'));		
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
    	//$results = Product::where('productname','like', $request->input('name').'%')->get();
    	$results = Product::find()
    	return $results;
    }

	/**
	 * [createproduct description]
	 * @return \Illuminate\Http\RedirectResponse
	 */
    public function create()
    {
    	return view ('products.newproductform');
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
		$product->stock_id = 0;
		$product->sale_id = 0;
		$product->supplier_id = 0;

		$product->save();
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


	/**
	 * Data Access Methods
	 */
	public function ListProducts()
	{
		return Product::paginate(15);
	}

	/**
	public function GetProductsByName($name)
	{
		$resultarray = DB::table('products')->select('productname', 'sellingprice', 'serialnumber', 'batchnumber')->where('productname','=',$name)->get();
		$result = new Eloquent\Collection($resultarray);
		return $result;
	}**/
	/**public function makeAproduct($productarray = array(),$product_id)
	{
		$product = new Product;
		$results = $product->create($productarray)
	}
	*/
	 
} 