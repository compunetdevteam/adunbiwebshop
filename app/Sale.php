<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'customername',
        'customeraddress',
        'customerphone',
        'emailaddress',
        'discount',
        'subtotal',
        'total'
    ];


    protected $dates = ['deleted_at'];



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

    public function setUserId($userid)
    {
        if($userid === $this->user()->firstorfail('id')->get())
        {
            return $this->user_id = $this->user()->firstorfail('id')->get();
        }

    }
    
   
}
