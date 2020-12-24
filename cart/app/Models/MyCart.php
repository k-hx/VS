<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCart extends Model
{
    use HasFactory;
    protected $fillable=['orderID','userID','quantity','productID'];

    public function product() {
        //return $this->hasMany('App\Models\Product');
        return $this->belongsTo('App\Models\Product');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
