<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Auction extends Model
{
    protected $fillable = [
        'title',
        'description',
        'summary',
        'auction_date',
        'auction_time',
    ];


    public function lots(): HasMany{
        return $this->hasMany(Lot::class);
    }
}
