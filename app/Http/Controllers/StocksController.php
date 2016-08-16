<?php

namespace App\Http\Controllers;
use App;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use App\Http\Requests;

class StocksController extends Controller
{
    private $user;
    public function __construct()
    {
        $this->middleware('sentinel.auth');
        $this->user = Sentinel::check();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
    	$results = $this->ShowAllStockItems();
        $user = $this->user;
    	return view('stocks.index', compact('results','user'));
    }

    public function details(App\Stock $stock)
    {
        return view('stocks.showstock', compact('stock'));
    }


    //DataAccess Methods for Stocks Controller
    public function ShowAllStockItems()
    {
        return App\Stock::with('categories.products')->paginate(10);
    }
}
