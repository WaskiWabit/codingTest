<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    public function productMapping()
    {
        return $this->hasMany(ProductMapping::class);
    }

    /**
     * Scope a query to only include records under 50k.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnderPriceRange($query)
    {
        return $query->where('price', '<', 50000);
    }

    /**
     * Scope a query to only include records over 50k.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOverPriceRange($query)
    {
        return $query->where('price', '>=', 50000);
    }
}
