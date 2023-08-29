<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'product_id',
        'user_id',
        'sub_total',
        'qty',
        'total'
    ];

    function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
