<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

use App\Http\Requests;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::with('products')->paginate(5);
        return view('sales.index', compact('sales'));
    }
}
