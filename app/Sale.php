<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //a 1 to Many relationship from Sale to Product Model;
    public function products(){
        return $this->hasMany(Product::class);
    }
    
   
}
