<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChildCategory extends Model
{
    use HasFactory;

    protected $table = 'child_categories';
    protected $fillable = [
        'cat_id',
        'sub_cat_id',
        'name',
        'slug',
    ];

    function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    function sub_category(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class, 'sub_cat_id');
    }
}
