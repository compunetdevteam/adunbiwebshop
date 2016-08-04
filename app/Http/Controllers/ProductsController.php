<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Supplier;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProductsController extends Controller
{
	public function index()
	{
		$products = $this->ListProducts();
		return view('products.index',compact('products'));		
	}

    public function details($id)
    {
        $products = Product::where('id',$id)->get();
        //dd($product);
        return view('products.details',compact('products'));
	}

    /**
     * [createproduct description]
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $result = DB::table('stocks')->join('categories','stocks.id','=','categories.stock_id')
            ->select('categories.name','stock_id')->pluck('name','stock_id');
        $stocks = new Collection($result);
        $suppliers = Supplier::lists('suppliername','id');
        return view ('products.newproductform', compact('suppliers','stocks'));
    }

    public function newproductform(Request $request)
    {
        $this->validate($request, [
            'productname' => 'required',
            'dateofpurchase' => 'required',
            'batchnumber' => 'required',
            'serialnumber' => 'required',
            'costprice' => 'numeric',
            'sellingprice' => 'numeric',
            'description' =>'',
            'weight' =>'numeric',
            'Supplier' => 'numeric',
            'stock' => 'numeric'
        ]);
        $product = $this->SaveProducts($request);
        if($product)
        {
            return redirect()->action('ProductsController@index');
        }
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
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
     * Load and find the products supplied by a supplier's name
     * @param string $name
     * @return Collection Products
     */
    public function productsearch(Request $request)
    {
    	//$results = Product::where('productname','like', $request->input('name').'%')->get();
    	$results = Product::find();
    	return $results;
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
		return Product::orderby('created_at')->paginate(15);
	}

    public function SaveProducts(Request $request)
    {
        $product = new Product;
        $product->productname = $request->input('productname');
        $product->dateofpurchase = $request->input('dateofpurchase');
        $product->batchnumber = $request->input('batchnumber');
        $product->serialnumber = $request->input('serialnumber');
        $product->costprice = $request->input('costprice');
        $product->sellingprice = $request->input('sellingprice');
        $product->description = $request->input('description');
        $product->weight = $request->input('weight');
        $product->stock_id = $request->input('stock');
        $product->supplier_id = $request->input('Supplier');

        $product->save();
        return $product;
    }

	/**
	public function GetProductsByName($name)
	{
		$resultarray = DB::table('products')->select('productname', 'sellingprice', 'serialnumber', 'batchnumber')->where('productname','=',$name)->get();
		$result = new Eloquent\Collection($resultarray);
		return $result;
	}**/
} 