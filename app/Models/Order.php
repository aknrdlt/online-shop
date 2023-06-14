<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    // Statuses of Order
    const PENDING = 'pending';
    const PROCESSING = 'processing';
    const PAYMENT_FAILED = 'payment_failed';
    const COMPLETED = 'completed';

    protected $fillable = [
        'status',
        'user_id',
        'cart_id'
    ];

    public static function boot()
    {
        // when ever you create an order it will set status to pending
        parent::boot();

        static::creating(function ($order) {
            $order->status = self::PENDING;
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function carts(): BelongsTo
    {
        return $this->belongsTo(Cart::class, 'id', 'cart_id');
    }
}
