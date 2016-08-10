<?php
/**
 * Created by PhpStorm.
 * User: JOE
 * Date: 8/10/2016
 * Time: 3:39 PM
 */

namespace App\Business;


use App\Category;
use App\Product;
use App\Sale;
use App\Stock;
use App\Supplier;
use DB;
use Illuminate\Database\Eloquent\Collection;

class DbUtility
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
     * Get a Collection from a join that includes data from products table
     * @return Collection
     */
    public function AdminDbSales()
    {
        $sales = new Collection(DB::table('sales')->join('products','sales.id','=','products.sale_id')
            ->select('sales.customername','sales.customeraddress','sales.customerphone','sales.total','products.productname')
            ->get());
        return $sales;
    }

    /**
     * Get Collection from 2 joins between 3 tables
     * @return Collection
     */
    public function AdminDbStocks()
    {
        $stocks = new Collection(DB::table('stocks')->join('categories','stocks.id','=','categories.stock_id')
            ->join('products','stocks.id','=','products.stock_id')
            ->select('categories.name','stocks.dateenteredinstock','stocks.numberofproductsinstock','products.productname')
            ->get());
        return $stocks;
    }

    /**
     * Return an object with suppliers and products included
     * @return mixed
     */
    public function AdminDbSuppliers()
    {
        $suppliers = $this->suppliers->with('products')->pluck('suppliername');
        return $suppliers;
    }

    /**
     * Returns an object with products along with stock, supplier and categories
     * @return mixed
     */
    public function AdminDbProducts()
    {
        $products = $this->products->with('stock','supplier','categories')->pluck('productname','sellingprice','serialnumber');
        return $products;
    }
}