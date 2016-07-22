<?php
/**
 * Created by PhpStorm.
 * User: JOE
 * Date: 07-Jul-16
 * Time: 4:30 PM
 */

namespace App;


class SaleDataAccess
{
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

    
}