<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


    /**
     * Fields that are mass assignable
     */
    protected $fillable = [
        'name',
        'description',
        'stock_id',
    ];


    /**
     * Relationship with the Stocks table
     */
    public function stock()
    {
        //return $this->belongsTo('App\Stock');
        return $this->belongsTo(Stock::class);
    }

    /**
     * Relationship with Products table
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
