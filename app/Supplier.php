<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
	use SoftDeletes;
    /*
		A supplier can suppy multiple products
	*/
	protected $fillable = [
		'suppliername',
		'supplieraddress',
	];

	protected $dates = ['deleted_at'];


	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
