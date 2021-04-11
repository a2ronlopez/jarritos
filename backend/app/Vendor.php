<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendors';

    public $timestamps = false;

    protected $fillable = [
        'rfc','name','phone','address'
    ];

    public function products(){
        return $this->hasMany('App\Product');
    }
    public function orders(){
        return $this->hasMany('App\Order');
    }
}
