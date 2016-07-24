<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;

use App\Http\Requests;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::with('user','products')->paginate(15);
        return view('sales.index', compact('sales'));
    }
}
