<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /*	
		A supplier can suppy multiple products
	*/
	protected $fillable = [
		'suppliername',
		'supplieraddress',
	];
	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
