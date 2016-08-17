<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * Fields that are mass assignable
     */
    protected $fillable = [
        'name',
        'description',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Relationship with the Stocks table
     */
    public function stock()
    {
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
