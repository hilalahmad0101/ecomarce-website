<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Compare extends Model
{
    use HasFactory;
    protected $table = 'compares';
    protected $fillable = [
        'user_id',
        'product_id'
    ];

    function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
