<?php

namespace App\Http\Controllers;

use App\Sale;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
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

        $this->validate($request, [
            'customername' => 'required',
            'customeraddress' => 'max:255|alpha_num|alpha_dash',
            'customerphone' => 'required',
            'emailaddress' => 'email',
            'discount'    => 'numeric',
            'subtotal'    => 'numeric|required|max:9',
            'total'       => 'numeric|required|max:9'
        ]);
        $loggedinuser = Sentinel::check(); //returns false if there is no user loggedin
        if(!$loggedinuser)
        {
            //return exception AnonymousUserException
        }
        $userid = \Cartalyst\Sentinel\Sentinel::getUser()->getUserId();
        $sale = $this->MakeASale($allfields, $userid);

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

    public function delete(Sale $sale)
    {
        return view('sales.delete', compact('sale'));
    }

    public function confirmDelete($id)
    {
        $result = $this->DeleteASale($id);
        if($result === 0)
        {
            //throw an exception and handle
        }
        return redirect()->action('SalesController', 'index');
    }
    
    
    
    /**
     * Sales Data Access Methods
     */

    /**
     * @param array $salearray
     * @return Sale model Instance created
     */
    public function MakeASale($salearray = array(), $userid)
    {
        //$result = Sale::create($salearray);
        $sale = new Sale;
        $result = $sale->create($salearray);
        $sale->setUserId($userid);
        return $result;
    }

    public function UpdateASale(Request $sale)
    {
        $update = Sale::update($sale->all());
        return $update;
    }

    public function DeleteASale($id)
    {
        //$sle = Sale::where('id',$id)->get();
        Sale::destroy($id);
    }
}
