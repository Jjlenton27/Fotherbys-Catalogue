<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SellRequest extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'price',
        'reserve_price',
        'description',
        'summary',
        'user_id',
        'status',
    ];
}
