<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';
    protected $fillable = [
        'cat_id',
        'name',
        'slug',
    ];
    

    function category() : BelongsTo {
        return $this->belongsTo(Category::class,'cat_id');
    }

    function child_category() : HasMany {
        return $this->hasMany(ChildCategory::class,'sub_cat_id');
    }
    function products() : HasMany {
        return $this->hasMany(Product::class,'sub_cat_id');
    }
}
