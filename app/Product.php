<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    /**
     * Whitelisted attributes that can be mass assigned
     * @var array
     */
    protected $fillable = [
        'productname',
        'dateofpurchase',
        'batchnumber',
        'serialnumber',
        'costprice',
        'sellingprice',
        'description',
        'weight'
    ];

    /**
     * SoftDelete feature
     */
    protected $dates = ['deleted_at'];


    /**
     * products can be in any number of categories
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    /**
     * Many products belong in stock
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }


    /**
     * Many products can be in one sale
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }*/

    /**
     * Many products can be supplied by a supplier
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * A Product can have many images
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    
}
