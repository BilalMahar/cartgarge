<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable=[
        'id',
        'product_id',
        'quantity',
        'price',

    ];
    public function product(){
        return $this->belongsTo(Product::class ,'product_id');
    }
    public function product__variant_option(){
        return $this->belongsTo(Product::class ,'product_id');
    }

}
