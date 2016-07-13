<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $fillable = ['dateenteredinstock', 'numberofprodcutsinstock'];

    /**
     * Relationship with Categories table
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        //return $this->hasMany('App\Category');
        return $this->hasMany(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
