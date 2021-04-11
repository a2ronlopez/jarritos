<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public $timestamps = false;

    protected $fillable = [
        'sku','description','quantity','cost','vendor_id'
    ];

    public function vendor(){
        return $this->belongsTo('App\Vendor','vendor_id');
    }

    public function orders(){
        return $this->hasMany('App\Order_product');
    }
}
