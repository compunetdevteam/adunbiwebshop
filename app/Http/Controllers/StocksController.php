<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use App\Http\Requests;

class StocksController extends Controller
{

    public function index()
    {
    	$results = $this->ShowAllStockItems();

    	return view('stocks.index', compact('results'));
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
