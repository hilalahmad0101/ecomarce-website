<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FaqCategory extends Model
{
    use HasFactory;

    protected $table = 'faq_categories';
    protected $fillable = [
        'name',
        'slug',
        'text',
        'meta_keyword',
        'meta_description',
    ];

    function faqs() : HasMany {
        return $this->hasMany(Faq::class,'cat_id');
    }
}
