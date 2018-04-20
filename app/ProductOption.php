<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    protected $fillable = [
        'id',
        'product_id',
        'option_id',
        'value'
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id' );
    }
    public function option(){
        return $this->belongsTo(Option::class,'option_id' );
    }
 public function product_variant_option(){
        return $this->belongsTo(ProductVariantOption::class );
    }


}
