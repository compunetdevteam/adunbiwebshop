<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    
    protected $fillable = [
        'customername',
        'customeraddress',
        'customerphone',
        'emailaddress',
        'discount',
        'subtotal',
        'total'
    ];
    //a 1 to Many relationship from Sale to Product Model;
    public function products(){
        return $this->hasMany(Product::class);
    }

    /**
     * One to many between Sales and Users
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
   
}
