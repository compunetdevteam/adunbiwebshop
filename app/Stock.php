<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //a stock can have many category
	public function categories()
	{
		return $this->hasMany(Category::class);
	}
	
	public function products()
	{
		return $this->hasMany(Product::class);
	}
	
	
}
