<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static where(string $string, string $id)
 */
class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';

    protected $fillable = [
        'product_id',
        'quantity'
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'id', 'cart_id');
    }
    public function order(): HasMany
    {
        return $this->hasMany(Order::class, 'cart_id', 'id');
    }
}
