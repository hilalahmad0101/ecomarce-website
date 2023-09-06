<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
    use HasFactory;
    protected $table = 'billing_addresses';
    protected $fillable = [
        'user_id',
        'address1',
        'address2',
        'zip_code',
        'city',
        'company',
        'phone'
    ];
}
