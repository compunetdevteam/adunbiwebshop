<?php

namespace App\Http\Controllers;

use App\Business\DbUtility;
use App\Category;
use App\Product;
use App\Sale;
use App\Stock;
use App\Supplier;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    private $dbu;
    /**
     * AdminController constructor.
     * @param DbUtility $dbutil
     */
    public function __construct(DbUtility $dbutil)
    {
        $this->dbu = $dbutil;
    }

    /**
     * Provide all the dynamic data required to make the homepage of the
     * admin dashboard lightup and come alive.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = $this->dbu->AdminDbProducts();
        $suppliers = $this->dbu->AdminDbSuppliers();
        $stocks = $this->dbu->AdminDbStocks();
        $sales = $this->dbu->AdminDbSales();
        return view('centaur.admindash',compact('products','sales','stocks','suppliers'));
    }
}
