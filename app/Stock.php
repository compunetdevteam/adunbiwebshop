<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = ['name','numberofproductsinstock','dateenteredinstock'];
	
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
