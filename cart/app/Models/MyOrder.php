<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyOrder extends Model
{
    use HasFactory;
    protected $fillable=['userID','amount','paymentStatus'];

    public function product() {
        return $this->hasMany('App\Models\Product');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    // public function payment() {
    //     return $this->belongsTo('App\Models\Payment');
    // }
}
