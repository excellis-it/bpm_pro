<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'invoice_id',
        'item_description',
        'item_additional_details',
        'item_rate',
        'item_quantity',
        'item_amount',

    ];
}
