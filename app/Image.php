<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    
	// images should belong to a single product brand
	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
