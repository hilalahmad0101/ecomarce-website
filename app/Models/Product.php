<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'featured_image',
        'images',
        'short_description',
        'description',
        'tags',
        'specifications',
        'meta_keyword',
        'meta_description',
        'current_price',
        'previous_price',
        'cat_id',
        'sub_cat_id',
        'child_cat_id',
        'brand_id',
        'total_stock',
    ];

    function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    function sub_categories(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class, 'sub_cat_id');
    }

    function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    function carts(): HasMany
    {
        return $this->hasMany(Cart::class, 'product_id');
    }
    function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class, 'product_id');
    }
    function compares(): HasMany
    {
        return $this->hasMany(Compare::class, 'product_id');
    }
}
