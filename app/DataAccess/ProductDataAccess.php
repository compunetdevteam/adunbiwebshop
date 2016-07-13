<?php
/**
 * Created by PhpStorm.
 * User: JOE
 * Date: 6/27/2016
 * Time: 11:47 PM
 */

namespace App;

use App\Http\Requests\Request;
use App\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductDataAccess
{
    var $product;

    public function __construct(Product $_product)
    {
        $this->product = $_product;
    }


    /**
     * Return a collection of products
     * @return Collection of Products
     */
    public function ListProducts()
    {
        //$products = $this->product->all()->chunk(25);
        Product::chunk(25, function($products){
            return $products;
        });
    }

    /**
     * search for any product by the name of the product
     * @param string $name
     * @return \Eloquent a Product
     */
    public function SearchForProductByName($name)
    {
        return Product::where('name', $name)->first();
    }

    /**
     * Search for a product by its category
     * @param string $name
     * @return Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function SearchForProductByCategoryName($name)
    {

        $result = $this->product->categories()->find($name);
        return $result;
    }

    /**
     * Load and find the products supplied by a supplier's name
     * @param string $name
     * @return Collection Products
     */
    public function SearchForProductsBySupplierName($name)
    {
        return $this->product->with('supplier')->all()->find($name);
    }

    /**
     * Find the product by Id and update with values from a product form
     * @param $id
     * @param Request $request
     * @return bool|int
     */

    public function UpdateProductDetails($id, Request $request)
    {
        $product = $this->product->all()->find($id);
        return $product->update($request);
    }

    public function DeleteProduct($id)
    {
        return $this->product->all()->find($id)->delete();
    }

}