<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_mode',
        'source',
        'category',
        'brand',
        'region',
        'name',
        'number',
        'email',
        'product',
        'service',
        'gross_sale',
        'cash_in_hand',
        'cash_in_gbp',
        'sales_person',
        'sales_date',
        'account_manager'
    ];
}
