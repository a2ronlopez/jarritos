<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public $timestamps = false;
    
    protected $fillable = [
        'folio','date','vendor_id','comments','status','total'
    ];

    public function vendor(){
        return $this->belongsTo('App\Vendor','vendor_id');
    }

    public function orders(){
        return $this->hasMany('App\Order_product');
    }
}
