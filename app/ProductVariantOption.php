<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariantOption extends Model
{
    protected $fillable=[
        'id',
        'product_variant_id',
        'product_option_id',
    ];

    public function product_variant(){
        return $this->hasMany(ProductVariant::class ,'product_variant_id');
    }
    public function product_option(){
        return $this->hasMany(ProductOption::class ,'product_option_id');
    }

}
