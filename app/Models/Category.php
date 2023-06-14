<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static pluck(string $string)
 */
final class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'id', 'category_id');
    }
}
