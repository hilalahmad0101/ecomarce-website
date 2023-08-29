<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'image',
        'name',
        'slug',
        'meta_keyword',
        'meta_description',
        'serial',
        'status',
    ];


    function products(): HasMany
    {
        return $this->hasMany(Product::class, 'cat_id');
    }

    function sub_category(): HasMany
    {
        return $this->hasMany(SubCategory::class, 'cat_id');
    }

    function child_category(): HasMany
    {
        return $this->hasMany(ChildCategory::class, 'cat_id');
    }
}
