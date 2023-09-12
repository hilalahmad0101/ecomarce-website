<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faq extends Model
{
    use HasFactory;


    protected $table = 'faqs';
    protected $fillable = [
        'title',
        'cat_id',
        'details'
    ];

    function category() : BelongsTo {
        return $this->belongsTo(FaqCategory::class,'cat_id');
    }

}
