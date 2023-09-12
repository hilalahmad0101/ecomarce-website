<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlists';
    protected $fillable = [
        'user_id',
        'product_id'
    ];

    function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    function user() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
