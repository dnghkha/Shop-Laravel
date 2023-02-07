<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_detail';
    use HasFactory;
    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id')->where('status', '!=', -1);
    }
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id')->where('status', '!=', -1);
    }
}
