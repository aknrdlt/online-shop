<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
/*
    * @property-read Category|null $category
    * @property-read string|null $category_name
*/
final class Product extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'slug',
        'weight',
        'width',
        'height',
        'price',
        'created_at',
        'updated_at'
    ];
    /**
     * @var bool
     */
    public $timestamps = true;
    public function category(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'id', 'category_id');
    }
    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class, 'id', 'cart_id');
    }
}
