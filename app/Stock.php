<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
	public function products()
	{
		return $this->hasMany(Product::class);
	}

	/**
	 * the hasManyThrough relationship between
	 *
	 */
	public function categories()
	{
		return $this->hasMany(Category::class);
	}
	
	
}
