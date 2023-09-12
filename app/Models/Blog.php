<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    protected $fillable = [
        'image',
        'title',
        'cat_id',
        'description',
        'tags',
        'meta_keyword',
        'meta_description',
    ];

    function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'cat_id');
    }
}
