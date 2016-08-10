<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Sale;
use App\Stock;
use App\Supplier;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    private $products;
    private $suppliers;
    private $sales;
    private $categories;
    private $stocks;

    public function __construct(Product $product, Category $category, Sale $sale, Stock $stock, Supplier $supplier)
    {
        $this->categories = $category;
        $this->products = $product;
        $this->sales = $sale;
        $this->stocks = $stock;
        $this->suppliers = $supplier;
    }

    /**
     * Provide all the dynamic data required to make the homepage of the
     * admin dashboard lightup and come alive.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = $this->products->with('stock','supplier','categories')->pluck('productname','sellingprice','serialnumber')->paginate(15);
        $suppliers = $this->suppliers->with('products')->pluck('suppliername')->paginate(15);
        $stocks = new Collection(DB::table('stocks')->join('categories','stocks.id','categories.stock_id')
                                    ->join('products','stock.id','products.stock_id')
                                    ->lists('categories.name','stocks.dateaddedinstock','stocks.numberofproductsinstock','products.productname')
                                    ->get());
        $sales = new Collection(DB::table('sales')->join('products','sales.id','products.sales_id')
                                                  ->lists('sales.*','products.productname')
                                                  ->get());
        return view('centaur.admindash',compact('products','sales','stocks','suppliers'));
    }
}
