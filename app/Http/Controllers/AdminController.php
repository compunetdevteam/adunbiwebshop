<?php

namespace App\Http\Controllers;

use App\Business\DbUtility;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    private $dbu;
    private $user;
    /**
     * AdminController constructor.
     * @param DbUtility $dbutil
     */
    public function __construct(DbUtility $dbutil)
    {
        $this->dbu = $dbutil;
        $this->user = Sentinel::check();
        $this->middleware('sentinel.auth');
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
        $user = $this->user;
        return view('centaur.admindash',compact('products','sales','stocks','suppliers','user'));
    }
}
