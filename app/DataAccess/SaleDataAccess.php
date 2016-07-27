<?php
/**
 * Created by PhpStorm.
 * User: JOE
 * Date: 07-Jul-16
 * Time: 4:30 PM
 */

<<<<<<< HEAD
namespace App\DataAccess\SaleDataAccess;
use App\Sale;
use Carbon\Carbon;
=======
namespace App;
use Carbon/Carbon;
>>>>>>> origin/dev

class SaleDataAccess
{\
    var $sale;

    public function __construct(Sale $_sale)
    {
        $this->sale = $_sale;
    }


    /**
     * Supply a sale date to display sales by.
     * @param datetime $date
     * @return mixed Collection of Sales
    */

    public function ShowAllSalesByDate(datetime $date)
    {
        return Sale::where('saledate', $date)->orderBy('created_at', 'desc');

    }

    /**
     * Show a collection of sales ordered by total on every sale
     * @return mixed Collection of Sales
    */

    public function ShowAllSalesByTotals()
    {
        return $this->sale->orderBy('total', 'desc')->limit(25)->get();
    }

    /**
     * Show all the sales made by a particular user
     * @param User $user
     * @return mixed Several Sales made by a single user
    */

    public function ShowAllSalesBySalesStaff(User $user)
    {
        return Sale::with('users')->all()->where('user_id', $user->id)->get();
    }
	
	
	
    /*
     * List the best performing product
    */
    public function BestPerformimgProduct()
    {
		
    }


    /*
     * List the worst performing product
    */
    public function WorstPerformingProduct()
    {
        
    }

        public function showsalesummaryperweek()
    {
<<<<<<< HEAD
       /* $showsalessummaryperweek = DB::table('sales')
=======
     /*   $showsalessummaryperweek = DB::table('sales')
>>>>>>> origin/dev
                ->join ('product','sales.id','=','product.id')
                ->sum('sales.total')
                ->whereWeek('sales.saledate','=',date('w'));
                ->get();
<<<<<<< HEAD
        return $showsalessummaryperweek;
        */       
       
    $showsalessummaryperweek = with::('Sale')
    ->join('Product') on (product.id)
    ->where('sales.id','=','product.id')
    ->whereWeek('sales.saledate','=',date())
    ->get();
   return showsalessummaryperweek;
=======
        return $showsalessummaryperweek;*/


        $showsalesummaryperweek = Sale::Carbon/Carbon()::week();
        Sale::where('saledate', '')
>>>>>>> origin/dev
    }

/*

    public  function  salesummarypermonth()
    {
        $showsalessummarypermonth = DB::table('Sales')
                ->join('product','sales.id','=','product.id')
                ->sum('total')
                ->whereMonth('sales.saledate ','=',date('m'))
                ->get();
        return $showsalessummarypermonth;
    }

    public  function  showsalesummaryperyear()
    {
       /* $showsalessummaryperyear = DB::table('Sales')
              ->join('product','sales.id','=','product.id')
              ->sum('total')
              ->whereYear('sales.saledate ','=',date('y'))
              ->get();
        return $showsalessummaryperyear;
        */
       
    }
}