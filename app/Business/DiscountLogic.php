<?php
/**
 * Created by PhpStorm.
 * User: JOE
 * Date: 8/8/2016
 * Time: 4:17 PM
 */

namespace App\Business;
use App;
use App\Product;

class DiscountLogic
{
    /**
     * Set discounts for any product
     * @param $discount
     * @param Product $product
     */
    public function SetProductPriceDiscount($discount, Product $product)
    {
        if(gettype($discount) === 'double')
        {
            $product->discount = $discount;
            $newPrice = $discount/100 * $product->sellingprice;
            return $newPrice;
        }
        return false;
    }
}