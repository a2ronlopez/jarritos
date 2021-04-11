<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    protected $table = 'order_product';

    public $timestamps = false;

    protected $fillable = [
        'order_id','product_id','quantity','cost'
    ];

    public function order(){
        return $this->belongsTo('App\Order','order_id');
    }

    public function product(){
        return $this->belongsTo('App\Product','product_id');
    }
}
