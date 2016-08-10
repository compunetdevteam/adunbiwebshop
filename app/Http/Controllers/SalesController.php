<?php

namespace App\Http\Controllers;

use App\Business\DiscountLogic;
use App\User;
use App\Sale;
use App\Product;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Centaur\AuthManager;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    private $discount;
    private $authmgr;
    public function __construct(DiscountLogic $logic, AuthManager $auth)
    {
        $this->discount = $logic;
        $this->authmgr = $auth;
    }

    public function index()
    {
        $sales = Sale::orderby('created_at','asc')->paginate(15);
        return view('sales.index', compact('sales'));
    }

    public function createSale()
    {
        $products = Product::pluck('productname','id');
        $users = User::lists('email','id');
        $loggedinuser = Sentinel::getUser();
        dd($loggedinuser);
//        return view('sales.makesale',compact('users','products','loggedinuser'));
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
        $loggedinuser = Sentinel::getUser(); //returns false if there is no user loggedin
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

    /**
     * @param Sale $sale
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details(Sale $sale)
    {
        $getsale = DB::table('sales')->join('products','sales.id','=','products.sale_id')
            ->select('products.productname','customername',
                'customeraddress','total','sales.id')->where('sales.id',$sale->id)->get();
        return view('sales.details', compact('getsale'));
        //dd($getsale);
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


    public function showDiscount(Product $product)
    {
        return view('sales/discountpage', compact('product'));
    }
    
    public function AddDiscount($discountvalue, Product $product)
    {
        $discount = $this->discount->SetProductPriceDiscount($discountvalue, $product);
        if(gettype($discount) !== 'double' || gettype($discount) !== 'integer')
        {
            //send user to a friendly error page
            return false;
        }
        else
        {
            return $discount;
        }
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
