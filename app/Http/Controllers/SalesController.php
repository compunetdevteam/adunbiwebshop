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

    public function createSale()
    {
        return view('sales.makesale');
    }

    /**
     * Create a sale
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function makeSale(Request $request)
    {
        $allfields = $request->all(); // gets all the fields from the make sale page
        //later we will make the discount field guarded so a discount is given based on
        //certain criteria that must be fulfilled.
        $this->validate($allfields, [
            'customername' => 'required',
            'customeraddress' => 'max:255|alpha_num|alpha_dash',
            'customerphone' => 'required',
            'emailaddress' => 'email',
            'discount'    => 'numeric',
            'subtotal'    => 'numeric|required|max:9',
            'total'       => 'numeric|required|max:9'
        ]);
        $sale = $this->MakeASale($allfields);

        if(is_a($sale, 'Sale'))
        {
            return redirect()->action('SalesController@index');
        }
    }

    public function details(Sale $sale)
    {
        return view('sales.details', compact('sale'));
    }

    public function edit(Request $request)
    {
        $allinput = $request->all();
        $this->validate($request, [
            'customername' => 'required',
            'customeraddress' => 'max:255|alpha_num|alpha_dash',
            'customerphone' => 'required',
            'emailaddress' => 'email',
            'discount'    => 'numeric'
        ]);

        $updatedsale = $this->UpdateASale($allinput);
        return redirect()->action('SaleController@details');
    }
    
    
    
    /**
     * Sales Data Access Methods
     */

    /**
     * @param array $salearray
     * @return Sale model Instance created
     */
    public function MakeASale($salearray = array())
    {
        $result = Sale::create($salearray);
        return $result;
    }

    public function UpdateASale(Request $sale)
    {
        $update = Sale::update($sale->all());
        return $update;
    }
}
