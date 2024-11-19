<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'amount', 
        'status', 
        'pollurl', 
        'reference', 
        'paynowreference', 
        'payment_method', 
        'tax', 
        'subTotal', 
        'cart_items'
    ];

    /**
     * An order belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * An order has many order items.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}



