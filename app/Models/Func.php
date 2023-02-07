<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Func extends Model
{
    protected $table = 'functions';
    use HasFactory;
    // public function order()
    // {
    //     return $this->hasOne(Order::class, 'id', 'order_id')->where('status', '!=', -1);
    // }
    // public function product()
    // {
    //     return $this->hasOne(Product::class, 'id', 'product_id')->where('status', '!=', -1);
    // }

}
