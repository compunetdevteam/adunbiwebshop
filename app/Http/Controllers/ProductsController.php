<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\Supplier;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProductsController extends Controller
{
    private $user;
    public function __construct()
    {
        $this->middleware('sentinel.auth');
        $this->user = Sentinel::check();
    }

    public function index()
	{
		$products = $this->ListProducts();
        $user = $this->user;
        
		return view('products.index',compact('products','user'));
	}

    public function indexup()
    {
        $products = $this->ListProducts_UpdatedAt();
        return view('products.indexup',compact('products'));
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
    	$results = Product::where('productname','like',$request->input('name').'%')->get();
    	return $results;//$name;
    }
    /**
     * [search product by dateofpurchase ]
     * @param  Request begin and end date
     * @return [product purchase within the specified dates]
     */
    public function searchform(Request $request)
    {
        return view('products.searchform');
    }
    public function searchbydate($datebegin, $dateend)
    {
        $dateofpurchase = Product::wherebetween('dateofpurchase',['datebegin','dateend'])->get();
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
		return Product::orderby('created_at','desc')->paginate(15);
	}

    public function ListProducts_UpdatedAt()
    {
        return Product::orderby('updated_at','desc')->paginate(15);
    }

    public function showupdatepage($id )
    {
       $result = Product::find($id);
      return view('products.showupdatepage', compact('result'));
    }

    public function updateproduct(Request $request)
    {
  
      $this->validate($request,[
         'productname',
         'description',
      ]);
      $newproduct = array('id'=> $request->input('id'),
            'productname' => $request->input('productname'),
            'dateofpurchase' => $request->input('dateofpurchase'),
            'batchnumber' => $request->input('batchnumber'),
            'serialnumber' => $request->input('serialnumber'),
            'sellingprice' => $request->input('sellingprice'),
            'costprice' => $request->input('costprice'),
            'description' => $request->input('description'),
            'weight' => $request->input('weight')
        );
     
      $updateproduct = Product::
      where('id','=',$request->input('id'))->update($newproduct);
     return redirect()->action('ProductsController@index');

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