<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'category_id',
        'title',
        'description',
        'image'
    ];

    public function productOptions(){
        return $this->hasMany(ProductOption::Class,'product_option_id');
    }





}
