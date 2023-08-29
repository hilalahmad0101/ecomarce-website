<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageSite extends Model
{
    use HasFactory;
    protected $table = 'manage_sites';
    protected $fillable = [
        'key',
        'value'
    ];
}
